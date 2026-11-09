@extends('setting::settings')
@section('title', localize('activity_log'))

@push('css')
<style>
    .diff-table td { vertical-align: top; font-size: 13px; }
    .diff-old { background-color: #ffeef0; color: #b02a37; }
    .diff-new { background-color: #e8f5e9; color: #1e7e34; }
    .filter-card { background: #fdfdfd; border: 1px dashed #ced4da; }
</style>
@endpush

@section('setting_content')
    @include('backend.layouts.common.validation')
    @include('backend.layouts.common.message')

    <div class="card mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">
                        <i class="fas fa-user-shield text-primary me-2"></i>{{ localize('activity_log') }}
                    </h6>
                    <small class="text-muted">অ্যাডমিন প্যানেল ব্যবহারকারীদের সমস্ত কাজের নজরদারি ও পরিবর্তন ইতিহাস (Audit Trail)</small>
                </div>
                <div class="actions text-end">
                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse"
                        data-bs-target="#filterPanel" aria-expanded="false" aria-controls="filterPanel">
                        <i class="fas fa-filter me-1"></i> {{ localize('filter') }}
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            {{-- Filter Panel --}}
            <div class="collapse mb-4" id="filterPanel">
                <div class="card card-body filter-card p-3 shadow-none">
                    <div class="row g-2">
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold">{{ localize('user') }}</label>
                            <select id="filter_user_id" class="form-select form-select-sm select-basic-single">
                                <option value="">-- All Users --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->full_name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label small fw-semibold">{{ localize('action') }}</label>
                            <select id="filter_event" class="form-select form-select-sm">
                                <option value="">-- All Actions --</option>
                                <option value="created">Created</option>
                                <option value="updated">Updated</option>
                                <option value="deleted">Deleted</option>
                                <option value="login">Login</option>
                                <option value="logout">Logout</option>
                                <option value="failed_login">Failed Login</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label small fw-semibold">{{ localize('module') }} / Subject</label>
                            <select id="filter_log_name" class="form-select form-select-sm">
                                <option value="">-- All Modules --</option>
                                @foreach($logNames as $lName)
                                    <option value="{{ $lName }}">{{ $lName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label small fw-semibold">{{ localize('from_date') }}</label>
                            <input type="date" id="filter_from_date" class="form-control form-control-sm">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label small fw-semibold">{{ localize('to_date') }}</label>
                            <input type="date" id="filter_to_date" class="form-control form-control-sm">
                        </div>

                        <div class="col-md-1 d-flex align-items-end">
                            <button type="button" id="btn_apply_filter" class="btn btn-primary btn-sm w-100 me-1" title="{{ localize('find') }}">
                                <i class="fas fa-search"></i>
                            </button>
                            <button type="button" id="btn_reset_filter" class="btn btn-outline-secondary btn-sm w-100" title="{{ localize('reset') }}">
                                <i class="fas fa-undo"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DataTable Container --}}
            <div class="table_customize table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    {{-- Details / Diff Modal --}}
    <div class="modal fade" id="activityDetailsModal" tabindex="-1" aria-labelledby="activityDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light py-2">
                    <h6 class="modal-title fw-bold" id="activityDetailsModalLabel">
                        <i class="fas fa-history text-primary me-2"></i>{{ localize('activity_log') }} - {{ localize('details') }}
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3" id="activityModalContent">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status"></div>
                        <div class="text-muted mt-2">Loading details...</div>
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">{{ localize('close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function() {
            var table = $('#activity-tracking-table');

            // Apply Filters
            $('#btn_apply_filter').on('click', function() {
                table.on('preXhr.dt', function(e, settings, data) {
                    data.user_id   = $('#filter_user_id').val();
                    data.event     = $('#filter_event').val();
                    data.log_name  = $('#filter_log_name').val();
                    data.from_date = $('#filter_from_date').val();
                    data.to_date   = $('#filter_to_date').val();
                });
                table.DataTable().ajax.reload();
            });

            // Reset Filters
            $('#btn_reset_filter').on('click', function() {
                $('#filter_user_id').val('').trigger('change');
                $('#filter_event').val('');
                $('#filter_log_name').val('');
                $('#filter_from_date').val('');
                $('#filter_to_date').val('');

                table.on('preXhr.dt', function(e, settings, data) {
                    data.user_id   = '';
                    data.event     = '';
                    data.log_name  = '';
                    data.from_date = '';
                    data.to_date   = '';
                });
                table.DataTable().ajax.reload();
            });

            // View Activity Details Modal
            $(document).on('click', '.view-activity-details', function() {
                var activityId = $(this).data('id');
                var url = "{{ route('activity.tracking.details', ':id') }}".replace(':id', activityId);

                $('#activityModalContent').html(
                    '<div class="text-center py-4">' +
                    '<div class="spinner-border text-primary" role="status"></div>' +
                    '<div class="text-muted mt-2">Loading details...</div></div>'
                );
                $('#activityDetailsModal').modal('show');

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#activityModalContent').html(response.html);
                        } else {
                            $('#activityModalContent').html('<div class="alert alert-danger m-3">Could not load details.</div>');
                        }
                    },
                    error: function() {
                        $('#activityModalContent').html('<div class="alert alert-danger m-3">An error occurred while loading details.</div>');
                    }
                });
            });
        });
    </script>
@endpush
