@extends('backend.layouts.app')
@section('title', 'AI RSS Sources')

@section('content')
    @include('backend.layouts.common.message')

    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4 class="mb-1">AI RSS Sources</h4>
            <p class="text-muted mb-0">Only add feeds you are allowed to use. New sources start disabled.</p>
        </div>
        <a class="btn btn-outline-secondary" href="{{ route('ai-news.index') }}">Back to review</a>
    </div>

    <div class="alert alert-info">
        Feed hosts must be HTTPS, public, and listed in <code>AI_NEWS_ALLOWED_FEED_HOSTS</code> (comma-separated hostnames). Redirects and private network addresses are rejected.
        @if (count($allowedHosts))
            <div class="mt-1">Allowed: {{ implode(', ', $allowedHosts) }}</div>
        @else
            <div class="mt-1">No hosts are currently allowed, so collection cannot run until the environment setting is configured.</div>
        @endif
    </div>

    <div class="card mb-4">
        <div class="card-header"><h6 class="mb-0">Add a source</h6></div>
        <div class="card-body">
            <form method="POST" action="{{ route('ai-news.sources.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4"><label class="form-label" for="source-name">Source name</label><input id="source-name" name="name" class="form-control" value="{{ old('name') }}" maxlength="150" required>@error('name')<div class="text-danger small">{{ $message }}</div>@enderror</div>
                    <div class="col-md-8"><label class="form-label" for="feed-url">RSS / Atom URL</label><input id="feed-url" name="feed_url" type="url" class="form-control" value="{{ old('feed_url') }}" maxlength="2048" placeholder="https://publisher.example/feed.xml" required>@error('feed_url')<div class="text-danger small">{{ $message }}</div>@enderror</div>
                    <div class="col-md-4"><label class="form-label" for="source-language">Draft language</label><select id="source-language" name="language_id" class="form-select" required><option value="">Choose language</option>@foreach ($languages as $language)<option value="{{ $language->id }}" @selected(old('language_id') == $language->id)>{{ $language->langname }}</option>@endforeach</select>@error('language_id')<div class="text-danger small">{{ $message }}</div>@enderror</div>
                    <div class="col-md-5"><label class="form-label" for="source-category">Default category</label><select id="source-category" name="category_id" class="form-select" required><option value="">Choose category</option>@foreach ($categories as $category)<option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->category_name }} ({{ $category->language_id }})</option>@endforeach</select>@error('category_id')<div class="text-danger small">{{ $message }}</div>@enderror</div>
                    <div class="col-md-3 d-flex align-items-end"><div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="is_enabled" value="1" id="source-enabled" @checked(old('is_enabled'))><label class="form-check-label" for="source-enabled">Enable after adding</label></div></div>
                </div>
                <button class="btn btn-success mt-3" type="submit">Add source</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h6 class="mb-0">Configured feeds</h6></div>
        <div class="table-responsive"><table class="table align-middle mb-0">
            <thead><tr><th>Source</th><th>Feed URL</th><th>Language / category</th><th>Last collection</th><th>Status</th><th></th></tr></thead>
            <tbody>
                @forelse ($sources as $source)
                    <tr>
                        <td>{{ $source->name }}<div class="small text-muted">{{ $source->candidates_count }} candidate(s)</div></td>
                        <td class="text-break"><code>{{ $source->feed_url }}</code>@if($source->last_error)<div class="small text-danger">{{ $source->last_error }}</div>@endif</td>
                        <td>{{ $source->language?->langname ?? $source->language_id }} / {{ $source->category?->category_name ?? $source->category_id }}</td>
                        <td>{{ $source->last_fetched_at?->format('Y-m-d H:i') ?? 'Never' }}</td>
                        <td><span class="badge bg-{{ $source->is_enabled ? 'success' : 'secondary' }}">{{ $source->is_enabled ? 'Enabled' : 'Disabled' }}</span></td>
                        <td class="text-end text-nowrap">
                            <form class="d-inline" method="POST" action="{{ route('ai-news.sources.toggle', $source) }}">@csrf @method('PATCH')<button class="btn btn-sm btn-outline-primary" type="submit">{{ $source->is_enabled ? 'Disable' : 'Enable' }}</button></form>
                            @if (!$source->candidates_count)<form class="d-inline" method="POST" action="{{ route('ai-news.sources.destroy', $source) }}" onsubmit="return confirm('Delete this RSS source?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" type="submit">Delete</button></form>@endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">No feeds configured.</td></tr>
                @endforelse
            </tbody>
        </table></div>
    </div>
@endsection
