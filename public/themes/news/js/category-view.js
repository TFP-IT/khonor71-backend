const getCsrfToken = () =>
    document.querySelector('input[name="_token"]')?.value ||
    document.querySelector('meta[name="csrf-token"]')?.content ||
    "";

const loadMoreBtn = document.getElementById("load-more-btn");
if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", function () {
        const button = this;
        const offset = Number.parseInt(button.getAttribute("data-offset"), 10);
        const categoryId = button.getAttribute("data-category-id");
        const categoryStyle = button.getAttribute("data-view-style");
        const token = getCsrfToken();
        const noMoreMessage = document.getElementById("no-more-news-message");

        button.disabled = true;
        button.textContent = "Loading...";

        fetch(categoryLoadMoreUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify({
                offset,
                category_id: categoryId,
                category_style: categoryStyle,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.html_grid && data.html_list) {
                    const grid = document.querySelector("#news-grid");
                    const list = document.querySelector("#news-list");

                    grid.insertAdjacentHTML("beforeend", data.html_grid);
                    list.insertAdjacentHTML("beforeend", data.html_list);

                    button.setAttribute("data-offset", String(offset + data.count));

                    if (!data.hasMore) {
                        button.remove();
                        grid.classList.remove("before:bg-gradient-to-t");
                        return;
                    }

                    button.disabled = false;
                    button.textContent = "Load More";
                    return;
                }

                button.remove();
                if (noMoreMessage) {
                    noMoreMessage.classList.remove("hidden");
                }
            })
            .catch(() => {
                button.disabled = false;
                button.textContent = "Load More";
            });
    });
}

const loadMoreProbashiBtn = document.getElementById("load-more-probashi-btn");
if (loadMoreProbashiBtn) {
    loadMoreProbashiBtn.addEventListener("click", function () {
        const button = this;
        const offset = Number.parseInt(button.getAttribute("data-offset"), 10);
        const categoryId = button.getAttribute("data-category-id");
        const categoryStyle = button.getAttribute("data-view-style");
        console.log("Load more button clicked", { offset, categoryId, categoryStyle });
        const token = getCsrfToken();
        const noMoreMessage = document.getElementById("no-more-news-message");

        button.disabled = true;
        button.textContent = "Loading...";

        fetch(probashiLoadMoreUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify({
                offset,
                category_id: categoryId,
                category_style: categoryStyle,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.html_grid || data.html_list) {
                    const grid = document.querySelector("#news-grid");
                    const list = document.querySelector("#news-list");

                    if (grid && data.html_grid) {
                        grid.insertAdjacentHTML("beforeend", data.html_grid);
                    }
                    if (list && data.html_list) {
                        list.insertAdjacentHTML("beforeend", data.html_list);
                    }

                    button.setAttribute("data-offset", String(offset + 4));

                    if (!data.hasMore) {
                        button.remove();
                        if (grid) grid.classList.remove("before:bg-gradient-to-t");
                        return;
                    }

                    button.disabled = false;
                    button.textContent = "Load More";
                    return;
                }

                button.remove();
                if (noMoreMessage) {
                    noMoreMessage.classList.remove("hidden");
                }
            })
            .catch(() => {
                button.disabled = false;
                button.textContent = "Load More";
            });
    });
}

const loadMoreVideoBtn = document.getElementById("load-more-video-news-btn");
if (loadMoreVideoBtn) {
    loadMoreVideoBtn.addEventListener("click", function () {
        const button = this;
        const offset = Number.parseInt(button.getAttribute("data-offset"), 10);
        const token = getCsrfToken();
        const noMoreMessage = document.getElementById("no-more-news-message");

        button.disabled = true;
        button.textContent = "Loading...";

        fetch(videoLoadMoreUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify({ offset }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.html_grid && data.html_list) {
                    const grid = document.querySelector("#news-grid");
                    const list = document.querySelector("#news-list");

                    grid.insertAdjacentHTML("beforeend", data.html_grid);
                    list.insertAdjacentHTML("beforeend", data.html_list);

                    button.setAttribute("data-offset", String(offset + data.count));

                    if (!data.hasMore) {
                        button.remove();
                        grid.classList.remove("before:bg-gradient-to-t");
                        return;
                    }

                    button.disabled = false;
                    button.textContent = "Load More";
                    return;
                }

                button.remove();
                if (noMoreMessage) {
                    noMoreMessage.classList.remove("hidden");
                }
            })
            .catch(() => {
                button.disabled = false;
                button.textContent = "Load More";
            });
    });
}
