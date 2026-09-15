"use strict";

/**
 * Create callback function
 */
let showCallBackCreateData = function (response) {
    let form = $("#breakingNewsForm");
    form.find('input[name="_method"]').remove();

    let storeUrl = form.attr("data-store-url");
    if (storeUrl) {
        form.attr("action", storeUrl);
    }

    let classes = form.attr('data-create_breaking_news') || '';

    setTimeout(() => {
        form.find("#submitButton").html("Save");
        if (classes.trim()) {
            form.addClass(classes);
        }
        form[0].reset();
        $("#language_id").val($("#language_id option:first").val()).trigger('change');
        $(".dataTable").DataTable().ajax.reload(null, false);
    }, 1500);
};

$(document).ready(function () {
    let form = $("#breakingNewsForm");
    let originalStoreUrl = form.attr("action");
    form.attr("data-store-url", originalStoreUrl);

    /**
     * Reset button action
     */
    $("#resetButton").on("click", function () {
        form.find('input[name="_method"]').remove();
        form.attr("action", originalStoreUrl);
        $("#submitButton").html("Save");
        $("#priority").val(0);
        $("#status").val(1);
        $("#start_time").val("");
        $("#end_time").val("");
        $("#url").val("");
        $("#breaking_news").val("");
    });

    /**
     * Edit breaking news button
     */
    $(document).on("click", ".edit-breaking-news-button", function () {
        let editRoute = $(this).attr("data-route");
        let updateAction = $(this).attr("data-action");

        $("#submitButton").html("Update");
        form.attr("action", updateAction);

        if (!form.find('input[name="_method"]').length) {
            form.prepend('<input type="hidden" name="_method" value="patch" />');
        }

        form.removeClass('d-none');

        $.ajax({
            url: editRoute,
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response && response.data) {
                    let item = response.data;
                    let headline = item.headline || "";
                    let itemUrl = item.url || "";

                    if (!headline && item.title) {
                        try {
                            let parsed = JSON.parse(item.title);
                            headline = parsed.news_title || item.title;
                            if (!itemUrl && parsed.url) {
                                itemUrl = parsed.url;
                            }
                        } catch (e) {
                            headline = item.title;
                        }
                    }

                    $("#breaking_news").val(headline);
                    $("#url").val(itemUrl);
                    $("#priority").val(item.priority !== undefined ? item.priority : 0);
                    $("#status").val(item.status !== undefined ? item.status : 1);
                    $("#start_time").val(item.formatted_start_time || "");
                    $("#end_time").val(item.formatted_end_time || "");

                    if (item.language_id) {
                        $("#language_id").val(item.language_id).trigger("change");
                    }

                    // Scroll smoothly to form
                    $('html, body').animate({
                        scrollTop: form.offset().top - 80
                    }, 300);
                }
            },
            error: function () {
                toastr.error("Failed to fetch breaking news data.");
            }
        });
    });

    /**
     * Instant Status Toggle (ON/OFF) without editing article
     */
    $(document).on("click", ".toggle-breaking-status", function (e) {
        e.preventDefault();
        let btn = $(this);
        let actionUrl = btn.attr("data-action");
        let newStatus = btn.attr("data-status");

        btn.prop("disabled", true);
        btn.html('<i class="fas fa-spinner fa-spin"></i>');

        $.ajax({
            url: actionUrl,
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content") || $('input[name="_token"]').val(),
                status: newStatus
            },
            success: function (res) {
                if (res.success) {
                    toastr.success(res.message || "Status updated successfully.");
                    $(".dataTable").DataTable().ajax.reload(null, false);
                } else {
                    toastr.error(res.message || "Failed to update status.");
                }
            },
            error: function (xhr) {
                let message = "Failed to update status.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                toastr.error(message);
                btn.prop("disabled", false);
            }
        });
    });

    /**
     * Frontend News Ticker Section Toggle (Active / Deactive whole ticker on frontend)
     */
    $(document).on("click", "#toggleTickerSectionBtn", function (e) {
        e.preventDefault();
        let btn = $(this);
        let actionUrl = btn.attr("data-action");
        let targetStatus = btn.attr("data-status");
        let originalHtml = btn.html();

        btn.prop("disabled", true);
        btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Processing...');

        $.ajax({
            url: actionUrl,
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content") || $('input[name="_token"]').val(),
                status: targetStatus
            },
            success: function (res) {
                if (res.success) {
                    toastr.success(res.message);
                    if (res.status == 1) {
                        $("#tickerStatusBadge").html(
                            '<span class="badge bg-success px-3 py-2 fs-14"><i class="fas fa-check-circle me-1"></i> Active (Visible on Frontend)</span>'
                        );
                        btn.removeClass("btn-outline-success").addClass("btn-outline-danger");
                        btn.attr("data-status", 0);
                        btn.html('<i class="fas fa-eye-slash me-1"></i> Deactivate Ticker');
                    } else {
                        $("#tickerStatusBadge").html(
                            '<span class="badge bg-danger px-3 py-2 fs-14"><i class="fas fa-times-circle me-1"></i> Inactive (Hidden on Frontend)</span>'
                        );
                        btn.removeClass("btn-outline-danger").addClass("btn-outline-success");
                        btn.attr("data-status", 1);
                        btn.html('<i class="fas fa-eye me-1"></i> Activate Ticker');
                    }
                } else {
                    toastr.error(res.message || "Failed to update ticker status.");
                    btn.html(originalHtml);
                }
            },
            error: function (xhr) {
                let message = "Failed to update ticker status.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                toastr.error(message);
                btn.html(originalHtml);
            },
            complete: function () {
                btn.prop("disabled", false);
            }
        });
    });
});
