<div data-tab="news_list" class="tab_content opacity-0 invisible transition-all duration-300 ease-in-out">
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">{{ localize('probashi_news_list') }}</h5>
        </div>
        
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>{{ localize('success') }}!</strong>
                    <p class="mt-1 mb-0">{{ session('success') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>{{ localize('Whoops! Something went wrong.') }}</strong>
                    <p class="mt-1 mb-0">{{ session('fail') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(isset($dataTable) && method_exists($dataTable, 'table'))
                {!! $dataTable->table(['class' => 'table table-striped table-bordered']) !!}
            @else
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    DataTable is not available. Please check the controller setup.
                </div>
            @endif
        </div>
    </div>

    @if(isset($dataTable) && method_exists($dataTable, 'scripts'))
        @push('scripts')
            {!! $dataTable->scripts() !!}
        @endpush
    @endif

    @push('styles')
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables/buttons.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap5.min.css') }}">
    @endpush
    
    @push('scripts')
        <script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                // Delete confirmation handler
                $(document).on('click', '.delete-confirm-data-table', function(e) {
                    e.preventDefault();
                    const url = $(this).data('route');
                    const csrf = $(this).data('csrf');
                    
                    if (confirm('Are you sure you want to delete this item?')) {
                        $.ajax({
                            url: url,
                            method: 'DELETE',
                            data: {
                                _token: csrf
                            },
                            success: function(response) {
                                if (response.success) {
                                    $('#web-probashinews-table').DataTable().ajax.reload();
                                    toastr.success('Item deleted successfully');
                                } else {
                                    toastr.error('Failed to delete item');
                                }
                            },
                            error: function() {
                                toastr.error('An error occurred');
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
</div>