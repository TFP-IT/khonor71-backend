$(function() {
    $("#selectAll").on('change', function() {
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
    });

    $(document).on('change', '.select-sub', function() {
        $(this).closest('tr').find('.permissions input[type=checkbox]').prop('checked', $(this).prop('checked'));
    });

    $(document).on('change', '.permissions input[type=checkbox]', function() {
        var $row = $(this).closest('tr');
        var total = $row.find('.permissions input[type=checkbox]').length;
        var checked = $row.find('.permissions input[type=checkbox]:checked').length;
        $row.find('.select-sub').prop('checked', total > 0 && total === checked);
    });

    // Initialize row select-all state on page load (e.g. on role-edit)
    $('tr.sub-select').each(function() {
        var total = $(this).find('.permissions input[type=checkbox]').length;
        var checked = $(this).find('.permissions input[type=checkbox]:checked').length;
        if (total > 0 && total === checked) {
            $(this).find('.select-sub').prop('checked', true);
        }
    });

    // Live search for permission tables and rows
    $('#permissionSearch').on('keyup', function() {
        var val = $(this).val().toLowerCase().trim();
        if (!val) {
            $('tr.sub-select').show();
            $('.permission-section').show();
            return;
        }

        $('.permission-section').each(function() {
            var sectionHasMatch = false;
            var headerText = $(this).find('h4').text().toLowerCase();

            if (headerText.indexOf(val) !== -1) {
                sectionHasMatch = true;
                $(this).find('tr.sub-select').show();
            } else {
                $(this).find('tr.sub-select').each(function() {
                    var rowText = $(this).text().toLowerCase();
                    if (rowText.indexOf(val) !== -1) {
                        $(this).show();
                        sectionHasMatch = true;
                    } else {
                        $(this).hide();
                    }
                });
            }

            if (sectionHasMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
