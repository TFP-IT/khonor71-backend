@extends('backend.layouts.app')
@section('title', localize('auto_posting_social_media'))
@push('css')
<style>
    .social-card-header {
        font-size: 16px;
        font-weight: 600;
        padding: 12px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .header-fb { background: #1877F2; color: #fff; }
    .header-tw { background: #0f1419; color: #fff; }
    .header-ig { background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); color: #fff; }
    .header-yt { background: #FF0000; color: #fff; }
    .header-tt { background: #000000; color: #fff; }
    .header-gn { background: #1a73e8; color: #fff; }
    .platform-badge {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 3px 8px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.2);
    }
</style>
@endpush
@section('content')
    @include('backend.layouts.common.validation')
    @include('backend.layouts.common.message')
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">
                        <i class="fas fa-share-alt text-primary me-2"></i>{{ localize('auto_posting_social_media') }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table_customize">
                
                <form method="POST" action="{{ route('autopost.update') }}">
                    @csrf
                    <div class="row">
                        <!-- Facebook Card -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="social-card-header header-fb">
                                    <div>
                                        <i class="fab fa-facebook me-2 fa-lg"></i>
                                        {{ localize('facebook_settings') ?: 'Facebook Settings' }}
                                    </div>
                                    <span class="platform-badge">Facebook</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-check form-switch mb-3 d-flex align-items-center">
                                        <input class="form-check-input auto-post-checkbox" type="checkbox" name="facebook[is_active]" id="fb_active" {{ old('facebook.is_active', $facebook->is_active ?? false) ? 'checked' : '' }} value="1">
                                        <label class="form-check-label text-capitalize ms-2 fw-semibold" for="fb_active">{{ localize('enable_auto_posting') }}</label>
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label text-capitalize">{{ localize('page_id') }}</label>
                                        <input type="text" name="facebook[page_id]" class="form-control" placeholder="e.g. 1029384756" value="{{ old('facebook.page_id', $facebook->page_id ?? '') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label text-capitalize">{{ localize('access_token') }}</label>
                                        <textarea name="facebook[access_token]" class="form-control" rows="3" placeholder="Page Access Token">{{ old('facebook.access_token', $facebook->access_token ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Twitter (X) Card -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="social-card-header header-tw">
                                    <div>
                                        <i class="fab fa-x-twitter me-2 fa-lg"></i>
                                        {{ localize('twitter_settings') ?: 'Twitter / X Settings' }}
                                    </div>
                                    <span class="platform-badge">X (Twitter)</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-check form-switch mb-3 d-flex align-items-center">
                                        <input class="form-check-input auto-post-checkbox" type="checkbox" name="twitter[is_active]" id="tw_active" {{ old('twitter.is_active', $twitter->is_active ?? false) ? 'checked' : '' }} value="1">
                                        <label class="form-check-label text-capitalize ms-2 fw-semibold" for="tw_active">{{ localize('enable_auto_posting') }}</label>
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label text-capitalize">{{ localize('usage_type') }}</label>
                                        <select name="twitter[is_test_mode]" class="form-control select-basic-single">
                                            <option value="1" {{ old('twitter.is_test_mode', $twitter->is_test_mode ?? 1) == 1 ? 'selected' : '' }}>
                                                {{ localize('free') }}
                                            </option>
                                            <option value="0" {{ old('twitter.is_test_mode', $twitter->is_test_mode ?? 1) == 0 ? 'selected' : '' }}>
                                                {{ localize('paid') }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('api_key') }}</label>
                                            <input type="text" name="twitter[api_key]" class="form-control" value="{{ old('twitter.api_key', $twitter->api_key ?? '') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('api_secret') }}</label>
                                            <input type="text" name="twitter[api_secret]" class="form-control" value="{{ old('twitter.api_secret', $twitter->api_secret ?? '') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('access_token') }}</label>
                                            <input type="text" name="twitter[access_token]" class="form-control" value="{{ old('twitter.access_token', $twitter->access_token ?? '') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('access_token_secret') }}</label>
                                            <input type="text" name="twitter[access_token_secret]" class="form-control" value="{{ old('twitter.access_token_secret', $twitter->access_token_secret ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Instagram Card -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="social-card-header header-ig">
                                    <div>
                                        <i class="fab fa-instagram me-2 fa-lg"></i>
                                        {{ localize('instagram_settings') ?: 'Instagram Settings' }}
                                    </div>
                                    <span class="platform-badge">Instagram</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-check form-switch mb-3 d-flex align-items-center">
                                        <input class="form-check-input auto-post-checkbox" type="checkbox" name="instagram[is_active]" id="ig_active" {{ old('instagram.is_active', $instagram->is_active ?? false) ? 'checked' : '' }} value="1">
                                        <label class="form-check-label text-capitalize ms-2 fw-semibold" for="ig_active">{{ localize('enable_auto_posting') }}</label>
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label text-capitalize">{{ localize('instagram_account_id') ?: 'Instagram Account ID' }}</label>
                                        <input type="text" name="instagram[page_id]" class="form-control" placeholder="e.g. 17841405309211..." value="{{ old('instagram.page_id', $instagram->page_id ?? '') }}">
                                        <small class="text-muted">Instagram Professional / Business Account ID connected to your Meta Page.</small>
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label text-capitalize">{{ localize('access_token') }}</label>
                                        <textarea name="instagram[access_token]" class="form-control" rows="3" placeholder="Meta User / Page Access Token with instagram_content_publish permission">{{ old('instagram.access_token', $instagram->access_token ?? '') }}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('client_id') ?: 'App ID' }}</label>
                                            <input type="text" name="instagram[api_key]" class="form-control" placeholder="Optional" value="{{ old('instagram.api_key', $instagram->api_key ?? '') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('client_secret') ?: 'App Secret' }}</label>
                                            <input type="text" name="instagram[api_secret]" class="form-control" placeholder="Optional" value="{{ old('instagram.api_secret', $instagram->api_secret ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- YouTube Card -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="social-card-header header-yt">
                                    <div>
                                        <i class="fab fa-youtube me-2 fa-lg"></i>
                                        {{ localize('youtube_settings') ?: 'YouTube Settings' }}
                                    </div>
                                    <span class="platform-badge">YouTube</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-check form-switch mb-3 d-flex align-items-center">
                                        <input class="form-check-input auto-post-checkbox" type="checkbox" name="youtube[is_active]" id="yt_active" {{ old('youtube.is_active', $youtube->is_active ?? false) ? 'checked' : '' }} value="1">
                                        <label class="form-check-label text-capitalize ms-2 fw-semibold" for="yt_active">{{ localize('enable_auto_posting') }}</label>
                                    </div>

                                    <div class="alert alert-warning py-2 px-3 small mb-3">
                                        <i class="fas fa-info-circle me-1"></i>
                                        {{ localize('youtube_note') ?: 'Note: YouTube Data API publishes video content when an article has a video attached or in Video News.' }}
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('channel_id') ?: 'Channel ID' }}</label>
                                            <input type="text" name="youtube[page_id]" class="form-control" placeholder="e.g. UCxxxxxxxx" value="{{ old('youtube.page_id', $youtube->page_id ?? '') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('api_key') ?: 'API Key' }}</label>
                                            <input type="text" name="youtube[api_key]" class="form-control" placeholder="Google YouTube Data API Key" value="{{ old('youtube.api_key', $youtube->api_key ?? '') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('client_id') ?: 'OAuth Client ID' }}</label>
                                            <input type="text" name="youtube[access_token_secret]" class="form-control" placeholder="OAuth 2.0 Client ID" value="{{ old('youtube.access_token_secret', $youtube->access_token_secret ?? '') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('client_secret') ?: 'OAuth Client Secret' }}</label>
                                            <input type="text" name="youtube[api_secret]" class="form-control" placeholder="OAuth 2.0 Client Secret" value="{{ old('youtube.api_secret', $youtube->api_secret ?? '') }}">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label text-capitalize">{{ localize('refresh_token') ?: 'OAuth Refresh Token / Access Token' }}</label>
                                        <textarea name="youtube[access_token]" class="form-control" rows="2" placeholder="Refresh Token">{{ old('youtube.access_token', $youtube->access_token ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TikTok Card -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="social-card-header header-tt">
                                    <div>
                                        <i class="fab fa-tiktok me-2 fa-lg"></i>
                                        {{ localize('tiktok_settings') ?: 'TikTok Settings' }}
                                    </div>
                                    <span class="platform-badge">TikTok</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-check form-switch mb-3 d-flex align-items-center">
                                        <input class="form-check-input auto-post-checkbox" type="checkbox" name="tiktok[is_active]" id="tt_active" {{ old('tiktok.is_active', $tiktok->is_active ?? false) ? 'checked' : '' }} value="1">
                                        <label class="form-check-label text-capitalize ms-2 fw-semibold" for="tt_active">{{ localize('enable_auto_posting') }}</label>
                                    </div>

                                    <div class="alert alert-secondary py-2 px-3 small mb-3">
                                        <i class="fas fa-info-circle me-1"></i>
                                        {{ localize('tiktok_note') ?: 'Supports photo carousel and video posts via TikTok Content Posting API.' }}
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('client_key') ?: 'Client Key / App ID' }}</label>
                                            <input type="text" name="tiktok[api_key]" class="form-control" placeholder="TikTok App Client Key" value="{{ old('tiktok.api_key', $tiktok->api_key ?? '') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('client_secret') ?: 'Client Secret' }}</label>
                                            <input type="text" name="tiktok[api_secret]" class="form-control" placeholder="TikTok App Client Secret" value="{{ old('tiktok.api_secret', $tiktok->api_secret ?? '') }}">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label text-capitalize">{{ localize('account_id') ?: 'Creator OpenID / Account ID' }}</label>
                                        <input type="text" name="tiktok[page_id]" class="form-control" placeholder="e.g. open_id" value="{{ old('tiktok.page_id', $tiktok->page_id ?? '') }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('access_token') }}</label>
                                            <textarea name="tiktok[access_token]" class="form-control" rows="2" placeholder="User Access Token">{{ old('tiktok.access_token', $tiktok->access_token ?? '') }}</textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label text-capitalize">{{ localize('refresh_token') ?: 'Refresh Token' }}</label>
                                            <textarea name="tiktok[access_token_secret]" class="form-control" rows="2" placeholder="Refresh Token">{{ old('tiktok.access_token_secret', $tiktok->access_token_secret ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Google News Card -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="social-card-header header-gn">
                                    <div>
                                        <i class="fab fa-google me-2 fa-lg"></i>
                                        {{ localize('google_news_settings') ?: 'Google News Settings' }}
                                    </div>
                                    <span class="platform-badge">Google News</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-check form-switch mb-3 d-flex align-items-center">
                                        <input class="form-check-input auto-post-checkbox" type="checkbox" name="google_news[is_active]" id="gn_active" {{ old('google_news.is_active', $googleNews->is_active ?? false) ? 'checked' : '' }} value="1">
                                        <label class="form-check-label text-capitalize ms-2 fw-semibold" for="gn_active">{{ localize('enable_auto_posting') }}</label>
                                    </div>

                                    <!-- Google News RSS Feed Helper -->
                                    <div class="card bg-light border p-3 mb-3">
                                        <label class="fw-bold mb-1 fs-14 text-dark">
                                            <i class="fas fa-rss text-warning me-1"></i> {{ localize('google_news_rss_feed') ?: 'Google News RSS Feed URL' }}
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-white font-monospace fs-13" id="google_news_feed_url" value="{{ route('google.news.rss') }}" readonly>
                                            <button class="btn btn-outline-primary" type="button" id="copyFeedBtn" onclick="copyFeedUrl()">
                                                <i class="fas fa-copy me-1"></i> <span id="copyBtnText">{{ localize('copy_feed_url') ?: 'Copy Feed URL' }}</span>
                                            </button>
                                        </div>
                                        <small class="text-muted mt-1">
                                            <i class="fas fa-info-circle me-1"></i>
                                            {{ localize('google_news_note') ?: 'Submit this feed link in Google Publisher Center to distribute your articles in Google News.' }}
                                        </small>
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label text-capitalize">{{ localize('google_news_publication_id') ?: 'Publication ID (Google Publisher Center)' }}</label>
                                        <input type="text" name="google_news[page_id]" class="form-control" placeholder="e.g. CAowqN-...." value="{{ old('google_news.page_id', $googleNews->page_id ?? '') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label text-capitalize">{{ localize('service_account_email') ?: 'Google Indexing Service Account Email' }}</label>
                                        <input type="email" name="google_news[api_key]" class="form-control" placeholder="e.g. news-indexer@project-id.iam.gserviceaccount.com" value="{{ old('google_news.api_key', $googleNews->api_key ?? '') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label text-capitalize">{{ localize('service_account_json') ?: 'Service Account JSON / Private Key' }}</label>
                                        <textarea name="google_news[access_token]" class="form-control font-monospace fs-12" rows="3" placeholder='Paste your Google Service Account JSON key content here'>{!! old('google_news.access_token', $googleNews->access_token ?? '') !!}</textarea>
                                        <small class="text-muted">Used to ping Google Indexing API immediately when articles are published.</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    @if (auth()->user()->can('update_auto_post_settings'))
                        <div class="text-end">
                            <button type="submit" class="btn btn-success btn-lg px-4 shadow-sm">
                                <i class="fa fa-save me-1"></i>
                                {{ localize('save_settings') }}
                            </button>
                        </div>
                    @endif
                    
                </form>
            </div>
        </div>
    </div>

@endsection
@push('js')
<script>
function copyFeedUrl() {
    var copyText = document.getElementById("google_news_feed_url");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value).then(function() {
        var btnText = document.getElementById("copyBtnText");
        var original = btnText.innerText;
        btnText.innerText = "{{ localize('copied') ?: 'Copied!' }}";
        setTimeout(function() {
            btnText.innerText = original;
        }, 2000);
    }).catch(function(err) {
        document.execCommand("copy");
    });
}
</script>
@endpush
