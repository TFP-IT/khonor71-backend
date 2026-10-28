@extends('backend.layouts.app')
@section('title', localize('breaking_post'))
@push('css')
@endpush
@section('content')
    @include('backend.layouts.common.validation')
    @include('backend.layouts.common.message')

    <!-- Frontend News Ticker Section Setting -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-1 text-dark">
                        <i class="fas fa-bullhorn text-danger me-2"></i>{{ localize('frontend_news_ticker') ?: 'Frontend Breaking News Ticker' }}
                    </h6>
                    <p class="text-muted small mb-0">
                        {{ localize('frontend_news_ticker_desc') ?: 'Enable or disable the breaking news (news-ticker) section on the website frontend.' }}
                    </p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span id="tickerStatusBadge">
                        @if ((app_setting()->newstriker_status ?? 1) == 1)
                            <span class="badge bg-success px-3 py-2 fs-14">
                                <i class="fas fa-check-circle me-1"></i> {{ localize('active') ?: 'Active' }} ({{ localize('visible_on_frontend') ?: 'Visible on Frontend' }})
                            </span>
                        @else
                            <span class="badge bg-danger px-3 py-2 fs-14">
                                <i class="fas fa-times-circle me-1"></i> {{ localize('inactive') ?: 'Inactive' }} ({{ localize('hidden_on_frontend') ?: 'Hidden on Frontend' }})
                            </span>
                        @endif
                    </span>
                    @can('update_breaking_news')
                        <button type="button" 
                                id="toggleTickerSectionBtn" 
                                class="btn {{ (app_setting()->newstriker_status ?? 1) == 1 ? 'btn-outline-danger' : 'btn-outline-success' }} fw-bold"
                                data-action="{{ route('news.breaking-news.toggle-ticker') }}"
                                data-status="{{ (app_setting()->newstriker_status ?? 1) == 1 ? 0 : 1 }}">
                            @if ((app_setting()->newstriker_status ?? 1) == 1)
                                <i class="fas fa-eye-slash me-1"></i> {{ localize('deactivate_ticker') ?: 'Deactivate Ticker' }}
                            @else
                                <i class="fas fa-eye me-1"></i> {{ localize('activate_ticker') ?: 'Activate Ticker' }}
                            @endif
                        </button>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('breaking_post') }}</h6>
                </div>
                <div class="float-right">
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('news.breaking-news.store') }}" class="needs-validation @cannot('create_breaking_news') d-none @endcan" data="showCallBackCreateData"
                id="breakingNewsForm" novalidate="" method="POST" enctype="multipart/form-data" data-create_breaking_news="@cannot('create_breaking_news') d-none @endcan">
                @csrf

                <div class="row fw-bold text-capitalize mt-2">
                    <div class="col-md-4 mb-3">
                        <label for="language_id">{{ localize('language') }} <span class="text-danger">*</span></label>
                        <select name="language_id" id="language_id" class="form-control select-basic-single @error('language_id') is-invalid @enderror" required>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}" @selected(old('language_id', get_language_id()) == $language->id)>
                                    {{ $language->langname }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('language_id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="priority">{{ localize('priority') ?: 'Priority' }}</label>
                        <input type="number" name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror"
                            value="0" min="0" placeholder="0">
                        <small class="text-muted fw-normal">{{ localize('higher_number_shows_first') ?: 'Higher value displays first' }}</small>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('priority')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="status">{{ localize('status') ?: 'Status' }} (ON / OFF)</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="1" selected>{{ localize('active') ?: 'Active (ON)' }}</option>
                            <option value="0">{{ localize('inactive') ?: 'Inactive (OFF)' }}</option>
                        </select>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('status')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="breaking_news">{{ localize('breaking_headline') ?: 'Breaking Headline' }}: <span class="text-danger">*</span></label>
                        <textarea name="breaking_news" id="breaking_news" class="form-control @error('breaking_news') is-invalid @enderror"
                            placeholder="{{ localize_uc('enter_your_post') }}" rows="2" required></textarea>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('breaking_news')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="url">{{ localize('article_url') ?: 'Article URL' }}</label>
                        <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror"
                            placeholder="{{ localize('article_url_placeholder') ?: 'e.g. /my-news-article-slug or https://...' }}">
                        <small class="text-muted fw-normal">{{ localize('optional_article_link') ?: 'Optional link when clicked in the breaking news ticker' }}</small>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('url')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="start_time">{{ localize('start_date_time') ?: 'Start Date & Time' }}</label>
                        <input type="datetime-local" name="start_time" id="start_time" class="form-control @error('start_time') is-invalid @enderror">
                        <small class="text-muted fw-normal">{{ localize('leave_empty_for_immediate') ?: 'Leave empty to activate immediately' }}</small>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('start_time')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="end_time">{{ localize('end_date_time') ?: 'End Date & Time' }}</label>
                        <input type="datetime-local" name="end_time" id="end_time" class="form-control @error('end_time') is-invalid @enderror">
                        <small class="text-muted fw-normal">{{ localize('leave_empty_for_permanent') ?: 'Leave empty to run permanently until deactivated' }}</small>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('end_time')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 align-self-end mt-2">
                        <button type="reset" class="btn btn-danger" id="resetButton" title="{{ localize('reset') }}">
                            <i class="fa fa-undo-alt"></i> {{ localize('reset') }}
                        </button>
                        <button type="submit" class="btn btn-success" id="submitButton">
                            {{ localize('save') }}
                        </button>
                    </div>
                </div>
            </form>
            <div class="table_customize mt-3">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script src="{{ module_asset('News/js/news/breaking-news.js') }}"></script>
@endpush
