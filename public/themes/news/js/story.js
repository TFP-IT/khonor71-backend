let container;
let swipeSurface;
let imgs_wrapper;
let imgs;
let bars;
let prevBtn;
let nextBtn;
let centralArea;
let total_imgs;
const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

let CM_container;
let CM_button;
let cm_link_save;
let cm_link_share;
let cm_link_copy;
let cm_link_cancel;

let entryURL;

let container_width = 0;
let current_index = 0;
let pointer_is_down = false;
let start_x = 0;
let end_x = 0;
let start_y = 0;
let end_y = 0;
let is_horizontal_drag = false;
let move_distance = 0;
let timersSet = [];
let dataSet = [];
let timer;

function initStoryGallery() {
    container = document.querySelector(".daily-stories__outer");
    if (!container) return;
    if (container.dataset.storyInit === "1") return;

    swipeSurface = document.querySelector(".daily-stories") || container;
    imgs_wrapper = document.querySelector(".daily-stories__container");
    imgs = document.querySelectorAll(".daily-stories .slide");
    bars = document.querySelectorAll(".progress-bars .bar");
    prevBtn = document.querySelector("#prev-slide");
    nextBtn = document.querySelector("#next-slide");
    centralArea = document.querySelector(".central-area");
    total_imgs = imgs.length;

    CM_container = document.querySelector(".context-menu-container");
    CM_button = CM_container ? CM_container.querySelector("a.btn_play_push") : null;
    cm_link_save = document.querySelector("#c-menu_save");
    cm_link_share = document.querySelector("#c-menu_share");
    cm_link_copy = document.querySelector("#c-menu_copy");
    cm_link_cancel = document.querySelector("#c-menu_cancel");

    container_width = container.clientWidth;
    current_index = 0;
    pointer_is_down = false;
    start_x = 0;
    end_x = 0;
    move_distance = 0;
    timersSet = [];
    dataSet = [];
    timer = null;

    if (!imgs_wrapper || !imgs.length) {
        return;
    }

    container.dataset.storyInit = "1";

    init();
    collections();

    setSlideActive(0);
    setBarActive(0);
    updateButtons();

    if (isMobile) {
        document.body.classList.add("mobile");
    }

    bindEvents();
}

        function reload() {
            window.location.reload(false);
        }

        function init() {
            if (!container || !imgs_wrapper) return;
            container_width = container.clientWidth;
            if (CM_container) {
                CM_container.style.width = `${container_width - 30}px`;
            }
            imgs_wrapper.style.width = `${container_width * total_imgs}px`;
        }

        function collections() {
            if (!imgs || !total_imgs) return;
            for (var i = 0; i < total_imgs; ++i) {
                timersSet.push(imgs[i].getAttribute("data-timeout"));

                if (imgs[i].classList.contains("video")) {
                    dataSet.push(imgs[i].querySelector("video").getAttribute("src"));
                } else {
                    dataSet.push(imgs[i].querySelector("img").getAttribute("src"));
                }
            }
        }

        function redirect(url) {
            const storyUrl = document.getElementById("story_page_hidden_url")?.value ?? '';
            if (url !== null) {
                window.location = storyUrl + url; // Redirect to "entry" URL
            } else {
                window.location = storyUrl; // Redirect to homepage
            }
        }

        function slidesAutoPlay() {
            clearTimeout(timer);

            timer = setTimeout(() => {
                if (current_index < total_imgs - 1) {
                    nextSlide();
                } else {
                    console.log("End of Story");

                    // toaster("End of Story for Today! &#128526;", "info");

                    // setCookie('F5_Daily', true);  // Set cookies - daily seen
                    // deleteCookie('EntryPageID'); // Remove temp "entry" URL cookie
                    // setTimeout( redirect(entryURL), 50); // Redirect to corresponding page
                }
            }, timersSet[current_index]);
        }

        // Mousemove and Touchmove Event
        function createDraggingEffects() {
            if (document.body.classList.contains("menu-open")) return; // Disallow slides dragging if context menu is open

            const max_distance = 2;
            const scrolled_distance =
                current_index * container_width + (start_x - end_x) / max_distance;

            switchImages(-scrolled_distance);
        }

        // Set slide "active"
        function setSlideActive(i) {
            const currentSlide = imgs[i];

            imgs.forEach((el) => el.classList.remove("active"));
            currentSlide.classList.add("active");

            playVideo();
        }

        // Set bar "active / animate"
        function setBarActive(i) {
            if (!bars || !bars.length || !bars[i]) return;
            bars.forEach((el, index) => {
                if (index >= i) {
                    el.classList.remove("animate");
                }
                if (index < i) {
                    el.classList.add("seen");
                    el.classList.remove("animate");
                } else {
                    el.classList.remove("seen");
                }
            });

            bars[i].classList.add("animate");
            const span = bars[i].querySelector("span");
            if (span && timersSet[i]) {
                span.style.animationDuration = `${timersSet[i]}ms`;
            }
        }

        // Set current slide active
        function setActive() {
            if (bars && bars.length) {
                if (current_index < total_imgs - 1) {
                    // if ain't LAST
                    setBarActive(parseInt(current_index, 10) + 1);
                } else {
                    setBarActive(0);
                }
            }

            setTimeout(() => {
                if (bars && bars.length) {
                    setBarActive(current_index);
                }
                setSlideActive(current_index);
            }, 1);
        }

        // Mouseup and Touchend Event
        function calculateFinalMoveDistance() {
            const scrolled_distance = Math.abs(start_x - end_x);
            const minimum_distance = 50;

            if (document.body.classList.contains("menu-open")) return; // Disallow slides switching if context menu is open

            if (scrolled_distance < minimum_distance && current_index !== 0) {
                move_distance = -(current_index * container_width);
                switchImages();
                return false;
            }

            stopVideo(); // Stop video on current slide if any were playing

            if ((start_x > end_x) & (current_index < total_imgs - 1)) {
                // scroll next
                current_index++;
            } else if (start_x < end_x && current_index > 0) {
                // scroll prev
                current_index--;
            } else if (current_index === 0) {
                setBarActive(1); // hack to reset animation's play state of first slide
            }

            move_distance = -(current_index * container_width);
            switchImages(move_distance);

            updateSaveImgSrc();

            setActive();
            updateButtons();

            // slidesAutoPlay();
        }

        // Switch to Next Slide
        function nextSlide() {
            if (current_index < total_imgs - 1) {
                // check if it isn't LAST slide

                if (document.body.classList.contains("menu-open"))
                    return; // Disallow slides switching if context menu is open

                document.body.classList.remove("paused"); // Un-Pause slider

                stopVideo(); // Stop video on current slide if any were playing

                current_index++;

                move_distance = -(current_index * container_width);
                switchImages(move_distance);
                updateSaveImgSrc();

                setActive();
                updateButtons();

                // slidesAutoPlay();
            }
        }

        // Switch to Prev Slide
        function prevSlide() {
            if (current_index >= 0) {
                // check if it isn't FIRST slide

                if (document.body.classList.contains("menu-open"))
                    return; // Disallow slides switching if context menu is open

                document.body.classList.remove("paused"); // Un-Pause slider

                stopVideo(); // Stop video on current slide if any were playing

                if (current_index > 0) {
                    // decrease index only if larger than 0
                    current_index--;
                }

                move_distance = -(current_index * container_width);
                switchImages(move_distance);
                updateSaveImgSrc();

                setActive();
                updateButtons();

                // slidesAutoPlay();
            }
        }

        // Switch to specific Slide
        function slideTo(i) {
            if (document.body.classList.contains("menu-open")) return; // Disallow slides switching if context menu is open

            document.body.classList.remove("paused"); // Un-Pause slider
            stopVideo(); // Stop video on current slide if any were playing

            current_index = i;

            move_distance = -(current_index * container_width);
            switchImages(move_distance);
            updateSaveImgSrc();

            setActive();
            updateButtons();

            // slidesAutoPlay();
        }

        function pauseVideo() {
            if (isVideo()) {
                const v = imgs[current_index].querySelector("video");
                v.muted = true;
                v.pause();
            }
        }

        function playVideo() {
            if (isVideo()) {
                const v = imgs[current_index].querySelector("video");
                v.muted = true;
                v.play();
            }
        }

        function stopVideo() {
            if (isVideo()) {
                const v = imgs[current_index].querySelector("video");
                v.pause();
                v.currentTime = 0;
            }
        }

        function toggleMute() {
            if (isVideo()) {
                const v = imgs[current_index].querySelector("video");
                v.muted = !v.muted;
            }
        }

        function cancelAnimation() {
            clearTimeout(timer);
        }

        // Switch Images
        function switchImages(scrolled_number) {
            const distance = scrolled_number || move_distance;
            imgs_wrapper.style.transform = `translate3d(${distance}px, 0px, 0px)`;
        }

        // Mouseleave event
        function handleMouseLeave(e) {
            if (!pointer_is_down) return false;

            pointer_is_down = false;
            [start_x, end_x] = [0, 0];
            switchImages();
        }

        // Update SRC of "Save Image" button on context menu
        function updateSaveImgSrc() {
            if (!cm_link_save) return;
            cm_link_save.href = dataSet[current_index];
        }

        // Toggle Play/Pause of Carousel
        function toggleSliderAutoplay(e) {
            const state = e.target.getAttribute("data-state");

            // Return if Context Menu is active
            if (CM_container && CM_container.classList.contains("active")) {
                return;
            }

            if (!centralArea) return;

            if (state === "paused") {
                centralArea.setAttribute("data-state", "playing");
                document.body.classList.remove("paused");

                setActive();

                // slidesAutoPlay();

                stopVideo();
                playVideo();
            } else {
                centralArea.setAttribute("data-state", "paused");
                document.body.classList.add("paused");
                cancelAnimation();
                pauseVideo();
            }
        }

        // Check if Slide contains video
        function isVideo() {
            return imgs[current_index].classList.contains("video");
        }

        // Handle Context-Menu
        function CM_Handle(e) {
            e.preventDefault();
            if (!CM_container) return;

            CM_container.classList.toggle("active");

            if (CM_container.classList.contains("active")) {
                document.body.classList.add("menu-open");
                cancelAnimation();
                pauseVideo();
                updateSaveImgSrc();
            } else {
                document.body.classList.remove("menu-open");

                setActive();

                // slidesAutoPlay();

                stopVideo();
                playVideo();
            }
        }

        function copyText(element) {
            const textToCopy = element.href;
            const tempInput = document.createElement("input");

            tempInput.type = "text";
            tempInput.value = textToCopy;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("Copy");
            document.body.removeChild(tempInput);

            toaster("Link copied to clipboard", "success");
        }

        function toaster(message, type, timeout = 5000) {
            const body = document.body;

            if (typeof type === "undefined") {
                return;
            }

            const toast = document.createElement("div");

            toast.classList.add("toast-notification", type);
            toast.innerHTML = message;
            body.appendChild(toast);

            setTimeout(() => {
                toast.classList.add("active");
            }, 100);
            setTimeout(() => {
                toast.classList.remove("active");
            }, timeout - 500);
            setTimeout(() => {
                toast.parentNode.removeChild(toast);
            }, timeout);
        }

        function bindEvents() {
            const surface = swipeSurface || container;
            const surfaces = new Set([surface, container, centralArea].filter(Boolean));
            if (!surfaces.size) return;

            // Handle PREV Slide btn
            if (prevBtn) {
                prevBtn.addEventListener("click", (e) => {
                    e.preventDefault();
                    prevSlide();
                });
            }

            // Handle NEXT Slide btn
            if (nextBtn) {
                nextBtn.addEventListener("click", (e) => {
                    e.preventDefault();
                    nextSlide();
                });
            }

            // Handle click on Central Area - Play/Pause animation
            if (centralArea) {
                centralArea.addEventListener("click", (e) => {
                    e.preventDefault();
                    toggleSliderAutoplay(e);
                });
            }

            // Swipe support (reels-like)
            const getClientX = (event) => {
                if (event.touches && event.touches.length) return event.touches[0].clientX;
                if (event.changedTouches && event.changedTouches.length) return event.changedTouches[0].clientX;
                return event.clientX;
            };

            const handlePointerDown = (event) => {
                if (document.body.classList.contains("menu-open")) return;
                pointer_is_down = true;
                start_x = getClientX(event);
                end_x = start_x;
                start_y = event.touches && event.touches.length
                    ? event.touches[0].clientY
                    : event.clientY;
                end_y = start_y;
                is_horizontal_drag = false;

                if (event.pointerId && event.currentTarget?.setPointerCapture) {
                    try {
                        event.currentTarget.setPointerCapture(event.pointerId);
                    } catch (e) {}
                }
            };

            const handlePointerMove = (event) => {
                if (!pointer_is_down) return;
                end_x = getClientX(event);
                end_y = event.touches && event.touches.length
                    ? event.touches[0].clientY
                    : event.clientY;

                const dx = Math.abs(end_x - start_x);
                const dy = Math.abs(end_y - start_y);
                if (dx > dy && dx > 6) {
                    is_horizontal_drag = true;
                    if (event.cancelable) {
                        event.preventDefault();
                    }
                }

                if (is_horizontal_drag) {
                    createDraggingEffects();
                }
            };

            const handlePointerUp = (event) => {
                if (!pointer_is_down) return;
                end_x = getClientX(event);
                end_y = event.changedTouches && event.changedTouches.length
                    ? event.changedTouches[0].clientY
                    : event.clientY;
                pointer_is_down = false;

                if (event.pointerId && event.currentTarget?.releasePointerCapture) {
                    try {
                        event.currentTarget.releasePointerCapture(event.pointerId);
                    } catch (e) {}
                }

                const dx = Math.abs(end_x - start_x);
                const dy = Math.abs(end_y - start_y);

                if (dx > dy && dx > 30) {
                    calculateFinalMoveDistance();
                } else {
                    // reset any partial drag
                    switchImages();
                }
            };

            const supportsPointer = "PointerEvent" in window;

            surfaces.forEach((el) => {
                if (supportsPointer) {
                    el.addEventListener("pointerdown", handlePointerDown, { passive: false });
                    el.addEventListener("pointermove", handlePointerMove, { passive: false });
                    el.addEventListener("pointerup", handlePointerUp, { passive: false });
                    el.addEventListener("pointercancel", handlePointerUp, { passive: false });
                } else {
                    el.addEventListener("touchstart", handlePointerDown, { passive: false });
                    el.addEventListener("touchmove", handlePointerMove, { passive: false });
                    el.addEventListener("touchend", handlePointerUp, { passive: false });

                    el.addEventListener("mousedown", handlePointerDown);
                    el.addEventListener("mousemove", handlePointerMove);
                    el.addEventListener("mouseup", handlePointerUp);
                    el.addEventListener("mouseleave", handleMouseLeave);
                }
            });

            // Handle Window resize
            window.removeEventListener("resize", reload);
            window.addEventListener("resize", reload);

            // Trigger Context Menu
            if (CM_button) {
                CM_button.addEventListener("click", CM_Handle);
            }

            // Dismiss Context Menu
            if (cm_link_cancel) {
                cm_link_cancel.addEventListener("click", CM_Handle);
            }

            // Copy STORIES Link from Context Menu
            if (cm_link_copy) {
                cm_link_copy.addEventListener("click", (e) => {
                    e.preventDefault();
                    copyText(e.target);
                });
            }

            // Handle Progress Bar Click
            if (bars && bars.length) {
                bars.forEach((bar) => {
                    bar.addEventListener("click", () => {
                        slideTo(bar.getAttribute("data-index"));
                    });

                    const span = bar.querySelector("span");
                    if (span) {
                        span.addEventListener("animationend", () => {
                            if (document.body.classList.contains("paused")) return;
                            if (document.body.classList.contains("menu-open")) return;
                            const barIndex = parseInt(bar.getAttribute("data-index"), 10);
                            if (barIndex !== current_index) return;
                            if (current_index < total_imgs - 1) {
                                nextSlide();
                            }
                        });
                    }
                });
            }
        }


        function updateBackground(index) {
            const mainBg = document.getElementById("main-bg");
            if (!mainBg) return;

            // Clear previous background classes
            mainBg.className = "flex justify-center items-center";

            // Add new background classes per slide index
            switch (index) {
                case 0:
                    mainBg.classList.add("bg-gradient-to-r", "from-[#6B1303]", "to-[#B89C74]");
                    break;
                case 1:
                    mainBg.classList.add("bg-gradient-to-r", "from-[#744C29]", "to-neutral-800");
                    break;
                case 2:
                    mainBg.classList.add("bg-gradient-to-tr", "from-slate-900", "via-[#254A7D]", "via-[#081830]",
                        "to-sky-200");
                    break;
                case 3:
                    mainBg.classList.add(
                        "bg-gradient-to-r",
                        "from-neutral-800",
                        "via-[#744C29]",
                        "via-[#DCBF87]",
                        "to-neutral-900"
                    );
                    break;
                case 4:
                    mainBg.classList.add("bg-gradient-to-r", "from-[#351611]", "to-[#161819]");
                    break;
                case 5:
                    mainBg.classList.add("bg-gradient-to-tr",
                        "from-[#310E06]",
                        "via-[#E9A282]",
                        "via-[#A5572B]",
                        "to-neutral-900");
                    break;
                case 6:
                    mainBg.classList.add("bg-gradient-to-tr",
                        "from-neutral-900",
                        "via-[#744C29]",
                        "via-pink-200",
                        "via-[#AB671F]",
                        "to-amber-800",
                    );
                    break;
                default:
                    mainBg.classList.add("bg-gradient-to-r", "from-slate-900", "to-slate-700");
            }
        }

        function updateButtons() {
            if (!prevBtn || !nextBtn) return;
            if (current_index === 0) {
                prevBtn.disabled = true;
                prevBtn.style.opacity = "0.2";
                prevBtn.style.pointerEvents = "none";
            } else {
                prevBtn.disabled = false;
                prevBtn.style.opacity = "1";
                prevBtn.style.pointerEvents = "auto";
            }

            if (current_index === total_imgs - 1) {
                nextBtn.disabled = true;
                nextBtn.style.opacity = "0.2";
                nextBtn.style.pointerEvents = "none";
            } else {
                nextBtn.disabled = false;
                nextBtn.style.opacity = "1";
                nextBtn.style.pointerEvents = "auto";
            }
        }

        function setSlideActive(i) {
            const currentSlide = imgs[i];

            imgs.forEach((el) => el.classList.remove("active"));
            currentSlide.classList.add("active");

            updateBackground(i);
            playVideo();
        }

window.initStoryGallery = initStoryGallery;

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => initStoryGallery());
} else {
    initStoryGallery();
}
