(function ($) {
    "use strict";

    $(document).ready(function () {
        window.addEventListener("load", formValidation(), false);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(document).on("change", ".file-preview", function () {
            var previewDiv = $(this).attr("data-previewDiv");
            if (previewDiv) {
                $("#" + previewDiv).html("");
                if (this.files && this.files[0]) {
                    $("#" + previewDiv).html(`Loading...`);
                    var reader = new FileReader();

                    if (this.files[0].size > 5000000) {
                        input.value = "";
                        $("#" + previewDiv).html("");
                    } else {
                        reader.onload = function (e) {
                            $("#" + previewDiv).html(
                                '<img src="' +
                                    e.target.result +
                                    '" class="form-preview-image img-responsive img-rounded  "  style="height: 8rem !important; width: 15rem !important"/>'
                            );
                        };
                        reader.readAsDataURL(this.files[0]);
                    }
                }
            }
        });

        // Real-time clearing of error highlight when user interacts with field
        $(document).on("input keyup change", ".is-invalid", function () {
            $(this).removeClass("is-invalid");
            var $feedback = $(this).siblings(".invalid-feedback");
            if (!$feedback.length) $feedback = $(this).parent().find(".invalid-feedback");
            $feedback.removeClass("d-block").hide();

            var $s2 = $(this).siblings(".select2-container");
            if (!$s2.length) $s2 = $(this).parent().find(".select2-container");
            if ($s2.length) {
                $s2.removeClass("is-invalid").find(".select2-selection").css({ "border-color": "", "box-shadow": "" });
            }
        });

        $(document).on("select2:select change", "select", function () {
            $(this).removeClass("is-invalid");
            var $s2 = $(this).siblings(".select2-container");
            if (!$s2.length) $s2 = $(this).parent().find(".select2-container");
            if ($s2.length) {
                $s2.removeClass("is-invalid").find(".select2-selection").css({ "border-color": "", "box-shadow": "" });
            }
            $(this).closest(".form-group, .row").find(".invalid-feedback").removeClass("d-block").hide();
        });

        $(document).on("click", ".photo-library-page", function () {
            let action = $(this).attr("href");
            window.open(
                action,
                "_blank",
                "width=1000,height=600,scrollbars=yes,menubar=no,status=yes,resizable=yes,screenx=100,screeny=10"
            );
            return false;
        });

        $(document).on("click", ".delete-button", function () {
            const thisAction = $(this);
            let action = thisAction.attr("data-action");
            let callBackFuncStatus = 0;
            if (thisAction.attr("data-callback")) {
                callBackFuncStatus = 1;
            }

            Swal.fire({
                title: "Do you want to delete?",
                confirmButtonText: "Yes",
                showDenyButton: true,
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader(
                                "X-CSRF-Token",
                                $('meta[name="csrf-token"]').attr("content")
                            );
                        },
                        type: "DELETE",
                        dataType: "json",
                        success: function (response) {
                            if ($(".dataTable").length) {
                                $(".dataTable").DataTable().ajax.reload();
                            }
                            success_alert(response.message, response.title);
                            if (callBackFuncStatus == 1) {
                                let callBackFunc = eval(
                                    thisAction.attr("data-callback")
                                );
                                if (typeof callBackFunc == "function") {
                                    callBackFunc(response, thisAction);
                                }
                            }
                        },
                        error: function (response) {
                            let data = response.responseJSON;
                            error_alert(data.message, data.title);
                        },
                    });
                }
            });
        });

        $(document).on("click", ".update-status-button", function () {
            const thisAction = $(this);
            let action = thisAction.attr("data-action");
            let update_status = thisAction.attr("data-update_status");
            let table = thisAction.closest('table').DataTable();

            Swal.fire({
                title: "Do you want to update status?",
                confirmButtonText: "Yes",
                showDenyButton: true,
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader(
                                "X-CSRF-Token",
                                $('meta[name="csrf-token"]').attr("content")
                            );
                        },
                        type: "PATCH",
                        data: {
                            status: update_status,
                        },
                        dataType: "json",
                        success: function (response) {
                            success_alert(response.message, response.title);
                            if (table) {
                                table.ajax.reload(null, false);
                            } else {
                                thisAction.parent().html(response.data);
                            }
                        },
                        error: function (response) {
                            let data = response.responseJSON;
                            error_alert(data.message, data.title);
                        },
                    });
                }
            });
        });

        $(document).on("click", ".photo-library-element", function () {
            let thumb_image = $(this).attr("data-thumb_image");
            let actual_image_name = $(this).attr("data-actual_image_name");
            let caption = $(this).attr("data-caption");
            let id = $(this).attr("data-id");
            let div_id = $("#photo_library_div_id").val();

            var img = `<img class="img-responsive img-thumbnail image-library-preview" src="${thumb_image}" alt="${caption}"/>`;

            window.opener.document.getElementById(
                `photo-library-preview${div_id}`
            ).innerHTML = img;
            window.opener.document.getElementById(`image_alt${div_id}`).value =
                caption;
            window.opener.document.getElementById(
                `image_title${div_id}`
            ).value = caption;
            window.opener.document.getElementById(
                `photo_library_name${div_id}`
            ).value = actual_image_name;

            window.close();
        });

        $(document).on("click", ".show-common-modal", function () {
            $("#" + $(this).attr("data-modal_id")).modal("show");
        });

        $(document).on("click", ".cke_dialog_close_button, .cke_dialog_ui_button", function () {
            Swal.close();
        });

    });
})(jQuery);

var base_url = $('meta[name="base-url"]').attr("content");
let exceptName = ["_token", "_method"];

/**
 * Form submission
 * @param any e
 * @param any form
 * @param void
 */
function ajaxSubmit(e, form) {
    e.preventDefault();

    let resetValue = true;
    if (e.target.getAttribute("data-resetvalue")) {
        resetValue = e.target.getAttribute("data-resetvalue");
    }

    let identifire = e.submitter;
    let buttonValue = identifire.innerHTML;

    $(e.currentTarget.submit).val("Wait..");

    for (var instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var action = form.attr("action");
    var CallBackFunction = eval(form.attr("data"));
    var formAction = e.target;
    var formData = new FormData(formAction);

    formData.set("action_button_name", e.submitter.value);

    identifire.innerHTML = `<div class="spinner-border spinner-border-sm" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>`;

    $.ajax({
        type: "POST",
        url: action,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
        data: formData,
        async: false,
        success: function (response) {
            removeFormValidation(form, formData, resetValue);

            if (response.success == true) {
                $("#addForm").removeClass("was-validated");
                success_alert(response.message, response.title);

                if (typeof response.data != "undefined") {
                    let values = response.data;
                    // Iterate over the properties of response.data
                    for (const fieldName in values) {
                        if (values.hasOwnProperty(fieldName)) {
                            const value = values[fieldName];
                            if (
                                form.find(`input[name='old_${fieldName}']`)
                                    .length
                            ) {
                                form.find(`input[name='old_${fieldName}']`).val(
                                    value
                                );
                            }
                        }
                    }
                }

                if (typeof CallBackFunction == "function") {
                    if (response.hasOwnProperty("data")) {
                        CallBackFunction(response);
                    } else {
                        CallBackFunction(response);
                    }
                }
            } else if (response.success == "exist") {
                warning_alert(response.message, response.title);
            } else {
                error_alert(response.message, response.title);
            }

            setTimeout(() => {
                identifire.innerHTML = buttonValue;
                $(`#${form.attr("id")}`).removeClass("was-validated");
            }, 1000);
        },
        error: function (response) {
            removeFormValidation(form, formData, false, false);

            let data = response.responseJSON || {};
            let hasErrors = false;
            let firstInvalidElement = null;

            // Configure Toastr for prominent validation alerts
            if (typeof toastr !== "undefined") {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 8000,
                    extendedTimeOut: 3000,
                    positionClass: "toast-top-right",
                    preventDuplicates: false,
                };
            }

            if (typeof data.errors !== "undefined" && Object.keys(data.errors).length > 0) {
                hasErrors = true;

                // Show validation errors in toaster alert and highlight fields
                for (let fieldName in data.errors) {
                    if (data.errors.hasOwnProperty(fieldName)) {
                        const errorMessages = data.errors[fieldName];
                        let currentErrorMessage = errorMessages.join("<br>");

                        // Display toaster alert for each validation error
                        errorMessages.forEach((msg) => {
                            if (typeof toastr !== "undefined") {
                                toastr.error(msg, "Validation Error");
                            }
                        });

                        // Locate target element by name, name[], or id
                        let $target = form.find(`[name='${fieldName}']`);
                        if (!$target.length) {
                            $target = form.find(`[name='${fieldName}[]']`);
                        }
                        if (!$target.length) {
                            $target = form.find(`#${fieldName}`);
                        }

                        if ($target.length) {
                            $target.addClass("is-invalid");

                            // Find and show invalid-feedback message
                            let $feedback = $target.siblings(".invalid-feedback");
                            if (!$feedback.length) {
                                $feedback = $target.parent().find(".invalid-feedback");
                            }
                            if (!$feedback.length) {
                                $feedback = $target.closest(".form-group, .row").find(".invalid-feedback").first();
                            }
                            if ($feedback.length) {
                                $feedback.html(currentErrorMessage).addClass("d-block").show();
                            }

                            // Highlight Select2 if applied
                            let $s2 = $target.siblings(".select2-container");
                            if (!$s2.length) {
                                $s2 = $target.parent().find(".select2-container");
                            }
                            if ($s2.length) {
                                $s2.addClass("is-invalid");
                                $s2.find(".select2-selection").css({
                                    "border-color": "#dc3545",
                                    "box-shadow": "0 0 0 0.25rem rgba(220, 53, 69, 0.25)"
                                });
                            }

                            // Highlight CKEditor if applied
                            let targetId = $target.attr("id");
                            if (targetId && window.CKEDITOR && CKEDITOR.instances && CKEDITOR.instances[targetId]) {
                                $("#cke_" + targetId).addClass("is-invalid").css({
                                    "border": "2px solid #dc3545",
                                    "border-radius": "4px",
                                    "box-shadow": "0 0 0 0.25rem rgba(220, 53, 69, 0.25)"
                                });
                            }

                            // Highlight Bootstrap Tagsinput if applied
                            let $tagsInput = $target.siblings(".bootstrap-tagsinput");
                            if ($tagsInput.length) {
                                $tagsInput.addClass("is-invalid").css({
                                    "border-color": "#dc3545",
                                    "box-shadow": "0 0 0 0.25rem rgba(220, 53, 69, 0.25)"
                                });
                            }

                            if (!firstInvalidElement) {
                                if ($s2.length) {
                                    firstInvalidElement = $s2;
                                } else if (targetId && $("#cke_" + targetId).length) {
                                    firstInvalidElement = $("#cke_" + targetId);
                                } else {
                                    firstInvalidElement = $target;
                                }
                            }
                        }
                    }
                }
            }

            // If no specific data.errors array, but a general message or 500 error
            if (!hasErrors) {
                if (data.message) {
                    error_alert(data.message, data.title || "Error");
                } else if (response.status === 422) {
                    error_alert("Please check all required fields and correct the highlighted errors.", "Validation Error");
                } else {
                    error_alert("An unexpected error occurred. Please try again.", "Error");
                }
            }

            // Smoothly scroll to the first invalid element with pulse highlight
            if (firstInvalidElement && firstInvalidElement.length) {
                $("html, body").animate({ scrollTop: firstInvalidElement.offset().top - 120 }, 400, function () {
                    firstInvalidElement.addClass("highlight-error-pulse");
                    setTimeout(function () {
                        firstInvalidElement.removeClass("highlight-error-pulse");
                    }, 1200);
                    if (firstInvalidElement.is(":visible") && firstInvalidElement.is("input, textarea, select")) {
                        firstInvalidElement.focus();
                    }
                });
            }

            setTimeout(() => {
                identifire.innerHTML = buttonValue;
            }, 1000);
        },
    });
}

/**
 * Success alert
 *
 * @param {string} text
 * @param {string} title
 * @param {integer} timer
 * @param void
 */
function success_alert(text, title = null, timer = 5000) {
    toastr.success(text, title, { timeOut: timer });
}

/**
 * warning alert
 *
 * @param {string} text
 * @param {string} title
 * @param {integer} timer
 * @param void
 */
function warning_alert(text, title = null, timer = 5000) {
    toastr.warning(text, title, { timeOut: timer });
}

/**
 * error alert
 *
 * @param {string} text
 * @param {string} title
 * @param {integer} timer
 * @param void
 */
function error_alert(text, title = null, timer = 5000) {
    toastr.error(text, title, { timeOut: timer });
}

/**
 *
 * @param {*} form
 * @param {*} resetValue
 * @param void
 */
function removeFormValidation(
    form,
    formData,
    resetValue = false,
    resetSelectValue = true
) {
    form.removeClass("was-validated");

    if (resetValue) {
        for (var instance in CKEDITOR.instances) {
            try {
                CKEDITOR.instances[instance].setData("");
            } catch (e) {}
        }
        form.find(".form-preview-image").remove();
    }

    if (resetSelectValue) {
        form.find(":checkbox")
            .filter(":checked")
            .each(function () {
                $(this).prop("checked", false);
            });

        form.find("select").each(function () {
            $(this).find("option:selected").prop("selected", false);
            $(this).trigger("change");
        });
        form.find(`textarea`).val("");
    }

    form.find(".is-invalid").removeClass("is-invalid");
    form.find(".invalid-feedback").removeClass("d-block").html("");
    form.find(".select2-container").removeClass("is-invalid").find(".select2-selection").css({ "border-color": "", "box-shadow": "" });
    form.find(".cke").removeClass("is-invalid").css({ "border": "", "box-shadow": "" });
    form.find(".bootstrap-tagsinput").removeClass("is-invalid").css({ "border-color": "", "box-shadow": "" });

    form.find(":input, select").each(function () {
        var elementType = this.tagName.toLowerCase();
        if (elementType === "input") {
            var inputObject = $(this);
            var inputName = inputObject.attr("name");
            var inputType = inputObject.attr("type");

            if (!["radio", "checkbox"].includes(inputType)) {
                if (resetValue == true && !exceptName.includes(inputName)) {
                    form.find(`input[name='${inputName}']`).val("");
                }
            } else if (["radio"].includes(inputType)) {
                if (resetSelectValue) {
                    inputObject.prop("checked", false);
                }
            }
        }
    });
}

/**
 * Set form value
 *
 * @param {*} route
 * @param {*} form
 * @param {*} formData
 * @return {*} promise
 */
function setFormValue(route, form, formData) {
    return $.ajax({
        type: "get",
        url: route,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
        async: false,
    })
        .then((response) => {
            let formValue = response.data;

            /**
             * Remove for values
             */
            removeFormValidation(form, formData);

            for (const pair of formData.entries()) {
                fieldName = pair[0];
                fieldType = pair[1];

                if (!exceptName.includes(fieldName)) {
                    /**
                     * set old value
                     */
                    if (
                        form.find(`input[name='old_${fieldName}']`).length == 1
                    ) {
                        form.find(`input[name='old_${fieldName}']`).val(
                            formValue[fieldName]
                        );
                    }

                    let inputField = form.find(`input[name='${fieldName}']`);

                    if (inputField.hasClass("file-preview")) {
                        /**
                         * set preview file
                         */
                        if (
                            formValue[fieldName] &&
                            form.find(`#preview_file_${fieldName}`).length == 1
                        ) {
                            form.find(`#preview_file_${fieldName}`).html(
                                `<img src="${
                                    base_url +
                                    "/storage/" +
                                    formValue[fieldName]
                                }"  class="form-preview-image img-responsive img-rounded"/>`
                            );
                        }
                    }

                    if (
                        form.find(`input[type='radio'][name='${fieldName}']`)
                            .length
                    ) {
                    } else if (
                        form.find(`textarea[name='${fieldName}']`).length
                    ) {
                        form.find(`textarea[name='${fieldName}']`).val(
                            formValue[fieldName]
                        );
                    } else if (form.find(`input[name='${fieldName}']`).length) {
                        const currentInput = form.find(
                            `input[name='${fieldName}']`
                        );

                        // Check if the input type is not 'file'
                        if (currentInput.attr("type") !== "file") {
                            currentInput.val(formValue[fieldName]);
                        }
                    }
                }
            }

            form.find("input[type='radio'], select").each(function () {
                var elementType = this.tagName.toLowerCase();

                var inputName = $(this).attr("name");
                var inputObject = $(this);

                if (elementType == "select") {
                    let fieldname = inputObject.attr("data-fieldname");
                    if (!fieldname) {
                        fieldname = inputName;
                    }

                    let fieldid = inputObject.attr("data-fieldid");
                    if (!fieldid) {
                        fieldid = "id";
                    }

                    if (inputName.includes("[") && inputName.includes("]")) {
                        if (formValue[fieldname]) {
                            formValue[fieldname].map(function (dataValue) {
                                $(
                                    'select[name="' +
                                        inputName +
                                        '"] option[value="' +
                                        dataValue[fieldid] +
                                        '"]'
                                ).prop("selected", true);
                            });
                            inputObject.trigger("change");
                        }
                    } else if (formValue[fieldname]) {
                        $(this).map(function (dataValue) {
                            $(
                                'select[name="' +
                                    inputName +
                                    '"] option[value="' +
                                    formValue[fieldname] +
                                    '"]'
                            ).prop("selected", true);
                        });
                        $(this).trigger("change");
                    }
                } else if ($(`input[type='radio'][name=${inputName}]`)) {
                    $(
                        `input[type='radio'][name=${inputName}][value='${formValue[inputName]}']`
                    ).prop("checked", true);
                }
            });

            return formValue;
        })
        .catch(function (response) {
            let data = response.responseJSON;
            if (
                data &&
                typeof data.message !== "undefined" &&
                typeof data.title !== "undefined"
            ) {
                error_alert(data.message, data.title);
            }
            return data;
        });
}

/**
 * Get ajax data
 *
 * @param {*} route
 * @return {*} promise
 */
function getAjaxData(route) {
    return $.ajax({
        type: "get",
        url: route,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
        async: false,
    })
        .then((response) => {
            let formValue = response.data;

            return formValue;
        })
        .catch(function (response) {
            let data = response.responseJSON;
            error_alert(data.message, data.title);

            return data;
        });
}

/**
 * Form Validation
 */
function formValidation() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName("needs-validation");

    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                event.preventDefault();
                event.stopPropagation();

                // Synchronize all CKEditor instances before checking validity
                if (typeof CKEDITOR !== "undefined" && CKEDITOR.instances) {
                    for (var instance in CKEDITOR.instances) {
                        try {
                            CKEDITOR.instances[instance].updateElement();
                        } catch (e) {}
                    }
                }

                var $form = $(form);
                var hasError = false;
                var missingFields = [];
                var firstInvalidEl = null;

                // Validate required inputs, selects, and textareas
                var requiredFields = form.querySelectorAll("input[required], select[required], textarea[required]");

                Array.from(requiredFields).forEach(function (field) {
                    var $field = $(field);
                    var val = $field.val();
                    var isEmpty = !val || (typeof val === "string" && val.trim() === "");

                    if (field.type === "checkbox" || field.type === "radio") {
                        isEmpty = !field.checked;
                    }

                    if (isEmpty) {
                        hasError = true;
                        field.classList.add("is-invalid");

                        // Highlight Select2
                        var $s2 = $field.siblings(".select2-container");
                        if (!$s2.length) {
                            $s2 = $field.parent().find(".select2-container");
                        }
                        if ($s2.length) {
                            $s2.addClass("is-invalid");
                            $s2.find(".select2-selection").css({
                                "border-color": "#dc3545",
                                "box-shadow": "0 0 0 0.25rem rgba(220, 53, 69, 0.25)"
                            });
                        }

                        // Highlight CKEditor
                        if (field.id && window.CKEDITOR && CKEDITOR.instances && CKEDITOR.instances[field.id]) {
                            $("#cke_" + field.id).addClass("is-invalid").css({
                                "border": "2px solid #dc3545",
                                "border-radius": "4px",
                                "box-shadow": "0 0 0 0.25rem rgba(220, 53, 69, 0.25)"
                            });
                        }

                        // Label for toaster alert
                        var fieldLabel = $field.closest(".form-group, .row").find("label").first().text().replace("*", "").trim();
                        if (!fieldLabel) {
                            fieldLabel = $field.attr("placeholder") || $field.attr("name") || "Required field";
                        }
                        if (fieldLabel && !missingFields.includes(fieldLabel)) {
                            missingFields.push(fieldLabel);
                        }

                        if (!firstInvalidEl) {
                            firstInvalidEl = $s2.length ? $s2 : (field.id && $("#cke_" + field.id).length ? $("#cke_" + field.id) : $field);
                        }
                    } else {
                        field.classList.remove("is-invalid");
                        var $s2 = $field.siblings(".select2-container");
                        if ($s2.length) {
                            $s2.removeClass("is-invalid");
                            $s2.find(".select2-selection").css({ "border-color": "", "box-shadow": "" });
                        }
                        if (field.id && $("#cke_" + field.id).length) {
                            $("#cke_" + field.id).removeClass("is-invalid").css({ "border": "", "box-shadow": "" });
                        }
                    }
                });

                form.classList.add("was-validated");

                if (hasError) {
                    if (missingFields.length > 0) {
                        missingFields.forEach(function (lbl) {
                            if (typeof toastr !== "undefined") {
                                toastr.error(lbl + " is required.", "Validation Error", {
                                    timeOut: 7000,
                                    closeButton: true,
                                    progressBar: true,
                                });
                            }
                        });
                    } else {
                        warning_alert("Please fulfill all required fields.");
                    }

                    if (firstInvalidEl && firstInvalidEl.length) {
                        $("html, body").animate({ scrollTop: firstInvalidEl.offset().top - 120 }, 400, function () {
                            firstInvalidEl.addClass("highlight-error-pulse");
                            setTimeout(function () {
                                firstInvalidEl.removeClass("highlight-error-pulse");
                            }, 1200);
                        });
                    }
                    $form.find(".actionBtn").prop("disabled", false);
                } else {
                    $form.find(".actionBtn").prop("disabled", true);
                    ajaxSubmit(event, $form);
                    $form.find(".actionBtn").prop("disabled", false);
                }
            },
            false
        );
    });
}

/**
 * Set alert message
 *
 *
 * @param object response
 * @param type string|null
 * @return void
 */
function setAlertMessage(response, type = null) {
    if (type == "success" || response.success == true) {
        success_alert(response.message, response.title);
    } else if (type == "warning" || response.success == "exist") {
        warning_alert(response.message, response.title);
    } else if (type == "error" || response.success == false) {
        error_alert(response.message, response.title);
    }
}

$(document).on("change", "#language_id_", async function () {
    try {
        let languageId = $(this).val();
        const baseUrl = $('meta[name="base-url"]').attr('content');
        await axios.post(`${baseUrl}/admin/menu/setup/language`, {
            language_id: languageId,
        });
        window.location.reload();
    } catch (error) {
        console.error(error);
    }
});