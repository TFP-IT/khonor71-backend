@extends('backend.layouts.app')
@section('title', 'AI News Review')

@section('content')
    @include('backend.layouts.common.message')

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
        <div>
            <h4 class="mb-1">AI News Review</h4>
            <p class="text-muted mb-0">AI-assisted drafts from RSS feeds. Review, edit, and import into CMS as unpublished drafts.</p>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            @canany(['read_ai_rss_sources', 'update_ai_rss_sources', 'update_ai_news', 'update_news'])
                <a class="btn btn-outline-primary" href="{{ route('ai-news.sources') }}">
                    <i class="fa fa-rss me-1"></i> RSS Sources
                </a>
            @endcanany
            @canany(['create_ai_news', 'create_news'])
                @if (config('ai_news.enabled'))
                    <form method="POST" action="{{ route('ai-news.run') }}" class="d-inline">
                        @csrf
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-refresh me-1"></i> Collect RSS now
                        </button>
                    </form>
                @else
                    <button class="btn btn-secondary" type="button" disabled>Pipeline disabled</button>
                @endif
            @endcanany
        </div>
    </div>

    @if (!config('ai_news.enabled'))
        <div class="alert alert-warning">
            <i class="fa fa-warning me-1"></i> The AI News pipeline is disabled. Set <code>AI_NEWS_ENABLED=true</code> in <code>.env</code> to activate.
        </div>
    @endif

    {{-- Filter cards --}}
    <div class="row g-2 mb-3">
        @php
            $statusCards = [
                '' => ['label' => 'All Items', 'count' => array_sum($counts->all()), 'color' => 'dark'],
                'pending' => ['label' => 'Pending Generation', 'count' => $counts['pending'] ?? 0, 'color' => 'warning'],
                'draft' => ['label' => 'Needs Review', 'count' => $counts['draft'] ?? 0, 'color' => 'info'],
                'reviewed' => ['label' => 'Reviewed & Approved', 'count' => $counts['reviewed'] ?? 0, 'color' => 'primary'],
                'imported' => ['label' => 'Imported to CMS', 'count' => $counts['imported'] ?? 0, 'color' => 'success'],
                'failed' => ['label' => 'Failed', 'count' => $counts['failed'] ?? 0, 'color' => 'danger'],
                'rejected' => ['label' => 'Rejected', 'count' => $counts['rejected'] ?? 0, 'color' => 'secondary'],
            ];
        @endphp

        @foreach ($statusCards as $statusKey => $card)
            @php $isActive = ($selectedStatus ?? '') === $statusKey; @endphp
            <div class="col-6 col-md-4 col-xl">
                <a href="{{ $statusKey ? route('ai-news.index', ['status' => $statusKey]) : route('ai-news.index') }}"
                   class="card text-decoration-none h-100 shadow-sm transition {{ $isActive ? 'border-' . $card['color'] . ' bg-light' : 'border-0' }}"
                   style="{{ $isActive ? 'border-width: 2px !important;' : '' }}">
                    <div class="card-body py-2 px-3">
                        <div class="small text-muted text-truncate">{{ $card['label'] }}</div>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <h5 class="mb-0 fw-bold text-{{ $card['color'] }}">{{ $card['count'] }}</h5>
                            @if ($isActive)
                                <span class="badge bg-{{ $card['color'] }} rounded-pill" style="font-size: 0.65rem;">Active</span>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    {{-- Candidates Table --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h6 class="mb-0 fw-bold">
                @if ($selectedStatus)
                    <span>Candidates (Filtered: {{ ucfirst($selectedStatus) }})</span>
                    <a href="{{ route('ai-news.index') }}" class="btn btn-sm btn-link text-decoration-none">Clear filter</a>
                @else
                    <span>All Candidates</span>
                @endif
            </h6>
            <span class="text-muted small">Total: {{ $candidates->total() }}</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="min-width: 280px;">Source / Headline</th>
                        <th>Language / Category</th>
                        <th>Status</th>
                        <th>Attempts</th>
                        <th>Updated</th>
                        <th class="text-end" style="min-width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($candidates as $candidate)
                        <tr>
                            <td>
                                <a href="{{ route('ai-news.edit', $candidate) }}" class="fw-bold text-dark text-decoration-none d-block mb-1">
                                    {{ $candidate->title ?: $candidate->source_title }}
                                </a>
                                <div class="small text-muted d-flex align-items-center gap-2">
                                    <span><i class="fa fa-rss me-1"></i>{{ $candidate->source?->name ?? 'RSS' }}</span>
                                    <span>·</span>
                                    <a href="{{ $candidate->source_url }}" target="_blank" rel="noopener noreferrer" class="text-muted text-decoration-none">
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $candidate->language?->langname ?? $candidate->language_id }}
                                </span>
                                <span class="badge bg-light text-dark border">
                                    {{ $candidate->category?->category_name ?? $candidate->category_id }}
                                </span>
                            </td>
                            <td>
                                @if ($candidate->status === 'pending')
                                    <span class="badge bg-warning text-dark"><i class="fa fa-clock-o me-1"></i> Pending</span>
                                @elseif ($candidate->status === 'draft')
                                    <span class="badge bg-info text-white"><i class="fa fa-pencil me-1"></i> Needs Review</span>
                                @elseif ($candidate->status === 'reviewed')
                                    <span class="badge bg-primary"><i class="fa fa-check-circle me-1"></i> Reviewed</span>
                                @elseif ($candidate->status === 'failed')
                                    <span class="badge bg-danger"><i class="fa fa-exclamation-triangle me-1"></i> Failed</span>
                                @elseif ($candidate->status === 'imported')
                                    <span class="badge bg-success"><i class="fa fa-check-double me-1"></i> Imported</span>
                                @elseif ($candidate->status === 'rejected')
                                    <span class="badge bg-secondary"><i class="fa fa-ban me-1"></i> Rejected</span>
                                @endif
                            </td>
                            <td>
                                <span class="small text-muted">{{ $candidate->generation_attempts }}/5</span>
                            </td>
                            <td>
                                <span class="small text-muted">{{ $candidate->updated_at?->format('Y-m-d H:i') }}</span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1 align-items-center">
                                    @if ($candidate->status === 'pending')
                                        @canany(['create_ai_news', 'create_news', 'update_ai_news', 'update_news'])
                                            <form method="POST" action="{{ route('ai-news.retry', $candidate) }}" class="d-inline">
                                                @csrf
                                                <button class="btn btn-sm btn-primary" type="submit" title="Generate AI Draft Now">
                                                    <i class="fa fa-magic"></i> Generate
                                                </button>
                                            </form>
                                        @endcanany
                                    @elseif ($candidate->status === 'reviewed' && !$candidate->news_mst_id)
                                        @canany(['create_ai_news', 'create_news'])
                                            <form method="POST" action="{{ route('ai-news.cms-draft', $candidate) }}" class="d-inline"
                                                onsubmit="return confirm('Import this reviewed article as CMS draft?')">
                                                @csrf
                                                <button class="btn btn-sm btn-success" type="submit" title="Import to CMS">
                                                    <i class="fa fa-arrow-circle-up"></i> Import
                                                </button>
                                            </form>
                                        @endcanany
                                    @elseif ($candidate->status === 'imported' && $candidate->news_mst_id)
                                        @canany(['read_ai_news', 'read_news'])
                                            <a class="btn btn-sm btn-outline-success" href="{{ route('news.index') }}" title="Open in News Manager">
                                                <i class="fa fa-newspaper-o"></i> View
                                            </a>
                                        @endcanany
                                    @endif

                                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('ai-news.edit', $candidate) }}">
                                        Review
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="fa fa-folder-open-o fa-2x mb-2 d-block"></i>
                                No candidates found for this selection.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body border-top">
            {{ $candidates->links() }}
        </div>
    </div>
@endsection
