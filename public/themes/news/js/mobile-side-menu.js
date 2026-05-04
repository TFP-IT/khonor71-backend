function openSidebar() {
    const modal = document.getElementById("mobileMenuModal");
    const sidebar = document.getElementById("sidebar");
    if (!modal || !sidebar) {
        return;
    }

    modal.classList.remove("hidden");
    document.body.classList.add("overflow-hidden");
    setTimeout(() => {
        sidebar.classList.add("side_bar_active");
    }, 10);
}

function closeSidebar() {
    const modal = document.getElementById("mobileMenuModal");
    const sidebar = document.getElementById("sidebar");
    if (!modal || !sidebar) {
        return;
    }

    sidebar.classList.remove("side_bar_active");

    setTimeout(() => {
        modal.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    }, 300);
}

// close sidebar when clicking outside
const mobileMenuModal = document.getElementById("mobileMenuModal");
if (mobileMenuModal) {
    mobileMenuModal.addEventListener("click", (e) => {
        if (e.target.id === "mobileMenuModal") {
            closeSidebar();
        }
    });
}
