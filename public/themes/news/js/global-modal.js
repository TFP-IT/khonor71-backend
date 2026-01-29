// Global Modal
document.addEventListener("DOMContentLoaded", () => {
    const globalModal = document.getElementById("globalModal");
    const modalBody = document.getElementById("modalBody");
    const globalModalClose = document.getElementById("globalModalClose");
    let storyScriptLoading = false;
    let storyScriptLoaded = false;

    function ensureStoryGallery() {
        if (!modalBody.querySelector(".daily-stories__outer")) return;

        if (window.initStoryGallery) {
            window.initStoryGallery();
            return;
        }

        if (!window.storyGalleryScriptUrl || storyScriptLoading || storyScriptLoaded) return;

        storyScriptLoading = true;
        const script = document.createElement("script");
        script.src = window.storyGalleryScriptUrl;
        script.onload = () => {
            storyScriptLoading = false;
            storyScriptLoaded = true;
            if (window.initStoryGallery) {
                window.initStoryGallery();
            }
        };
        document.body.appendChild(script);
    }

    function openModal(contentHTML) {
        modalBody.innerHTML = contentHTML;
        globalModal.classList.remove("opacity-0", "pointer-events-none");
        document.body.style.overflow = "hidden"; // Disable scroll
        ensureStoryGallery();
    }

    function closeModal() {
        globalModal.classList.add("opacity-0", "pointer-events-none");
        modalBody.innerHTML = ""; // Clear content on close if needed
        document.body.style.overflow = ""; // Restore scroll
    }

    globalModalClose.addEventListener("click", closeModal);

    window.addEventListener("click", (event) => {
        if (event.target === globalModal) {
            closeModal();
        }
    });

    // Global access
    window.GlobalModal = { open: openModal, close: closeModal };
});
