const dropdownButton = document.getElementById("dropdownButton");
const dropdownMenu = document.getElementById("dropdownMenu");

if (dropdownButton && dropdownMenu) {
    dropdownButton.addEventListener("click", (event) => {
        event.stopPropagation();
        dropdownMenu.classList.toggle("hidden");
    });

    document.addEventListener("click", (event) => {
        if (
            !dropdownButton.contains(event.target) &&
            !dropdownMenu.contains(event.target)
        ) {
            dropdownMenu.classList.add("hidden");
        }
    });
}

const getBaseUrl = () =>
    document.querySelector('meta[name="base-url"]')?.getAttribute("content") || "";

const redirectToLanguage = (language) => {
    const baseUrl = getBaseUrl();
    if (!baseUrl || !language) {
        return;
    }

    window.location.href = `${baseUrl}/${language}`;
};

document.addEventListener("click", (event) => {
    const languageLink = event.target.closest("#dropdownMenu a");
    if (!languageLink) {
        return;
    }

    event.preventDefault();
    redirectToLanguage(languageLink.dataset.lang || "");
});

document.querySelectorAll("#language, #language_side").forEach((select) => {
    select.addEventListener("change", () => {
        redirectToLanguage(select.value);
    });
});
