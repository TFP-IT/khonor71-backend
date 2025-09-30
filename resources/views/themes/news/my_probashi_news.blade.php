<x-web-layout>
    <section style="max-width: 1400px; margin: 24px auto 24px auto; padding: 0 15px;">
        <div style="background: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <div style="padding: 16px; border-bottom: 1px solid #e1e9f1; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h6 style="margin: 0; font-size: 1.0625rem; font-weight: 600;">{{ localize('probashi_news_list') }}</h6>
                </div>
                <div style="text-align: right;">

                    <a href="{{ route('account.probashi.news.create') }}" style="padding: 4px 8px; background: #28a745; color: #fff; border-radius: 4px; text-decoration: none; font-size: 0.875rem;">
                        +&nbsp;{{ localize('add_new_probashi_news') }}
                    </a>

                </div>
            </div>

            <div style="padding: 24px;">
                @if (session('success'))
                <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 4px; position: relative; margin-bottom: 16px;">
                    <strong>{{ localize('success') }}!</strong>
                    <p style="margin: 4px 0 0;">{{ session('success') }}</p>
                    <button style="position: absolute; top: 12px; right: 12px; background: none; border: none; cursor: pointer; font-size: 1rem;" onclick="this.parentElement.style.display='none';">✕</button>
                </div>
                @endif
                @if (session('fail'))
                <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; position: relative; margin-bottom: 16px;">
                    <strong>{{ localize('Whoops! Something went wrong.') }}</strong>
                    <p style="margin: 4px 0 0;">{{ session('fail') }}</p>
                    <button style="position: absolute; top: 12px; right: 12px; background: none; border: none; cursor: pointer; font-size: 1rem;" onclick="this.parentElement.style.display='none';">✕</button>
                </div>
                @endif

                <!-- Search and Length Controls -->
                <div style="display: flex; flex-wrap: wrap; gap: 16px; margin-bottom: 16px;">
                    <div style="flex: 1; min-width: 200px;">
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <label>Show</label>
                            <select id="entriesPerPage" style="padding: 4px; border: 1px solid #ced4da; border-radius: 4px; font-size: 0.875rem;">
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                            <label>entries</label>
                        </div>
                    </div>
                    <div style="flex: 1; min-width: 200px; display: flex; justify-content: flex-end;">
                        <form method="GET" style="display: flex; max-width: 300px; width: 100%;">
                            <div style="display: flex; width: 100%;">
                                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search..." id="searchInput" style="padding: 4px 8px; border: 1px solid #ced4da; border-radius: 4px 0 0 4px; font-size: 0.875rem; flex: 1;">
                                <button type="submit" style="padding: 4px 12px; border: 1px solid #ced4da; border-left: none; background: #f8f9fa; border-radius: 0 4px 4px 0; cursor: pointer;">
                                    🔍
                                </button>
                                @if($search)
                                <a href="{{ request()->url() }}" style="padding: 4px 12px; border: 1px solid #dc3545; background: #f8d7da; color: #721c24; border-radius: 4px; margin-left: 4px; text-decoration: none;">
                                    ✕
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Table -->
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 0.875rem;">
                        <thead style="background: #f8f9fa;">
                            <tr>
                                <th style="text-align: center; padding: 8px; border: 1px solid #dee2e6; width: 50px;">{{ localize('sl') }}</th>
                                <th style="padding: 8px; border: 1px solid #dee2e6; width: 150px;">{{ localize('thumbnail_image') }}</th>
                                <th style="padding: 8px; border: 1px solid #dee2e6; width: 150px;">{{ localize('video') }}</th>
                                <th style="padding: 8px; border: 1px solid #dee2e6;">{{ localize('title') }}</th>
                                <th style="padding: 8px; border: 1px solid #dee2e6;">{{ localize('post_by') }}</th>
                                <th style="padding: 8px; border: 1px solid #dee2e6;">{{ localize('views') }}</th>
                                <th style="padding: 8px; border: 1px solid #dee2e6;">{{ localize('release_date') }}</th>
                                <th style="padding: 8px; border: 1px solid #dee2e6;">{{ localize('post_date') }}</th>
                                <th style="padding: 8px; border: 1px solid #dee2e6;">{{ localize('language') }}</th>
                                <th style="padding: 8px; border: 1px solid #dee2e6;">{{ localize('status') }}</th>
                                <th style="text-align: center; padding: 8px; border: 1px solid #dee2e6; width: 115px;">{{ localize('action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($probashiNews as $index => $news)
                            <tr style="background: #fff;">
                                <td style="text-align: center; padding: 8px; border: 1px solid #dee2e6;">{{ $probashiNews->firstItem() + $index }}</td>
                                <td style="padding: 8px; border: 1px solid #dee2e6;">
                                    @php
                                    $image = $news->thumbnail_image ? asset('storage/' . $news->thumbnail_image) : asset('backend/assets/dist/img/nopreview.jpeg');
                                    @endphp
                                    <img src="{{ $image }}" alt="Image" style="height: 100px; width: 150px; border: 1px solid #e1e9f1; border-radius: 4px;">
                                </td>
                                <td style="padding: 8px; border: 1px solid #dee2e6;">
                                    @if($news->video)
                                    @php
                                    $video_path = asset('storage/' . $news->video);
                                    @endphp
                                    <video style="height: 100px; width: 150px; border: 1px solid #e1e9f1; border-radius: 4px;" controls>
                                        <source src="{{ $video_path }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    @elseif($news->video_url)
                                    @php
                                    $embedUrl = str_replace("watch?v=", "embed/", $news->video_url);
                                    $embedUrl = str_replace("youtu.be/", "www.youtube.com/embed/", $embedUrl);
                                    @endphp
                                    <div style="width: 150px; height: 100px;">
                                        <iframe style="width: 100%; height: 100%; border: none; border-radius: 4px;" src="{{ $embedUrl }}" allowfullscreen></iframe>
                                    </div>
                                    @else
                                    <img src="{{ asset('backend/assets/dist/img/video_thumb.png') }}" alt="No video" style="height: 100px; width: 150px; border: 1px solid #e1e9f1; border-radius: 4px;">
                                    @endif
                                </td>
                                <td style="padding: 8px; border: 1px solid #dee2e6;">
                                    <div style="max-width: 300px; overflow-wrap: break-word;">
                                        {{ Str::limit($news->title, 50) }}
                                    </div>
                                </td>
                                <td style="padding: 8px; border: 1px solid #dee2e6;">{{ $news->webUser->name ?? 'N/A' }}</td>
                                <td style="padding: 8px; border: 1px solid #dee2e6;">{{ number_format($news->total_view) }}</td>
                                <td style="padding: 8px; border: 1px solid #dee2e6;">{{ \Carbon\Carbon::parse($news->publish_date)->format('Y-m-d') }}</td>
                                <td style="padding: 8px; border: 1px solid #dee2e6;">{{ \Carbon\Carbon::parse($news->created_at)->format('Y-m-d') }}</td>
                                <td style="padding: 8px; border: 1px solid #dee2e6;">{{ $news->language->langname ?? 'N/A' }}</td>
                                <td style="padding: 8px; border: 1px solid #dee2e6;">
                                    @if($news->status === \App\Enums\ActivationStatusEnum::ACTIVE)
                                    <span style="padding: 4px 8px; background: #d4edda; color: #155724; border-radius: 4px; font-size: 0.875rem;">
                                        {{ localize('active') }}
                                    </span>
                                    @else
                                    <span style="padding: 4px 8px; background: #f8d7da; color: #721c24; border-radius: 4px; font-size: 0.875rem;">
                                        {{ localize('inactive') }}
                                    </span>
                                    @endif
                                </td>
                                <td style="text-align: center; padding: 8px; border: 1px solid #dee2e6;">
                                    <a href="{{ route('web.probashi-news.edit', ['probashiNews' => $news->id]) }}"
                                        style="padding: 4px 8px; background: rgba(40, 167, 69, 0.1); border: 1px solid rgba(40, 167, 69, 0.2); color: #28a745; border-radius: 4px; text-decoration: none; margin-right: 4px;"
                                        title="Edit">✎</a>
                                    <!-- <a href="javascript:void(0)"
                                        class="delete-confirm"
                                        style="padding: 4px 8px; background: rgba(220, 53, 69, 0.1); border: 1px solid rgba(220, 53, 69, 0.2); color: #dc3545; border-radius: 4px; text-decoration: none;"
                                        data-route="{{ route('web.probashi-news.destroy', $news->id) }}"
                                        data-csrf="{{ csrf_token() }}"
                                        title="Delete">🗑</a> -->
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" style="text-align: center; padding: 24px; border: 1px solid #dee2e6;">
                                    <div style="color: #6c757d;">
                                        <p style="margin: 0; font-size: 1rem;">No data available</p>
                                        @if($search)
                                        <small>No results found for "{{ $search }}"</small>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Info and Controls -->
                <div style="display: flex; flex-wrap: wrap; gap: 16px; margin-top: 16px;">
                    <div style="flex: 1; min-width: 200px; color: #6c757d; font-size: 0.875rem;">
                        Showing {{ $probashiNews->firstItem() ?? 0 }} to {{ $probashiNews->lastItem() ?? 0 }}
                        of {{ $probashiNews->total() }} entries
                        @if($search)
                        (filtered from total entries)
                        @endif
                    </div>
                    <div style="flex: 1; min-width: 200px; display: flex; justify-content: flex-end;">
                        {{ $probashiNews->appends(['search' => $search, 'per_page' => request('per_page')])->links('vendor.pagination.archive') }}
                    </div>

                </div>
            </div>

            <div id="deleteConfirmModal"
                style="position: fixed; 
            top: 0; 
            left: 0; 
            right: 0; 
            bottom: 0; 
            background: rgba(0, 0, 0, 0.5); 
            display: none; 
            align-items: center; 
            justify-content: center; 
            z-index: 1000;"
                aria-labelledby="deleteConfirmModalLabel"
                aria-hidden="true">
                <div style="background: white; 
                border-radius: 8px; 
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
                max-width: 500px; 
                width: 90%;">
                    <div style="display: flex; 
                    justify-content: space-between; 
                    align-items: center; 
                    padding: 16px; 
                    border-bottom: 1px solid #dee2e6;">
                        <h5 id="deleteConfirmModalLabel" style="margin: 0; font-size: 1.125rem; font-weight: 500;">
                            {{ localize('confirm_deletion') }}
                        </h5>
                        <button type="button"
                            onclick="document.getElementById('deleteConfirmModal').style.display='none'"
                            style="background: none; 
                           border: none; 
                           font-size: 1.5rem; 
                           color: #6c757d; 
                           cursor: pointer; 
                           line-height: 1;">&times;</button>
                    </div>
                    <div style="padding: 16px;">
                        {{ localize('are_you_sure_you_want_to_delete_this_item') }}
                    </div>
                    <div style="display: flex; 
                    justify-content: flex-end; 
                    padding: 16px; 
                    border-top: 1px solid #dee2e6; 
                    gap: 8px;">
                        <button type="button"
                            onclick="document.getElementById('deleteConfirmModal').style.display='none'"
                            style="padding: 8px 16px; 
                           background: #6c757d; 
                           color: white; 
                           border: none; 
                           border-radius: 4px; 
                           cursor: pointer;">
                            {{ localize('cancel') }}
                        </button>
                        <button type="button"
                            id="confirmDeleteBtn"
                            style="padding: 8px 16px; 
                           background: #dc3545; 
                           color: white; 
                           border: none; 
                           border-radius: 4px; 
                           cursor: pointer;">
                            {{ localize('delete') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('Script loaded'); // Debug log

                // Handle entries per page change
                const entriesSelect = document.getElementById('entriesPerPage');
                if (entriesSelect) {
                    entriesSelect.addEventListener('change', function() {
                        const perPage = this.value;
                        const url = new URL(window.location);
                        url.searchParams.set('per_page', perPage);
                        url.searchParams.delete('page');
                        window.location.href = url.toString();
                    });
                }

                // Delete confirmation handler
                let deleteUrl = '';
                let deleteCsrf = '';
                const deleteModal = document.getElementById('deleteConfirmModal');
                const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

                console.log('Modal element:', deleteModal); // Debug log
                console.log('Delete buttons found:', document.querySelectorAll('.delete-confirm').length); // Debug log

                document.querySelectorAll('.delete-confirm').forEach(function(button) {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        console.log('Delete button clicked'); // Debug log
                        deleteUrl = this.getAttribute('data-route');
                        deleteCsrf = this.getAttribute('data-csrf');
                        console.log('Delete URL:', deleteUrl); // Debug log
                        if (deleteModal) {
                            deleteModal.style.display = 'flex';
                            console.log('Modal should be visible now'); // Debug log
                        } else {
                            console.error('Modal element not found!');
                        }
                    });
                });

                confirmDeleteBtn.addEventListener('click', function() {
                    const originalHtml = this.innerHTML;
                    this.innerHTML = '⌛';
                    this.disabled = true;

                    fetch(deleteUrl, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': deleteCsrf,
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success || data.message) {
                                alert('Item deleted successfully');
                                window.location.reload();
                            } else {
                                alert('Failed to delete item');
                                this.innerHTML = originalHtml;
                                this.disabled = false;
                            }
                            deleteModal.style.display = 'none';
                        })
                        .catch(error => {
                            console.error('Delete error:', error);
                            alert('An error occurred while deleting');
                            this.innerHTML = originalHtml;
                            this.disabled = false;
                            deleteModal.style.display = 'none';
                        });
                });

                // Auto-submit search after typing
                let searchTimeout;
                const searchInput = document.getElementById('searchInput');
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    const searchValue = this.value;
                    searchTimeout = setTimeout(function() {
                        if (searchValue.length >= 3 || searchValue.length === 0) {
                            searchInput.closest('form').submit();
                        }
                    }, 500);
                });

                // Preserve per_page parameter on search
                searchInput.closest('form').addEventListener('submit', function() {
                    const perPage = document.getElementById('entriesPerPage').value;
                    if (perPage && perPage !== '10') {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'per_page';
                        input.value = perPage;
                        this.appendChild(input);
                    }
                });

                // Show loading state for form submissions
                document.querySelectorAll('form').forEach(function(form) {
                    form.addEventListener('submit', function() {
                        const submitBtn = this.querySelector('button[type="submit"]');
                        if (submitBtn) {
                            submitBtn.innerHTML = '⌛';
                            submitBtn.style.pointerEvents = 'none';
                        }
                    });
                });
            });
        </script>
        @endpush

        @push('styles')
        <style>
            a:hover {
                text-decoration: underline;
            }

            select,
            input,
            button {
                transition: background 0.2s, border-color 0.2s, color 0.2s;
            }

            a[title]:hover:after {
                content: attr(title);
                position: absolute;
                background: #333;
                color: #fff;
                padding: 4px 8px;
                border-radius: 4px;
                font-size: 0.75rem;
                white-space: nowrap;
                z-index: 10;
                margin-top: 5px;
            }

            .page-link {
                padding: 4px 12px;
                border: 1px solid #dee2e6;
                border-radius: 4px;
                margin: 0 2px;
                text-decoration: none;
                color: #0d6efd;
                background: #fff;
                display: inline-block;
            }

            .page-link:hover {
                background: #e9ecef;
            }

            .page-item.active .page-link {
                background: #0d6efd;
                color: #fff;
                border-color: #0d6efd;
            }

            .page-item.disabled .page-link {
                color: #6c757d;
                pointer-events: none;
                background: #fff;
            }
        </style>
        @endpush
    </section>
</x-web-layout>