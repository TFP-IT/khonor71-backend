document.addEventListener('DOMContentLoaded', () => {
    const imageFileInput = document.getElementById('image_file');
    const imagePreview = document.getElementById('photo-library-preview');
    const originalPreview = imagePreview?.innerHTML ?? '';
    let selectedImagePreviewUrl = null;

    const restoreImagePreview = () => {
        if (selectedImagePreviewUrl) {
            URL.revokeObjectURL(selectedImagePreviewUrl);
            selectedImagePreviewUrl = null;
        }
        if (imagePreview) imagePreview.innerHTML = originalPreview;
    };

    imageFileInput?.addEventListener('change', (event) => {
        const file = event.target.files?.[0];
        if (!file || !imagePreview) {
            restoreImagePreview();
            return;
        }

        if (selectedImagePreviewUrl) URL.revokeObjectURL(selectedImagePreviewUrl);
        selectedImagePreviewUrl = URL.createObjectURL(file);

        const previewImage = new Image();
        previewImage.src = selectedImagePreviewUrl;
        previewImage.alt = 'Selected image preview';
        previewImage.className = 'img-fluid img-thumbnail';
        previewImage.style.maxHeight = '220px';
        previewImage.style.objectFit = 'contain';
        imagePreview.replaceChildren(previewImage);
    });

    imageFileInput?.form?.addEventListener('reset', () => {
        setTimeout(restoreImagePreview, 0);
    });

    let aiGeneratedText = '';
    console.log("Tested AI");
    // ✅ 1️⃣ Config div থেকে ডেটা পড়া
    const aiConfig = document.getElementById('aiConfig');
    const generateUrl = aiConfig.dataset.generateUrl;
    const csrfToken = aiConfig.dataset.csrfToken;

    // ✅ 2️⃣ Generate Text
    document.getElementById('generateTextBtn').addEventListener('click', () => {
        const aiCommand = document.getElementById('aiCommand');
        const aiResponseArea = document.getElementById('aiResponseArea');
        const prompt = aiCommand.value.trim();

        if (!prompt) {
            alert('Please enter your command.');
            return;
        }

        aiResponseArea.innerHTML = '<em>Generating...</em>';

        fetch(generateUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({ prompt })
        })
        .then(res => res.json())
        .then(data => {
            console.log(data.text);
            if (data.error) {
                aiGeneratedText = '';
                aiResponseArea.innerHTML = '<span class="text-danger">' + data.error + '</span>';
            } else {
                aiGeneratedText = data.text ?? '';
                aiResponseArea.innerHTML = '<div style="white-space: pre-wrap;">' + aiGeneratedText + '</div>';
            }
        })
        .catch(() => {
            aiGeneratedText = '';
            aiResponseArea.innerHTML = '<span class="text-danger">Something went wrong!</span>';
        });
    });

    // ✅ 3️⃣ Use Text
    document.getElementById('useTextBtn').addEventListener('click', () => {
        if (!aiGeneratedText.trim()) {
            alert('No generated text available.');
            return;
        }

        const detailsNews = document.getElementById('details_news');
        if (detailsNews) {
            if (window.CKEDITOR && CKEDITOR.instances && CKEDITOR.instances.details_news) {
                CKEDITOR.instances.details_news.setData(aiGeneratedText);
                console.log('Used CKEditor API to set data.');
            }
            else if (window.ClassicEditor) {
                if (detailsNews.editorInstance) {
                    detailsNews.editorInstance.setData(aiGeneratedText);
                    console.log('Used CKEditor 5 instance to set data.');
                }
            }
            else {
                detailsNews.value = aiGeneratedText;
                console.log('Set plain textarea value.');
            }
        }

        // Close modal
        const modalEl = document.getElementById('aiWriterModal');
        if (modalEl) {
            const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modalInstance.hide();
        }
    });
});



var image_up_route = $("#image_up").val();

CKEDITOR.replace("details_news", {
    filebrowserUploadUrl: image_up_route,
    filebrowserUploadMethod: "form",
});

/**
 * create callback function
 */
var showCallBackData = function (response) {
    let data = response.data;

    setTimeout(() => {
        $("#photo-library-preview").html("");
        $("#latest_confirmed").prop("checked", true);
        $("#status_confirmed").prop("checked", true);

        $("#report_modal").modal("hide");
    }, 3000);
};

/**
 * Report Create callback function
 */
var showCallBackReportData = function (response) {
    let data = response.data;
    if (data) {
        $("#reporter_id").append(new Option(data.name, data.id));
    }

    $("#report_modal").modal("hide");
};





/**
 * Report Update callback function
 */
var showCallBackUpdateData = function (response) {
    let data = response.data;
    let redirectUrl = $("#newsDetailsForm").attr("data-redirect-url");
    if (redirectUrl) {
        setTimeout(() => {
            window.location.href = redirectUrl;
        }, 3000);
    }

    $("#photo-library-preview").html("");
};

("use strict");
$(document).ready(function () {
    $("#slug").hide();
    $(".page_slug a").on("click", function () {
        $("#slug").toggle("show");
    });

    $("#post_tag").tagsinput();
    $("#meta_keyword").tagsinput();

    /** Location Fields (Division & District) Visibility Toggle */
    function toggleLocationFields(animate = true) {
        let selectedCategoryText = $("#other_page option:selected").text().trim();
        let isSaradesh = (selectedCategoryText === "সারাদেশ" || selectedCategoryText.indexOf("সারাদেশ") !== -1);
        let $locationRow = $("#location_fields_row");

        if (isSaradesh) {
            if (animate) {
                $locationRow.slideDown(250);
            } else {
                $locationRow.show();
            }
        } else {
            if (animate) {
                $locationRow.slideUp(250);
            } else {
                $locationRow.hide();
            }
            if ($locationRow.is(":visible")) {
                $("#division_id").val("").trigger("change.select2");
                $("#district_id").val("").trigger("change.select2");
            }
        }
    }

    // Initial check on load
    toggleLocationFields(false);

    /** Sub-category */
    let baseUrl = $('meta[name="base-url"]').attr('content');

    $(document).on("change", "#other_page", function () {
        toggleLocationFields(true);
        let categoryId = $(this).val();
        if (categoryId) {
            axios
                .get(`${baseUrl}/admin/news/sub-category/${categoryId}`)
                .then(function (response) {
                    let data = response.data;
                    $("#sub_category_id").html("");
                    let optionHtml = `<option value="">Select Sub Category</option>`;
                    $.each(data, function (key, value) {
                        optionHtml += `<option value="${value.id}">${value.category_name}</option>`;
                    });

                    $("#sub_category_id").html(optionHtml);
                    $("#sub_category_id").select2({
                        placeholder: "Select Sub Category",
                        allowClear: true,
                    });

                })
                .catch(function (error) {
                    console.log(error);
                });
        } else {
            $("#sub_category_id").html("");
        }
    });

    /** Category */
    $(document).on("change", "#language_id", function () {
        let languageId = $(this).val();
        if (languageId) {
            axios
                .get(`${baseUrl}/admin/news/category-by-language/${languageId}`)
                .then(function (response) {
                    let data = response.data;

                    $("#other_page").html("");
                    let optionHtml = `<option value="">Select Category</option>`;
                    $.each(data, function (key, value) {
                        optionHtml += `<option value="${value.id}">${value.category_name}</option>`;
                    });

                    $("#other_page").html(optionHtml);
                    $("#other_page").select2({
                        placeholder: "Select Category",
                        allowClear: true,
                    });

                    toggleLocationFields(true);
                })
                .catch(function (error) {
                    console.log(error);
                });
        } else {
            $("#other_page").html("");
            toggleLocationFields(true);
        }
    });

    /** District by Division */
    $(document).on("change", "#division_id", function () {
        let divisionId = $(this).val();
        $("#district_id").html('<option value="">Select District</option>');
        if (divisionId) {
            axios
                .get(`${baseUrl}/admin/news/districts-by-division/${divisionId}`)
                .then(function (response) {
                    let data = response.data;
                    let optionHtml = `<option value="">Select District</option>`;
                    $.each(data, function (key, value) {
                        let label = value.bn_name ? `${value.bn_name} (${value.name})` : value.name;
                        optionHtml += `<option value="${value.id}">${label}</option>`;
                    });

                    $("#district_id").html(optionHtml);
                    $("#district_id").select2({
                        placeholder: "Select District",
                        allowClear: true,
                    });
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });

    /**
     * ==============================
     * Article Scheduling System
     * ==============================
     */

    // Toggle between Publish Immediately and Schedule Publication
    $('input[name="publish_type"]').on("change", function () {
        var mode = $(this).val();

        // Update button styles
        $(".schedule-mode-btn").removeClass("btn-primary btn-info").addClass(function () {
            return $(this).attr("for") === "publish_type_immediate"
                ? "btn-outline-primary"
                : "btn-outline-info";
        });

        if (mode === "schedule") {
            $("#btn_publish_schedule").removeClass("btn-outline-info").addClass("btn-info");
            $("#schedule_fields").slideDown(200);
            updateSchedulePreview();
        } else {
            $("#btn_publish_immediate").removeClass("btn-outline-primary").addClass("btn-primary");
            $("#schedule_fields").slideUp(200);
            $("#schedule_preview").hide();

            // Set current date/time for immediate
            var now = new Date();
            var dateStr = now.getFullYear() + "-" +
                String(now.getMonth() + 1).padStart(2, "0") + "-" +
                String(now.getDate()).padStart(2, "0");
            var timeStr = String(now.getHours()).padStart(2, "0") + ":" +
                String(now.getMinutes()).padStart(2, "0");
            $("#publish_date").val(dateStr);
            $("#publish_time").val(timeStr);
        }
    });

    // Publish Now button (edit mode: switch from scheduled to immediate)
    $(document).on("click", "#btn_publish_now", function (e) {
        e.preventDefault();
        $("#publish_type_immediate").prop("checked", true).trigger("change");
        $("#scheduled_banner").slideUp(200);
    });

    // Live preview update when date or time changes
    $("#publish_date, #publish_time").on("change keyup", function () {
        if ($("#publish_type_schedule").is(":checked")) {
            updateSchedulePreview();
        }
    });

    function updateSchedulePreview() {
        var dateVal = $("#publish_date").val();
        var timeVal = $("#publish_time").val();

        if (dateVal) {
            try {
                var dateTimeStr = dateVal + (timeVal ? " " + timeVal : " 00:00");
                var dt = new Date(dateTimeStr);

                if (!isNaN(dt.getTime())) {
                    var months = [
                        "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"
                    ];
                    var hours = dt.getHours();
                    var ampm = hours >= 12 ? "PM" : "AM";
                    var displayHours = hours % 12 || 12;
                    var minutes = String(dt.getMinutes()).padStart(2, "0");

                    var formatted =
                        String(dt.getDate()).padStart(2, "0") + " " +
                        months[dt.getMonth()] + " " +
                        dt.getFullYear() + ", " +
                        String(displayHours).padStart(2, "0") + ":" +
                        minutes + " " + ampm;

                    $("#schedule_preview_text").text("Scheduled for: " + formatted);
                    $("#schedule_preview").show();
                } else {
                    $("#schedule_preview").hide();
                }
            } catch (e) {
                $("#schedule_preview").hide();
            }
        } else {
            $("#schedule_preview").hide();
        }
    }

    // Initialize: if schedule mode is pre-selected (edit mode), show preview
    if ($("#publish_type_schedule").is(":checked")) {
        updateSchedulePreview();
    }

});
