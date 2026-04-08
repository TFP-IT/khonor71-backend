document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("loginForm");
    if (!form) return;

    const loginBtn = document.getElementById("loginBtn");
    const responseBox = document.getElementById("responseMessage");

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        if (loginBtn) {
            loginBtn.textContent = "Logging in...";
            loginBtn.disabled = true;
        }
        if (responseBox) {
            responseBox.classList.remove("text-green-600", "text-red-600");
            responseBox.textContent = "";
        }

        const formData = new FormData(form);
        const csrfToken = form.querySelector('input[name="_token"]')?.value;

        try {
            const response = await fetch(loginRoute, {
                method: "POST",
                body: formData,
                credentials: "same-origin",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    ...(csrfToken ? { "X-CSRF-TOKEN": csrfToken } : {}),
                },
            });

            const res = await response.json().catch(function () {
                return { status: false, message: "Login failed." };
            });

            if (response.ok && res.status) {
                if (responseBox) {
                    responseBox.classList.add("text-green-600");
                    responseBox.textContent = res.message;
                }
                window.location.reload();
                return;
            }

            if (responseBox) {
                responseBox.classList.add("text-red-600");
                responseBox.textContent = res.message || "Login failed.";
            }
        } catch (error) {
            if (responseBox) {
                responseBox.classList.add("text-red-600");
                responseBox.textContent = "Login failed.";
            }
        } finally {
            if (loginBtn) {
                loginBtn.textContent = "Login";
                loginBtn.disabled = false;
            }
        }
    });
});
