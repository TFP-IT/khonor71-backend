const baseUrl =
    document.querySelector('meta[name="base-url"]')?.getAttribute("content") ||
    window.location.origin;
// Dark & Light Mode
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("theme-toggle");
    if (!toggleButton) return;

    const html = document.documentElement;

    // Optional: Persist theme in localStorage
    const storedTheme = localStorage.getItem("theme");
    if (storedTheme === "dark") {
        html.classList.add("dark");
    } else if (storedTheme === "light") {
        html.classList.remove("dark");
    }

    toggleButton.addEventListener("click", async () => {
        html.classList.toggle("dark");

        // Update localStorage
        let theme = "light";
        if (html.classList.contains("dark")) {
            localStorage.setItem("theme", "dark");
            theme = "dark";
        } else {
            localStorage.setItem("theme", "light");
        }

        try {
            await fetch(baseUrl + "/mode/change/" + theme, {
                method: "GET",
                credentials: "same-origin",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                },
            });
        } catch (error) {
            // Continue with local mode switch even if preference update fails.
        }

        window.location.reload();
    });
});
