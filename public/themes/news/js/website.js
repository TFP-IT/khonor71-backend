document.addEventListener("DOMContentLoaded", () => {
    const baseUrlMeta = document.querySelector('meta[name="base-url"]');
    const baseUrl = baseUrlMeta
        ? baseUrlMeta.getAttribute("content")
        : window.location.origin;
    const toggleBtn = document.getElementById("lang-toggle");
    const dropdown = document.getElementById("lang-menu");
    const langLabel = document.getElementById("lang-label");
    let swiperLoadPromise;
    const pendingSwiperOptions = new WeakMap();
    const swiperObserver = "IntersectionObserver" in window
        ? new IntersectionObserver((entries, observer) => {
              entries.forEach((entry) => {
                  if (!entry.isIntersecting) return;

                  observer.unobserve(entry.target);
                  loadSwiper()
                      .then(() => {
                          if (!entry.target.swiper) {
                              new window.Swiper(entry.target, pendingSwiperOptions.get(entry.target));
                          }
                      })
                      .catch(() => {});
              });
          }, { rootMargin: "400px 0px" })
        : null;

    function loadSwiper() {
        if (window.Swiper) return Promise.resolve();
        if (swiperLoadPromise) return swiperLoadPromise;

        const source = document.querySelector("script[data-swiper-src]")?.dataset.swiperSrc;
        if (!source) return Promise.reject(new Error("Swiper asset URL is missing"));
        const stylesheetSource = document.querySelector("script[data-swiper-css]")?.dataset.swiperCss;

        const scriptPromise = new Promise((resolve, reject) => {
            const script = document.createElement("script");
            script.src = source;
            script.async = true;
            script.onload = resolve;
            script.onerror = reject;
            document.head.appendChild(script);
        });

        const stylesheetPromise = stylesheetSource
            ? new Promise((resolve) => {
                  const link = document.createElement("link");
                  link.rel = "stylesheet";
                  link.href = stylesheetSource;
                  link.onload = resolve;
                  link.onerror = resolve;
                  document.head.appendChild(link);
              })
            : Promise.resolve();

        swiperLoadPromise = Promise.all([scriptPromise, stylesheetPromise]);

        return swiperLoadPromise;
    }

    function createSwiper(selector, options) {
        document.querySelectorAll(selector).forEach((element) => {
            pendingSwiperOptions.set(element, options);

            if (swiperObserver) {
                swiperObserver.observe(element);
                return;
            }

            loadSwiper()
                .then(() => {
                    if (!element.swiper) new window.Swiper(element, options);
                })
                .catch(() => {});
        });
    }

    function initializeSwipers(direction = "ltr") {
        // Initialize Opinion Swiper
        createSwiper(".OpinionSwiper", {
            dir: direction,
            spaceBetween: 30,
            slidesPerView: 1,
            centeredSlides: true,
            loop: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".opinion-swiper-button-next",
                prevEl: ".opinion-swiper-button-prev",
            },
        });

        // Initialize Stories News Swiper
        createSwiper(".StoriesNewsSwiper", {
            dir: direction,
            loop: false,
            slidesPerView: 2,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".stories-swiper-button-next",
                prevEl: ".stories-swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 4,
                },
                1024: {
                    slidesPerView: 5,
                },
                1280: {
                    slidesPerView: 7,
                },
            },
        });

        // Initialize Video News Swiper
        createSwiper(".VideoNesSwiper", {
            dir: direction,
            loop: false,
            slidesPerView: 1,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".video-swiper-button-next",
                prevEl: ".video-swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
                1280: {
                    slidesPerView: 4,
                },
            },
        });

        // Initialize Politics News Swiper
        createSwiper(".PoliticsSwiper", {
            dir: direction,
            spaceBetween: 30,
            centeredSlides: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".politics-swiper-button-next",
                prevEl: ".politics-swiper-button-prev",
            },
        });

        /* Initialize Tech News Swiper */
        createSwiper(".TechNewsSwiper", {
            dir: direction,
            spaceBetween: 30,
            slidesPerView: 1,
            centeredSlides: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".tech-news-next",
                prevEl: ".tech-news-prev",
            },
        });

        // Initialize Food News Swiper
        createSwiper(".FoodNewsSwiper", {
            dir: direction,
            spaceBetween: 30,
            slidesPerView: 1,
            centeredSlides: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".food-news-next",
                prevEl: ".food-news-prev",
            },
        });

        // Initialize Binodon News Swiper
        createSwiper(".BinodonNewsSwiper", {
            dir: direction,
            spaceBetween: 30,
            slidesPerView: 1,
            centeredSlides: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".binodon-news-next",
                prevEl: ".binodon-news-prev",
            },
        });

        // Initialize Lifestyle News Swiper
        createSwiper(".LifestyleNewsSwiper", {
            dir: direction,
            spaceBetween: 30,
            slidesPerView: 1,
            centeredSlides: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".lifestyle-news-next",
                prevEl: ".lifestyle-news-prev",
            },
        });
        // Initialize Article News Swiper
        createSwiper(".ArticleSwiper", {
            dir: direction,
            spaceBetween: 30,
            slidesPerView: 1,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".article-swiper-button-next",
                prevEl: ".article-swiper-button-prev",
            },
        });
    }

    // Initial setup
    const initialDirection =
        document.getElementById("direction")?.value || "ltr";
    document.documentElement.setAttribute("dir", initialDirection);
    const initialLang = document.getElementById("language")?.value || "en";
    document.documentElement.setAttribute("lang", initialLang);
    const initialLangOption = document.querySelector(
        `.lang-option[data-lang="${initialLang}"]`
    );
    if (langLabel && initialLangOption) {
        langLabel.textContent = initialLangOption.textContent;
    }

    initializeSwipers(initialDirection);

    if (toggleBtn && dropdown) {
        toggleBtn.addEventListener("click", () => {
            dropdown.classList.toggle("opacity-0");
            dropdown.classList.toggle("scale-95");
            dropdown.classList.toggle("translate-y-2");
            dropdown.classList.toggle("pointer-events-none");
        });

        document.addEventListener("click", (e) => {
            if (toggleBtn.contains(e.target) || dropdown.contains(e.target)) {
                return;
            }
            dropdown.classList.add(
                "opacity-0",
                "scale-95",
                "translate-y-2",
                "pointer-events-none"
            );
        });
    }

    document.querySelectorAll(".lang-option").forEach((option) => {
        option.addEventListener("click", (e) => {
            const selectedLang = e.target.getAttribute("data-lang");
            window.location.href = `${baseUrl}/${selectedLang}`;
        });
    });
});

document.addEventListener("change", (event) => {
    const target = event.target;
    if (!(target instanceof HTMLElement)) return;
    if (!target.matches("#language, #language_side")) return;
    const language = target.value;
    if (!language) return;
    const baseUrlMeta = document.querySelector('meta[name="base-url"]');
    const baseUrl = baseUrlMeta
        ? baseUrlMeta.getAttribute("content")
        : window.location.origin;
    window.location.href = `${baseUrl}/${language}`;
});
