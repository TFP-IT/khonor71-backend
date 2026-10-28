@extends('backend.layouts.app')
@section('title', 'Review AI News Draft')

@section('content')
    @include('backend.layouts.common.message')

    {{-- Header --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <h4 class="mb-1">Review AI News Draft</h4>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <span class="text-muted">State:</span>
                @if ($candidate->status === 'pending')
                    <span class="badge bg-warning text-dark"><i class="fa fa-clock-o me-1"></i> Pending AI Generation</span>
                @elseif ($candidate->status === 'draft')
                    <span class="badge bg-info text-white"><i class="fa fa-pencil me-1"></i> Needs Review</span>
                @elseif ($candidate->status === 'reviewed')
                    <span class="badge bg-primary"><i class="fa fa-check-circle me-1"></i> Reviewed & Approved</span>
                @elseif ($candidate->status === 'failed')
                    <span class="badge bg-danger"><i class="fa fa-exclamation-triangle me-1"></i> Generation Failed</span>
                @elseif ($candidate->status === 'imported')
                    <span class="badge bg-success"><i class="fa fa-check-double me-1"></i> Imported as CMS Draft</span>
                @elseif ($candidate->status === 'rejected')
                    <span class="badge bg-secondary"><i class="fa fa-ban me-1"></i> Rejected</span>
                @endif

                @if ($candidate->model_name)
                    <span class="text-muted small">· Model: <code>{{ $candidate->model_name }}</code></span>
                @endif
                <span class="text-muted small">· Attempts: {{ $candidate->generation_attempts }}/5</span>
            </div>
        </div>
        <a class="btn btn-outline-secondary" href="{{ route('ai-news.index') }}">
            <i class="fa fa-arrow-left me-1"></i> Back to candidates
        </a>
    </div>

    {{-- Action Toolbar & Status Alerts --}}
    <div class="card mb-3 border-0 shadow-sm">
        <div class="card-body p-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="flex-grow-1">
                    @if ($candidate->status === 'pending')
                        <div class="d-flex align-items-center gap-2 text-warning mb-0">
                            <i class="fa fa-info-circle fa-lg"></i>
                            <div>
                                <strong>Pending Generation:</strong> This RSS news item has not yet been processed by AI. Click <strong>Generate AI Draft Now</strong> to generate it immediately, or write the article manually below.
                            </div>
                        </div>
                    @elseif ($candidate->status === 'failed')
                        <div class="text-danger mb-0">
                            <i class="fa fa-exclamation-circle fa-lg me-1"></i>
                            <strong>Generation Failed:</strong> {{ $candidate->error_message ?: 'Unknown model error. Check API credentials or network connection.' }}
                        </div>
                    @elseif ($candidate->status === 'draft')
                        <div class="text-primary mb-0">
                            <i class="fa fa-info-circle fa-lg me-1"></i>
                            <strong>Draft Ready:</strong> Review the generated content against the source, edit as needed, and click <strong>Save Review as Approved Draft</strong>.
                        </div>
                    @elseif ($candidate->status === 'reviewed')
                        <div class="text-success mb-0">
                            <i class="fa fa-check-circle fa-lg me-1"></i>
                            <strong>Approved & Ready:</strong> This candidate has been approved. Click <strong>Create Unpublished CMS Draft</strong> to import it into your CMS.
                        </div>
                    @elseif ($candidate->status === 'imported')
                        <div class="text-success mb-0">
                            <i class="fa fa-check-double fa-lg me-1"></i>
                            <strong>Imported:</strong> This article has been imported as an unpublished CMS draft (status 0).
                        </div>
                    @elseif ($candidate->status === 'rejected')
                        <div class="text-muted mb-0">
                            <i class="fa fa-ban fa-lg me-1"></i>
                            <strong>Rejected:</strong> This candidate has been rejected and will not be published.
                        </div>
                    @endif
                </div>

                <div class="d-flex align-items-center gap-2 flex-wrap">
                    {{-- Generate / Regenerate / Retry Buttons --}}
                    @canany(['create_ai_news', 'create_news', 'update_ai_news', 'update_news'])
                        @if ($candidate->status !== 'imported')
                            @if ($candidate->generation_attempts < 5)
                                <form method="POST" action="{{ route('ai-news.retry', $candidate) }}" class="d-inline"
                                    onsubmit="return confirm('{{ in_array($candidate->status, ['draft', 'reviewed']) ? 'Regenerate this AI draft? Any unsaved edits will be replaced.' : 'Generate draft using AI now?' }}')">
                                    @csrf
                                    <button class="btn {{ in_array($candidate->status, ['pending', 'failed']) ? 'btn-primary' : 'btn-warning' }}" type="submit">
                                        @if ($candidate->status === 'pending')
                                            <i class="fa fa-magic me-1"></i> Generate AI Draft Now
                                        @elseif ($candidate->status === 'failed')
                                            <i class="fa fa-refresh me-1"></i> Retry Generation
                                        @elseif ($candidate->status === 'rejected')
                                            <i class="fa fa-refresh me-1"></i> Restore & Generate
                                        @else
                                            <i class="fa fa-refresh me-1"></i> Regenerate Draft
                                        @endif
                                    </button>
                                </form>
                            @else
                                <span class="badge bg-secondary p-2">Attempt limit reached (5/5)</span>
                            @endif
                        @endif
                    @endcanany

                    {{-- CMS Import Button --}}
                    @if ($candidate->status === 'reviewed' && !$candidate->news_mst_id)
                        @canany(['create_ai_news', 'create_news'])
                            <form method="POST" action="{{ route('ai-news.cms-draft', $candidate) }}" class="d-inline"
                                onsubmit="return confirm('Create an unpublished CMS draft from this reviewed article?')">
                                @csrf
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-arrow-circle-up me-1"></i> Create Unpublished CMS Draft
                                </button>
                            </form>
                        @endcanany
                    @endif

                    {{-- Link to CMS if imported --}}
                    @if ($candidate->status === 'imported' && $candidate->news_mst_id)
                        @canany(['read_ai_news', 'read_news'])
                            <a class="btn btn-primary" href="{{ route('news.index') }}">
                                <i class="fa fa-newspaper-o me-1"></i> Open News List to Publish
                            </a>
                        @endcanany
                    @endif

                    {{-- Reject Button --}}
                    @if (in_array($candidate->status, ['pending', 'draft', 'reviewed', 'failed'], true))
                        @canany(['update_ai_news', 'update_news'])
                            <form method="POST" action="{{ route('ai-news.reject', $candidate) }}" class="d-inline"
                                onsubmit="return confirm('Reject this candidate? It will not be imported or published.')">
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">
                                    <i class="fa fa-times me-1"></i> Reject
                                </button>
                            </form>
                        @endcanany
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Source Context Card --}}
    <div class="card mb-3">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-muted"><i class="fa fa-rss me-1"></i> Original Source Context — Verify claims against source</h6>
            <div class="small">
                @if ($candidate->source)
                    <span class="badge bg-secondary me-2">{{ $candidate->source->name }}</span>
                @endif
                @if ($candidate->source_published_at)
                    <span class="text-muted">{{ $candidate->source_published_at->format('Y-m-d H:i') }}</span>
                @endif
            </div>
        </div>
        <div class="card-body">
            <h5 class="fw-bold mb-2">{{ $candidate->source_title }}</h5>
            <p class="mb-3 text-secondary lh-base">{{ $candidate->source_excerpt ?: 'No excerpt provided by RSS feed.' }}</p>
            <a href="{{ $candidate->source_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-info">
                <i class="fa fa-external-link me-1"></i> Open original source article
            </a>
        </div>
    </div>

    {{-- Editorial and SEO Review Form --}}
    @if ($candidate->status !== 'imported' && $candidate->status !== 'rejected')
        <form method="POST" action="{{ route('ai-news.review.update', $candidate) }}">
            @csrf
            @method('PATCH')
            <div class="card mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold"><i class="fa fa-edit me-1"></i> Editorial & SEO Review</h6>
                    <span class="small text-muted">Review names, dates, quotes, facts, and attribution before saving</span>
                </div>
                <div class="card-body">
                    {{-- Headline --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="candidate-title">Headline <span class="text-danger">*</span></label>
                        <input id="candidate-title" class="form-control form-control-lg" name="title"
                            value="{{ old('title', $candidate->title ?: $candidate->source_title) }}" maxlength="255" required>
                        @error('title')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    {{-- Short Headline --}}
                    <div class="mb-3">
                        <label class="form-label" for="candidate-short">Short Headline / Sub-headline</label>
                        <input id="candidate-short" class="form-control" name="short_head"
                            value="{{ old('short_head', $candidate->short_head) }}" maxlength="255">
                        @error('short_head')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    {{-- Summary --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="candidate-summary">Lead / Summary <span class="text-danger">*</span></label>
                        <textarea id="candidate-summary" class="form-control" name="summary" rows="3" maxlength="800" required>{{ old('summary', $candidate->summary ?: $candidate->source_excerpt) }}</textarea>
                        @error('summary')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    {{-- Article Body --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="candidate-body">Article Text (Plain text paragraphs) <span class="text-danger">*</span></label>
                        <textarea id="candidate-body" class="form-control font-monospace" name="body" rows="14" maxlength="10000"
                            placeholder="Type or paste plain text paragraphs here. Use a blank line between paragraphs." required>{{ old('body', $candidate->body) }}</textarea>
                        <div class="form-text text-muted">
                            <i class="fa fa-info-circle me-1"></i> Separate paragraphs with a blank line. Paragraphs will be converted to HTML <code>&lt;p&gt;</code> tags when imported to CMS.
                        </div>
                        @error('body')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    {{-- SEO Fields --}}
                    <div class="border rounded p-3 mb-3 bg-light">
                        <h6 class="fw-bold mb-3 text-secondary"><i class="fa fa-search me-1"></i> Search Engine Optimization (SEO)</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="candidate-meta-title">Meta Title</label>
                                <input id="candidate-meta-title" class="form-control" name="meta_title"
                                    value="{{ old('meta_title', $candidate->meta_title ?: ($candidate->title ?: $candidate->source_title)) }}" maxlength="255">
                                @error('meta_title')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="candidate-meta-description">Meta Description</label>
                                <textarea id="candidate-meta-description" class="form-control" name="meta_description" rows="2" maxlength="255">{{ old('meta_description', $candidate->meta_description ?: ($candidate->summary ?: $candidate->source_excerpt)) }}</textarea>
                                @error('meta_description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="candidate-keywords">Keywords / Tags (Comma-separated)</label>
                                <input id="candidate-keywords" class="form-control" name="keywords"
                                    value="{{ old('keywords', implode(', ', $candidate->keywords ?? [])) }}" maxlength="1000"
                                    placeholder="e.g. বাংলাদেশ, সংবাদ, জাতীয়">
                                @error('keywords')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    @canany(['update_ai_news', 'update_news'])
                        <div class="d-flex align-items-center gap-3">
                            <button class="btn btn-primary btn-lg" type="submit">
                                <i class="fa fa-save me-1"></i> Save Review as Approved Draft
                            </button>
                            <span class="text-muted small">Saving approves this draft so it can be imported into the CMS.</span>
                        </div>
                    @endcanany
                </div>
            </div>
        </form>
    @endif
@endsection
