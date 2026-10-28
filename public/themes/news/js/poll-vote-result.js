(function () {
    const getCsrfToken = () =>
        document.querySelector('input[name="_token"]')?.value ||
        document.querySelector('meta[name="csrf-token"]')?.content ||
        "";

    function showVoteMessage(text, type = "error") {
        const voteMessage = document.getElementById("voteMessage");
        if (!voteMessage) return;

        voteMessage.textContent = text;
        if (type === "success") {
            voteMessage.classList.remove("bg-red-600");
            voteMessage.classList.add("bg-green-600");
        } else {
            voteMessage.classList.remove("bg-green-600");
            voteMessage.classList.add("bg-red-600");
        }
        voteMessage.classList.remove("hidden");

        if (voteMessage._timer) {
            clearTimeout(voteMessage._timer);
        }
        voteMessage._timer = setTimeout(() => {
            voteMessage.classList.add("hidden");
        }, 3500);
    }

    function handleVoteClick() {
        const selected = document.querySelector('input[name="voting"]:checked');
        const pollId = document.getElementById("poll_id")?.value;
        const form = document.querySelector('input[name="poll_id"]')?.closest("form") || document.querySelector("form");
        const token = getCsrfToken();

        if (!pollId) return;

        if (!selected) {
            const selectMsg = form?.dataset?.msgSelect || "অনুগ্রহ করে একটি অপশন নির্বাচন করুন।";
            showVoteMessage(selectMsg, "error");
            return;
        }

        if (typeof ajaxPollVoteUrl === "undefined") return;

        fetch(ajaxPollVoteUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify({
                poll_id: pollId,
                option_id: selected.value,
            }),
        })
            .then(async (response) => {
                const data = await response.json().catch(() => ({}));
                if (!response.ok || data.status === "error") {
                    const msg = data.message || "ভোট দেওয়া সম্ভব হয়নি।";
                    showVoteMessage(msg, "error");
                    return;
                }

                if (data.status === "success") {
                    showVoteMessage(data.message, "success");
                    setTimeout(() => {
                        loadPollResult(pollId);
                    }, 600);
                }
            })
            .catch(() => {
                showVoteMessage("একটি সমস্যা দেখা দিয়েছে। অনুগ্রহ করে পুনরায় চেষ্টা করুন।", "error");
            });
    }

    function loadPollResult(pollId) {
        if (!pollId || typeof ajaxPollResultUrl === "undefined") return;

        const url = ajaxPollResultUrl.replace("__POLL_ID__", pollId);
        const form = document.querySelector('input[name="poll_id"][value="' + pollId + '"]')?.closest("form") || document.querySelector("form");
        const totalVotesLabel = form?.dataset?.totalVotesLabel || "মোট ভোট";

        fetch(url, {
            headers: {
                "Accept": "application/json",
            },
        })
            .then((response) => response.json())
            .then((data) => {
                const resultContainer = document.querySelector(".voting_result_section");
                const resultContent = resultContainer?.querySelector(".py-2.space-y-3");
                if (!resultContainer || !resultContent) return;

                const totalVotes = data.totalVotes || 0;
                const totalVotesElem = document.getElementById("totalVotes");
                if (totalVotesElem) {
                    totalVotesElem.textContent = `${totalVotesLabel}: ${totalVotes}`;
                }

                const html = (data.results || [])
                    .map((option) => {
                        const percentage = option.percentage || 0;
                        const vote = option.vote || 0;
                        return `
                        <div class="skills_bar">
                            <div class="flex justify-between items-center text-sm font-medium mb-1">
                                <span class="text-neutral-800 dark:text-neutral-200">${option.name}</span>
                                <span class="text-xs font-semibold text-neutral-600 dark:text-neutral-400">${percentage}% (${vote})</span>
                            </div>
                            <div class="w-full bg-neutral-200 dark:bg-neutral-700 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-red-600 h-2.5 rounded-full transition-all duration-700 ease-out" style="width: ${percentage}%"></div>
                            </div>
                        </div>
                    `;
                    })
                    .join("");

                resultContent.innerHTML = html;

                document.querySelector(".votiong_question")?.classList.add("hidden");
                resultContainer.classList.remove("hidden");
            })
            .catch((err) => {
                console.error("Poll result load error:", err);
            });
    }

    document.addEventListener("DOMContentLoaded", function () {
        document.addEventListener("click", function (e) {
            if (e.target.closest("#btn_vote")) {
                handleVoteClick();
            } else if (e.target.closest(".btn_result")) {
                const pollId = document.getElementById("poll_id")?.value;
                if (pollId) {
                    loadPollResult(pollId);
                }
            } else if (e.target.closest(".btn_option")) {
                document.querySelector(".voting_result_section")?.classList.add("hidden");
                document.querySelector(".votiong_question")?.classList.remove("hidden");
            }
        });
    });
})();
