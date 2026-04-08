const onReady = (callback) => {
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", callback, { once: true });
        return;
    }

    callback();
};

onReady(() => {
    const form = document.getElementById("subscribe-form");
    if (!form) {
        return;
    }

    const emailInput = document.getElementById("subscriber_email");
    const submitButton = document.getElementById("subscribe-btn");
    const messageBox = document.getElementById("subscribe-message");

    form.addEventListener("submit", async (event) => {
        event.preventDefault();

        if (!emailInput || !submitButton || !messageBox) {
            return;
        }

        const csrfToken =
            form.querySelector('input[name="_token"]')?.value ||
            document.querySelector('input[name="_token"]')?.value || "";

        submitButton.disabled = true;
        submitButton.textContent = "Subscribing...";
        messageBox.classList.remove("text-green-600", "text-red-600");
        messageBox.textContent = "";

        try {
            const response = await fetch(subscribeUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                    "X-Requested-With": "XMLHttpRequest",
                },
                body: JSON.stringify({
                    _token: csrfToken,
                    email: emailInput.value,
                }),
            });

            const data = await response.json();

            if (response.ok && data.success) {
                messageBox.classList.add("text-green-600");
                messageBox.textContent = data.message;
                emailInput.value = "";
                return;
            }

            const errors = data.errors || [];
            messageBox.classList.add("text-red-600");
            messageBox.innerHTML = Array.isArray(errors)
                ? errors.join("<br>")
                : "Subscription failed.";
        } catch (error) {
            messageBox.classList.add("text-red-600");
            messageBox.textContent = "Subscription failed.";
        } finally {
            submitButton.disabled = false;
            submitButton.textContent = "Subscribe";
        }
    });
});
