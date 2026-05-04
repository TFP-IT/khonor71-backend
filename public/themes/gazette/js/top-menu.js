(() => {
    const topMenu = document.querySelector(".fixed_top_menu");
    if (!topMenu) {
        return;
    }

    topMenu.querySelectorAll(".menu > .item").forEach((menuItem) => {
        const subBtn = menuItem.querySelector(".sub-btn");
        const subMenu = menuItem.querySelector(".sub-menu");
        const dropdownIcon = subBtn?.querySelector(".dropdown");

        if (subBtn && subMenu) {
            // Items with submenu
            menuItem.addEventListener("mouseenter", () => {
                // Close all other submenus and remove active states
                topMenu
                    .querySelectorAll(".sub-menu")
                    .forEach((sm) => sm.classList.remove("open"));
                topMenu
                    .querySelectorAll(".sub-btn")
                    .forEach((b) => b.classList.remove("active"));
                topMenu
                    .querySelectorAll(".dropdown")
                    .forEach((icon) => icon.classList.remove("rotate"));
                topMenu
                    .querySelectorAll(".menu > .item > .side_nav")
                    .forEach((el) => el.classList.remove("active"));
                topMenu
                    .querySelectorAll(".sub-item")
                    .forEach((el) => el.classList.remove("active"));

                subMenu.classList.add("open");
                subBtn.classList.add("active");
                dropdownIcon?.classList.add("rotate");
            });

            menuItem.addEventListener("mouseleave", () => {
                subMenu.classList.remove("open");
                subBtn.classList.remove("active");
                dropdownIcon?.classList.remove("rotate");
            });
        } else {
            // Items without submenu
            menuItem.addEventListener("mouseenter", () => {
                // Remove all active styles
                topMenu
                    .querySelectorAll(".menu > .item > .side_nav")
                    .forEach((el) => el.classList.remove("active"));
                topMenu
                    .querySelectorAll(".sub-item")
                    .forEach((el) => el.classList.remove("active"));
                topMenu
                    .querySelectorAll(".sub-menu")
                    .forEach((sm) => sm.classList.remove("open"));
                topMenu
                    .querySelectorAll(".sub-btn")
                    .forEach((b) => b.classList.remove("active"));
                topMenu
                    .querySelectorAll(".dropdown")
                    .forEach((icon) => icon.classList.remove("rotate"));

                const sideNav = menuItem.querySelector(".side_nav");
                if (sideNav) {
                    sideNav.classList.add("active");
                }
            });

            menuItem.addEventListener("mouseleave", () => {
                const sideNav = menuItem.querySelector(".side_nav");
                if (sideNav) {
                    sideNav.classList.remove("active");
                }
            });
        }
    });

    // Handle submenu item active
    topMenu.querySelectorAll(".sub-menu .sub-item").forEach((subItem) => {
        subItem.addEventListener("click", (e) => {
            e.stopPropagation();

            topMenu
                .querySelectorAll(".sub-item")
                .forEach((el) => el.classList.remove("active"));
            topMenu
                .querySelectorAll(".menu > .item > .side_nav")
                .forEach((el) => el.classList.remove("active"));

            subItem.classList.add("active");
        });
    });

    // Main items without submenu click
    topMenu
        .querySelectorAll(".menu > .item > .side_nav:not(.sub-btn)")
        .forEach((link) => {
            link.addEventListener("click", () => {
                topMenu
                    .querySelectorAll(".menu > .item > .side_nav")
                    .forEach((a) => a.classList.remove("active"));
                topMenu
                    .querySelectorAll(".sub-item")
                    .forEach((el) => el.classList.remove("active"));

                link.classList.add("active");
            });
        });

    const topMenuOffset = topMenu.offsetTop;

    window.addEventListener("scroll", () => {
        if (window.pageYOffset > topMenuOffset) {
            topMenu.classList.add("fixed_menu");
        } else {
            topMenu.classList.remove("fixed_menu");
        }
    });
})();
