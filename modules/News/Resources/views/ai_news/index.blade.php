@extends('backend.layouts.app')
@section('title', 'AI News Review')

@section('content')
    @include('backend.layouts.common.message')

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
        <div>
            <h4 class="mb-1">AI News Review</h4>
            <p class="text-muted mb-0">AI output stays unpublished until an editor reviews it and imports it as a CMS draft.</p>
        </div>
        <div class="d-flex gap-2">
            @can('update_news')
                <a class="btn btn-outline-primary" href="{{ route('ai-news.sources') }}">RSS Sources</a>
            @endcan
            @can('create_news')
                @if (config('ai_news.enabled'))
                    <form method="POST" action="{{ route('ai-news.run') }}">
                        @csrf
                        <button class="btn btn-primary" type="submit">Collect RSS now</button>
                    </form>
                @else
                    <button class="btn btn-secondary" type="button" disabled>Pipeline disabled</button>
                @endif
            @endcan
        </div>
    </div>

    @if (!config('ai_news.enabled'))
        <div class="alert alert-warning">The pipeline is off. Configure Gemma, the queue worker, and allowed feed hosts, then set <code>AI_NEWS_ENABLED=true</code>.</div>
    @endif

    <div class="row g-2 mb-3">
        @foreach (['pending' => 'Queued', 'draft' => 'Needs review', 'reviewed' => 'Reviewed', 'failed' => 'Failed', 'rejected' => 'Rejected', 'imported' => 'CMS drafts'] as $status => $label)
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card h-100"><div class="card-body py-2">
                    <div class="small text-muted">{{ $label }}</div>
                    <strong>{{ $counts[$status] ?? 0 }}</strong>
                </div></div>
            </div>
        @endforeach
    </div>

    <div class="card">
        <div class="card-header"><h6 class="mb-0">Candidates</h6></div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead><tr><th>Source item</th><th>Language / category</th><th>State</th><th>Updated</th><th></th></tr></thead>
                <tbody>
                    @forelse ($candidates as $candidate)
                        <tr>
                            <td>
                                <strong>{{ $candidate->title ?: $candidate->source_title }}</strong>
                                <div class="small text-muted">{{ $candidate->source?->name ?? 'RSS source' }}</div>
                            </td>
                            <td>{{ $candidate->language?->langname ?? $candidate->language_id }} / {{ $candidate->category?->category_name ?? $candidate->category_id }}</td>
                            <td><span class="badge bg-{{ $candidate->status === 'failed' ? 'danger' : ($candidate->status === 'imported' ? 'success' : 'secondary') }}">{{ ucfirst($candidate->status) }}</span></td>
                            <td>{{ $candidate->updated_at?->format('Y-m-d H:i') }}</td>
                            <td class="text-end">
                                @if ($candidate->status === 'imported' && $candidate->news_mst_id)
                                    @can('read_news')<a class="btn btn-sm btn-outline-primary" href="{{ route('news.index') }}">Open news list</a>@else<span class="text-muted small">Imported as draft</span>@endcan
                                @else
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('ai-news.edit', $candidate) }}">Review</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">No AI candidates yet. Add approved RSS sources to begin.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">{{ $candidates->links() }}</div>
    </div>
@endsection
