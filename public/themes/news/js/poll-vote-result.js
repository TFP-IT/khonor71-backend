const getCsrfToken = () =>
    document.querySelector('input[name="_token"]')?.value ||
    document.querySelector('meta[name="csrf-token"]')?.content ||
    "";

const voteBtn = document.getElementById("btn_vote");
if (voteBtn) {
    voteBtn.addEventListener("click", function () {
        const selected = document.querySelector('input[name="voting"]:checked');
        const pollId = document.getElementById("poll_id")?.value;
        const voteMessage = document.getElementById("voteMessage");
        const token = getCsrfToken();

        if (!voteMessage || !pollId) {
            return;
        }

        if (!selected) {
            voteMessage.textContent = "Please select an option.";
            voteMessage.classList.remove("hidden");

            setTimeout(() => {
                voteMessage.classList.add("hidden");
            }, 3000);

            return;
        }

        fetch(ajaxPollVoteUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify({
                poll_id: pollId,
                option_id: selected.value,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "error") {
                    voteMessage.textContent = data.message;
                    voteMessage.classList.remove("hidden");

                    setTimeout(() => {
                        voteMessage.classList.add("hidden");
                    }, 3000);
                    return;
                }

                if (data.status === "success") {
                    loadPollResult(pollId);
                }
            });
    });
}

function loadPollResult(pollId) {
    const url = ajaxPollResultUrl.replace("__POLL_ID__", pollId);

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            const resultContainer = document.querySelector(".voting_result_section");
            const resultContent = resultContainer?.querySelector(".py-2.space-y-3");
            if (!resultContainer || !resultContent) {
                return;
            }

            const html = data.results
                .map(
                    (option) => `
                    <div class="skills_bar">
                        <h4 class="text-base mb-2">${option.name}</h4>
                        <div class="progress_line relative w-full h-2 bg-black dark:bg-neutral-500 rounded-xl">
                            <span
                                class="skills_bar_valu absolute rounded-xl h-full bg-red-600 before:absolute before:content-[''] before:-top-[12px] before:right-0 before:border-[12px] before:border-transparent before:border-r-0 before:border-b-0 before:border-t-neutral-800 z-10"
                                data-percentage="${option.percentage}%">
                                <span class="absolute bg-neutral-800 text-white px-2 py-1 rounded-md text-xs -top-8 right-0">${option.percentage}%</span>
                            </span>
                        </div>
                    </div>
                `
                )
                .join("");

            resultContent.innerHTML = html;

            const totalVotes = document.getElementById("totalVotes");
            if (totalVotes) {
                totalVotes.textContent = `Total vote: ${data.totalVotes}`;
            }

            document.querySelectorAll(".skills_bar_valu").forEach((el) => {
                el.style.width = el.getAttribute("data-percentage") || "0%";
            });

            document.querySelector(".votiong_question")?.classList.add("hidden");
            resultContainer.classList.remove("hidden");
        });
}

const resultButton = document.querySelector(".btn_result");
if (resultButton) {
    resultButton.addEventListener("click", function () {
        const pollId = document.getElementById("poll_id")?.value;
        if (!pollId) {
            return;
        }

        loadPollResult(pollId);
    });
}

const optionButton = document.querySelector(".btn_option");
if (optionButton) {
    optionButton.addEventListener("click", function () {
        document.querySelector(".voting_result_section")?.classList.add("hidden");
        document.querySelector(".votiong_question")?.classList.remove("hidden");
    });
}
