@extends('backend.layouts.app')
@section('title', 'Review AI News Draft')

@section('content')
    @include('backend.layouts.common.message')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div><h4 class="mb-1">Review AI news draft</h4><div class="text-muted">State: {{ ucfirst($candidate->status) }}@if($candidate->model_name) · Model: {{ $candidate->model_name }}@endif</div></div>
        <a class="btn btn-outline-secondary" href="{{ route('ai-news.index') }}">Back to candidates</a>
    </div>

    @if ($candidate->status === 'failed')
        <div class="alert alert-danger">Generation failed: {{ $candidate->error_message ?: 'Unknown model error.' }}</div>
    @endif
    @if (in_array($candidate->status, ['failed', 'draft'], true))
        @can('create_news')
            @if ($candidate->generation_attempts < 5)
                <form method="POST" action="{{ route('ai-news.retry', $candidate) }}" class="mb-3" onsubmit="return confirm('Replace this unreviewed AI draft with a new generation attempt?')">@csrf<button class="btn btn-warning" type="submit">{{ $candidate->status === 'failed' ? 'Retry generation' : 'Regenerate draft' }}</button></form>
            @else
                <div class="alert alert-warning">This candidate has used all 5 generation attempts.</div>
            @endif
        @endcan
    @endif

    <div class="card mb-3">
        <div class="card-header"><h6 class="mb-0">Source context — verify every claim against the source</h6></div>
        <div class="card-body">
            <h5>{{ $candidate->source_title }}</h5>
            <p class="mb-2">{{ $candidate->source_excerpt ?: 'No excerpt was provided by the feed.' }}</p>
            <a href="{{ $candidate->source_url }}" target="_blank" rel="noopener noreferrer">Open original source</a>
            @if($candidate->source_published_at)<span class="text-muted ms-2">{{ $candidate->source_published_at->format('Y-m-d H:i') }}</span>@endif
        </div>
    </div>

    @if (in_array($candidate->status, ['draft', 'reviewed'], true))
        <form method="POST" action="{{ route('ai-news.review.update', $candidate) }}">
            @csrf @method('PATCH')
            <div class="card mb-3"><div class="card-header"><h6 class="mb-0">Editorial and SEO review</h6></div><div class="card-body">
                <div class="mb-3"><label class="form-label" for="candidate-title">Headline</label><input id="candidate-title" class="form-control" name="title" value="{{ old('title', $candidate->title) }}" maxlength="255" required>@error('title')<div class="text-danger">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label class="form-label" for="candidate-short">Short headline</label><input id="candidate-short" class="form-control" name="short_head" value="{{ old('short_head', $candidate->short_head) }}" maxlength="255"></div>
                <div class="mb-3"><label class="form-label" for="candidate-summary">Summary</label><textarea id="candidate-summary" class="form-control" name="summary" rows="3" maxlength="800" required>{{ old('summary', $candidate->summary) }}</textarea></div>
                <div class="mb-3"><label class="form-label" for="candidate-body">Article text (plain text paragraphs)</label><textarea id="candidate-body" class="form-control" name="body" rows="14" maxlength="10000" required>{{ old('body', $candidate->body) }}</textarea><div class="form-text">Check names, dates, figures, quotes, context, attribution, and originality before saving.</div></div>
                <div class="row"><div class="col-md-6 mb-3"><label class="form-label" for="candidate-meta-title">Meta title</label><input id="candidate-meta-title" class="form-control" name="meta_title" value="{{ old('meta_title', $candidate->meta_title) }}" maxlength="255"></div><div class="col-md-6 mb-3"><label class="form-label" for="candidate-meta-description">Meta description</label><textarea id="candidate-meta-description" class="form-control" name="meta_description" rows="2" maxlength="255">{{ old('meta_description', $candidate->meta_description) }}</textarea></div></div>
                <div class="mb-3"><label class="form-label" for="candidate-keywords">Keywords (comma-separated)</label><input id="candidate-keywords" class="form-control" name="keywords" value="{{ old('keywords', implode(', ', $candidate->keywords ?? [])) }}" maxlength="1000"></div>
                @error('body')<div class="text-danger mb-2">{{ $message }}</div>@enderror
                <button class="btn btn-primary" type="submit">Save review as approved draft</button>
            </div></div>
        </form>
    @endif

    @if ($candidate->status === 'reviewed')
        <div class="alert alert-info">This is still a private AI candidate. Importing creates an unpublished CMS draft (status 0); it does not publish the article.</div>
        @can('create_news')
            <form method="POST" action="{{ route('ai-news.cms-draft', $candidate) }}" class="d-inline">@csrf<button class="btn btn-success" type="submit" onclick="return confirm('Create an unpublished CMS draft from this reviewed article?')">Create unpublished CMS draft</button></form>
        @endcan
    @endif

    @if (in_array($candidate->status, ['draft', 'reviewed', 'failed'], true))
        @can('update_news')
            <form method="POST" action="{{ route('ai-news.reject', $candidate) }}" class="d-inline" onsubmit="return confirm('Reject this candidate? It will not be imported or published.')">@csrf<button class="btn btn-outline-danger" type="submit">Reject candidate</button></form>
        @endcan
    @endif

    @if ($candidate->status === 'imported' && $candidate->news_mst_id)
        @can('read_news')<a class="btn btn-primary" href="{{ route('news.index') }}">Open news list to publish the CMS draft</a>@endcan
    @endif
@endsection
