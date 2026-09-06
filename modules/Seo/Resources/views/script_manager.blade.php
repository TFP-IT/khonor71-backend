@extends('backend.layouts.app')
@section('title', 'Script Manager')
@push('css')
<style>
    /* ── Script Manager: Custom Styles ─────────────────────────────── */
    .sm-hero {
        background: linear-gradient(135deg, #1a1f3c 0%, #2d3561 50%, #1a1f3c 100%);
        border-radius: 14px;
        padding: 28px 32px;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
    }
    .sm-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 340px;
        height: 340px;
        background: radial-gradient(circle, rgba(99,102,241,0.25) 0%, transparent 70%);
        pointer-events: none;
    }
    .sm-hero h4 { color: #fff; font-weight: 700; font-size: 1.4rem; margin-bottom: 6px; }
    .sm-hero p  { color: rgba(255,255,255,0.65); margin: 0; font-size: 0.9rem; }
    .sm-hero .sm-hero-icon {
        font-size: 3rem;
        color: rgba(255,255,255,0.12);
        position: absolute;
        right: 32px;
        top: 50%;
        transform: translateY(-50%);
    }

    /* ── Tab Nav ────────────────────────────────────────────────────── */
    .sm-tab-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        padding: 20px 24px 0;
        border-bottom: 2px solid #eef0f6;
        background: #fff;
    }
    .sm-tab-nav .sm-tab-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 16px;
        border: none;
        background: transparent;
        border-radius: 8px 8px 0 0;
        font-size: 0.85rem;
        font-weight: 600;
        color: #6b7280;
        cursor: pointer;
        transition: all 0.2s;
        position: relative;
        bottom: -2px;
        border-bottom: 2px solid transparent;
    }
    .sm-tab-nav .sm-tab-btn .sm-tab-icon {
        width: 26px; height: 26px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.78rem;
    }
    .sm-tab-nav .sm-tab-btn:hover { color: #4f46e5; }
    .sm-tab-nav .sm-tab-btn.active { color: #4f46e5; border-bottom-color: #4f46e5; }
    .tab-analytics .sm-tab-icon { background:#fff7ed; color:#ea580c; }
    .tab-gsc       .sm-tab-icon { background:#f0fdf4; color:#16a34a; }
    .tab-ads       .sm-tab-icon { background:#faf5ff; color:#9333ea; }
    .tab-extras    .sm-tab-icon { background:#eff6ff; color:#2563eb; }
    .tab-custom    .sm-tab-icon { background:#fdf2f8; color:#db2777; }

    /* ── Tab Content ───────────────────────────────────────────────── */
    .sm-tab-content { display: none; padding: 28px; }
    .sm-tab-content.active { display: block; }

    /* ── Script Card ───────────────────────────────────────────────── */
    .sm-card {
        border: 1.5px solid #eef0f6;
        border-radius: 12px;
        background: #fff;
        margin-bottom: 18px;
        transition: box-shadow 0.2s, border-color 0.2s;
        overflow: hidden;
    }
    .sm-card:hover { box-shadow: 0 4px 20px rgba(79,70,229,0.08); border-color: #c7d2fe; }
    .sm-card-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 20px;
        border-bottom: 1px solid #eef0f6;
        background: #fafbff;
    }
    .sm-card-logo {
        width: 40px; height: 40px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    .sm-card-title    { font-weight: 700; font-size: 0.93rem; color: #1f2937; margin: 0; line-height: 1.3; }
    .sm-card-subtitle { font-size: 0.77rem; color: #9ca3af; margin: 0; }
    .sm-card-body     { padding: 18px 20px; }

    /* ── Inputs ───────────────────────────────────────────────────── */
    .sm-input-wrap { position: relative; }
    .sm-input-wrap .form-control {
        font-family: 'Courier New', monospace;
        font-size: 0.875rem;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        padding: 10px 14px 10px 42px;
        transition: border-color 0.2s, box-shadow 0.2s;
        background: #fafafa;
    }
    .sm-input-wrap .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
        background: #fff;
    }
    .sm-input-wrap .sm-input-icon {
        position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
        font-size: 0.88rem; color: #9ca3af; pointer-events: none; z-index: 2;
    }
    .sm-textarea-wrap .form-control {
        font-family: 'Courier New', monospace;
        font-size: 0.82rem;
        border: 1.5px solid #2d2d3f;
        border-radius: 8px;
        padding: 12px 14px;
        background: #1e1e2e;
        color: #cdd6f4;
        transition: border-color 0.2s;
        line-height: 1.65;
    }
    .sm-textarea-wrap .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
        outline: none;
    }
    .sm-textarea-wrap .form-control::placeholder { color: #585b70; }

    /* ── Badges ────────────────────────────────────────────────────── */
    .sm-badge {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 3px 9px;
        border-radius: 20px;
        font-size: 0.72rem; font-weight: 600;
        margin-bottom: 10px;
    }
    .sm-badge-analytics { background:#fff7ed; color:#c2410c; }
    .sm-badge-gsc       { background:#f0fdf4; color:#15803d; }
    .sm-badge-ads       { background:#faf5ff; color:#7e22ce; }
    .sm-badge-blue      { background:#eff6ff; color:#1d4ed8; }
    .sm-badge-pink      { background:#fdf2f8; color:#be185d; }

    /* ── Tips ──────────────────────────────────────────────────────── */
    .sm-tip {
        font-size: 0.78rem; color: #6b7280;
        display: flex; align-items: flex-start; gap: 6px; margin-top: 8px;
    }
    .sm-tip i { color: #9ca3af; margin-top: 2px; flex-shrink: 0; }
    .sm-tip code {
        background: #f3f4f6; border-radius: 4px;
        padding: 1px 5px; font-size: 0.75rem; color: #6366f1;
    }

    /* ── Status Dot ────────────────────────────────────────────────── */
    .sm-status-dot {
        display: inline-block;
        width: 8px; height: 8px;
        border-radius: 50%;
        background: #d1d5db;
        margin-left: 8px;
        vertical-align: middle;
    }
    .sm-status-dot.active { background: #22c55e; box-shadow: 0 0 0 3px rgba(34,197,94,0.2); }

    /* ── Section label ─────────────────────────────────────────────── */
    .sm-section-label {
        font-size: 0.73rem; font-weight: 700;
        text-transform: uppercase; letter-spacing: 0.08em;
        color: #9ca3af; margin-bottom: 14px;
        display: flex; align-items: center; gap: 10px;
    }
    .sm-section-label::after { content:''; flex:1; height:1px; background:#eef0f6; }

    /* ── Grid ──────────────────────────────────────────────────────── */
    .sm-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    @media (max-width: 768px) { .sm-grid-2 { grid-template-columns: 1fr; } }

    /* ── Save bar ──────────────────────────────────────────────────── */
    .sm-save-bar {
        background: #fafbff;
        border-top: 1.5px solid #eef0f6;
        padding: 16px 28px;
        display: flex; justify-content: flex-end; align-items: center; gap: 14px;
    }
    .sm-btn-save {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        color: #fff; border: none;
        padding: 10px 28px;
        border-radius: 8px;
        font-weight: 600; font-size: 0.9rem;
        cursor: pointer;
        display: inline-flex; align-items: center; gap: 8px;
        transition: all 0.2s;
        box-shadow: 0 2px 10px rgba(99,102,241,0.35);
    }
    .sm-btn-save:hover { transform: translateY(-1px); box-shadow: 0 4px 16px rgba(99,102,241,0.5); }
    .sm-btn-save:active { transform: translateY(0); }
</style>
@endpush

@section('content')
@include('backend.layouts.common.validation')
@include('backend.layouts.common.message')

{{-- Hero --}}
<div class="sm-hero">
    <div class="sm-hero-icon"><i class="fa fa-code"></i></div>
    <h4><i class="fa fa-layer-group me-2"></i>Script Manager</h4>
    <p>Configure all third-party tracking scripts, analytics, advertising pixels, and verification tags for your newspaper.</p>
</div>

<form id="scriptManagerForm"
      action="{{ route('seo.script_manager_store') }}"
      method="POST"
      data="showCallBackData">
    @csrf

    <div class="card mb-0" style="border-radius:14px; overflow:hidden; border:1.5px solid #eef0f6;">

        {{-- Tab Navigation --}}
        <div class="sm-tab-nav">
            <button type="button" class="sm-tab-btn tab-analytics active" data-tab="tab-analytics">
                <span class="sm-tab-icon"><i class="fa fa-chart-bar"></i></span> Analytics
            </button>
            <button type="button" class="sm-tab-btn tab-gsc" data-tab="tab-gsc">
                <span class="sm-tab-icon"><i class="fa fa-search"></i></span> Search Console
            </button>
            <button type="button" class="sm-tab-btn tab-ads" data-tab="tab-ads">
                <span class="sm-tab-icon"><i class="fa fa-bullhorn"></i></span> Advertising
            </button>
            <button type="button" class="sm-tab-btn tab-extras" data-tab="tab-extras">
                <span class="sm-tab-icon"><i class="fa fa-plug"></i></span> Extras
            </button>
            <button type="button" class="sm-tab-btn tab-redis" data-tab="tab-redis">
                <span class="sm-tab-icon" style="background:#fef2f2; color:#ef4444;"><i class="fa fa-server"></i></span> Redis & CDN
            </button>
            <button type="button" class="sm-tab-btn tab-custom" data-tab="tab-custom">
                <span class="sm-tab-icon"><i class="fa fa-terminal"></i></span> Custom Scripts
            </button>
        </div>

        {{-- TAB 1: Analytics --}}
        <div id="tab-analytics" class="sm-tab-content active">
            <div class="sm-section-label">Google Analytics</div>
            <div class="sm-grid-2">

                {{-- GA4 --}}
                <div class="sm-card">
                    <div class="sm-card-header">
                        <div class="sm-card-logo" style="background:#fff3e0;color:#e65100;font-size:1.2rem;"><i class="fa fa-chart-line"></i></div>
                        <div>
                            <p class="sm-card-title">
                                Google Analytics 4 (GA4)
                                <span class="sm-status-dot @if(!empty($existing_scripts->ga4_id)) active @endif" title="@if(!empty($existing_scripts->ga4_id)) Active @else Not configured @endif"></span>
                            </p>
                            <p class="sm-card-subtitle">Recommended — Latest GA platform</p>
                        </div>
                    </div>
                    <div class="sm-card-body">
                        <span class="sm-badge sm-badge-analytics"><i class="fa fa-tag"></i> Measurement ID</span>
                        <div class="sm-input-wrap">
                            <i class="fa fa-fingerprint sm-input-icon"></i>
                            <input type="text" class="form-control" id="ga4_id" name="ga4_id"
                                placeholder="G-XXXXXXXXXX"
                                value="{{ old('ga4_id', $existing_scripts->ga4_id ?? '') }}">
                        </div>
                        <div class="sm-tip">
                            <i class="fa fa-info-circle"></i>
                            Enter your GA4 Measurement ID. Looks like <code>G-XXXXXXXXXX</code>. Find it under Analytics → Admin → Data Streams.
                        </div>
                    </div>
                </div>

                {{-- Universal Analytics --}}
                <div class="sm-card">
                    <div class="sm-card-header">
                        <div class="sm-card-logo" style="background:#fce4ec;color:#c62828;font-size:1.2rem;"><i class="fa fa-chart-bar"></i></div>
                        <div>
                            <p class="sm-card-title">
                                Universal Analytics (UA)
                                <span class="sm-status-dot @if(!empty($existing_scripts->ua_id)) active @endif"></span>
                            </p>
                            <p class="sm-card-subtitle">Legacy — Being deprecated by Google</p>
                        </div>
                    </div>
                    <div class="sm-card-body">
                        <span class="sm-badge sm-badge-analytics"><i class="fa fa-tag"></i> Tracking ID</span>
                        <div class="sm-input-wrap">
                            <i class="fa fa-fingerprint sm-input-icon"></i>
                            <input type="text" class="form-control" id="ua_id" name="ua_id"
                                placeholder="UA-XXXXXXXXX-X"
                                value="{{ old('ua_id', $existing_scripts->ua_id ?? '') }}">
                        </div>
                        <div class="sm-tip">
                            <i class="fa fa-info-circle"></i>
                            Legacy Universal Analytics ID in format <code>UA-XXXXXX-X</code>. Migrate to GA4 for continued tracking.
                        </div>
                    </div>
                </div>

            </div>

            <div class="sm-section-label" style="margin-top:6px;">Tag Management</div>
            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-logo" style="background:#e8f5e9;color:#2e7d32;font-size:1.2rem;"><i class="fa fa-tags"></i></div>
                    <div>
                        <p class="sm-card-title">
                            Google Tag Manager (GTM)
                            <span class="sm-status-dot @if(!empty($existing_scripts->gtm_id)) active @endif"></span>
                        </p>
                        <p class="sm-card-subtitle">Manage all marketing tags centrally — no code deploys needed</p>
                    </div>
                </div>
                <div class="sm-card-body">
                    <span class="sm-badge sm-badge-gsc"><i class="fa fa-tag"></i> Container ID</span>
                    <div class="sm-input-wrap">
                        <i class="fa fa-cube sm-input-icon"></i>
                        <input type="text" class="form-control" id="gtm_id" name="gtm_id"
                            placeholder="GTM-XXXXXXX"
                            value="{{ old('gtm_id', $existing_scripts->gtm_id ?? '') }}">
                    </div>
                    <div class="sm-tip">
                        <i class="fa fa-info-circle"></i>
                        GTM Container ID in format <code>GTM-XXXXXXX</code>. When GTM is active, you can manage GA4, Pixel and other tags inside GTM without deploying code.
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB 2: Search Console --}}
        <div id="tab-gsc" class="sm-tab-content">
            <div class="sm-section-label">Domain Verification</div>
            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-logo" style="background:#e8f4fd;color:#1565c0;font-size:1.2rem;"><i class="fa fa-search"></i></div>
                    <div>
                        <p class="sm-card-title">
                            Google Search Console
                            <span class="sm-status-dot @if(!empty($existing_scripts->search_console_meta)) active @endif"></span>
                        </p>
                        <p class="sm-card-subtitle">Verify site ownership and monitor search performance &amp; indexing</p>
                    </div>
                </div>
                <div class="sm-card-body">
                    <span class="sm-badge sm-badge-gsc"><i class="fa fa-shield-alt"></i> HTML Meta Verification Tag</span>
                    <div class="sm-input-wrap">
                        <i class="fa fa-code sm-input-icon"></i>
                        <input type="text" class="form-control" id="search_console_meta" name="search_console_meta"
                            placeholder='&lt;meta name="google-site-verification" content="XXXXXXXXXXXX" /&gt;'
                            value="{{ old('search_console_meta', $existing_scripts->search_console_meta ?? '') }}">
                    </div>
                    <div class="sm-tip">
                        <i class="fa fa-info-circle"></i>
                        Paste the full <code>&lt;meta&gt;</code> tag from Google Search Console → Settings → Ownership Verification → HTML Tag. It will be injected automatically into every page's <code>&lt;head&gt;</code>.
                    </div>
                </div>
            </div>

            <div class="sm-section-label">Other Search Engines</div>
            <div class="sm-card" style="border-color:#e0e7ff;">
                <div class="sm-card-header" style="background:#f5f3ff;">
                    <div class="sm-card-logo" style="background:#e0e7ff;color:#6366f1;font-size:1.1rem;"><i class="fa fa-search-plus"></i></div>
                    <div style="flex:1;">
                        <p class="sm-card-title">Bing / Microsoft Webmaster Tools</p>
                        <p class="sm-card-subtitle">Paste the <code style="font-size:0.74rem;background:#ede9fe;border-radius:4px;padding:1px 5px;">&lt;meta name="msvalidate.01"...&gt;</code> tag in Custom Head Scripts</p>
                    </div>
                    <button type="button" class="btn btn-sm" style="background:#6366f1;color:#fff;border-radius:6px;font-size:0.75rem;white-space:nowrap;"
                        onclick="document.querySelector('[data-tab=tab-custom]').click()">
                        Go to Custom Scripts &rarr;
                    </button>
                </div>
            </div>
        </div>

        {{-- TAB 3: Advertising --}}
        <div id="tab-ads" class="sm-tab-content">
            <div class="sm-section-label">Social Media Advertising</div>
            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-logo" style="background:#eff6ff;color:#1877F2;font-size:1.2rem;"><i class="fa fa-facebook-f"></i></div>
                    <div>
                        <p class="sm-card-title">
                            Meta (Facebook) Pixel
                            <span class="sm-status-dot @if(!empty($existing_scripts->meta_pixel_id)) active @endif"></span>
                        </p>
                        <p class="sm-card-subtitle">Track ad conversions, build custom audiences and retarget readers</p>
                    </div>
                </div>
                <div class="sm-card-body">
                    <span class="sm-badge sm-badge-ads"><i class="fa fa-tag"></i> Pixel ID</span>
                    <div class="sm-input-wrap">
                        <i class="fa fa-hashtag sm-input-icon"></i>
                        <input type="text" class="form-control" id="meta_pixel_id" name="meta_pixel_id"
                            placeholder="123456789012345"
                            value="{{ old('meta_pixel_id', $existing_scripts->meta_pixel_id ?? '') }}">
                    </div>
                    <div class="sm-tip">
                        <i class="fa fa-info-circle"></i>
                        Find your Pixel ID in Meta Business Manager → Events Manager → Your Pixel → Settings. It's a 15–16 digit numeric ID.
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB 4: Extras --}}
        <div id="tab-extras" class="sm-tab-content">
            <div class="sm-section-label">Live Chat</div>
            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-logo" style="background:#e0f2fe;color:#0284c7;font-size:1.2rem;"><i class="fa fa-comments"></i></div>
                    <div>
                        <p class="sm-card-title">
                            Tawk.to Live Chat
                            <span class="sm-status-dot @if(!empty($existing_scripts->tawkto_id)) active @endif"></span>
                        </p>
                        <p class="sm-card-subtitle">Free live chat widget for real-time reader engagement</p>
                    </div>
                </div>
                <div class="sm-card-body">
                    <span class="sm-badge sm-badge-blue"><i class="fa fa-tag"></i> Property &amp; Widget ID</span>
                    <div class="sm-input-wrap">
                        <i class="fa fa-comment-dots sm-input-icon"></i>
                        <input type="text" class="form-control" id="tawkto_id" name="tawkto_id"
                            placeholder="5f1a2b3c4d5e6f7a8b9c0d1e/1abc2def3"
                            value="{{ old('tawkto_id', $existing_scripts->tawkto_id ?? '') }}">
                    </div>
                    <div class="sm-tip">
                        <i class="fa fa-info-circle"></i>
                        Found in Tawk.to Dashboard → Administration → Chat Widget. Format: <code>propertyId/widgetId</code>.
                    </div>
                </div>
            </div>

            <div class="sm-section-label">Heatmaps &amp; User Behaviour</div>
            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-logo" style="background:#fff7ed;color:#ea580c;font-size:1.2rem;"><i class="fa fa-fire"></i></div>
                    <div>
                        <p class="sm-card-title">
                            Hotjar
                            <span class="sm-status-dot @if(!empty($existing_scripts->hotjar_id)) active @endif"></span>
                        </p>
                        <p class="sm-card-subtitle">Heatmaps, session recordings and user feedback surveys</p>
                    </div>
                </div>
                <div class="sm-card-body">
                    <span class="sm-badge sm-badge-analytics"><i class="fa fa-tag"></i> Site ID</span>
                    <div class="sm-input-wrap">
                        <i class="fa fa-hashtag sm-input-icon"></i>
                        <input type="text" class="form-control" id="hotjar_id" name="hotjar_id"
                            placeholder="1234567"
                            value="{{ old('hotjar_id', $existing_scripts->hotjar_id ?? '') }}">
                    </div>
                    <div class="sm-tip">
                        <i class="fa fa-info-circle"></i>
                        Your numeric Hotjar Site ID. Find it in Hotjar → Settings → Sites &amp; Organizations.
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB: Redis & CDN --}}
        <div id="tab-redis" class="sm-tab-content">
            <div class="sm-section-label">Object Caching (Redis)</div>
            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-logo" style="background:#fef2f2;color:#dc2626;font-size:1.2rem;"><i class="fa fa-database"></i></div>
                    <div>
                        <p class="sm-card-title">
                            Redis Object Cache
                            <span class="sm-status-dot @if(!empty($existing_scripts->redis_host)) active @endif"></span>
                        </p>
                        <p class="sm-card-subtitle">Store database queries in RAM for ultra-fast response times.</p>
                    </div>
                </div>
                <div class="sm-card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <span class="sm-badge sm-badge-pink"><i class="fa fa-network-wired"></i> Redis Host</span>
                            <div class="sm-input-wrap">
                                <i class="fa fa-server sm-input-icon"></i>
                                <input type="text" class="form-control" id="redis_host" name="redis_host"
                                    placeholder="127.0.0.1"
                                    value="{{ old('redis_host', $existing_scripts->redis_host ?? env('REDIS_HOST', '127.0.0.1')) }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="sm-badge sm-badge-pink"><i class="fa fa-hashtag"></i> Redis Port</span>
                            <div class="sm-input-wrap">
                                <i class="fa fa-door-open sm-input-icon"></i>
                                <input type="text" class="form-control" id="redis_port" name="redis_port"
                                    placeholder="6379"
                                    value="{{ old('redis_port', $existing_scripts->redis_port ?? env('REDIS_PORT', '6379')) }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="sm-badge sm-badge-pink"><i class="fa fa-key"></i> Redis Password (Optional)</span>
                            <div class="sm-input-wrap">
                                <i class="fa fa-lock sm-input-icon"></i>
                                <input type="text" class="form-control" id="redis_password" name="redis_password"
                                    placeholder="Leave blank if none"
                                    value="{{ old('redis_password', $existing_scripts->redis_password ?? (env('REDIS_PASSWORD') === 'null' ? '' : env('REDIS_PASSWORD'))) }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="sm-badge sm-badge-pink"><i class="fa fa-power-off"></i> Enable Redis Caching</span>
                            <div class="sm-input-wrap" style="padding-top:10px;">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="enable_redis" name="enable_redis" value="1" @if(env('CACHE_DRIVER') === 'redis') checked @endif style="width: 40px; height: 20px;">
                                    <label class="form-check-label ms-2" for="enable_redis">Turn on object caching</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sm-section-label mt-4">Content Delivery Network (CDN)</div>
            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-logo" style="background:#eef2ff;color:#4f46e5;font-size:1.2rem;"><i class="fa fa-globe"></i></div>
                    <div>
                        <p class="sm-card-title">
                            Static Asset CDN
                            <span class="sm-status-dot @if(!empty($existing_scripts->cdn_url)) active @endif"></span>
                        </p>
                        <p class="sm-card-subtitle">Serve images, CSS, and JS from a CDN edge node.</p>
                    </div>
                </div>
                <div class="sm-card-body">
                    <span class="sm-badge sm-badge-blue"><i class="fa fa-link"></i> CDN Base URL</span>
                    <div class="sm-input-wrap">
                        <i class="fa fa-cloud sm-input-icon"></i>
                        <input type="text" class="form-control" id="cdn_url" name="cdn_url"
                            placeholder="https://cdn.example.com"
                            value="{{ old('cdn_url', $existing_scripts->cdn_url ?? (env('ASSET_URL') === 'null' ? '' : env('ASSET_URL'))) }}">
                    </div>
                    <div class="sm-tip">
                        <i class="fa fa-info-circle"></i>
                        Enter your CDN URL. E.g. <code>https://cdn.example.com</code>. Leave blank to serve assets locally.
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB 5: Custom Scripts --}}
        <div id="tab-custom" class="sm-tab-content">

            <div class="sm-section-label">Head Section Scripts</div>
            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-logo" style="background:#fdf2f8;color:#db2777;font-size:1.2rem;"><i class="fa fa-code"></i></div>
                    <div>
                        <p class="sm-card-title">Custom Head Scripts</p>
                        <p class="sm-card-subtitle">Injected inside <code style="font-size:0.75rem;background:#f3f4f6;border-radius:4px;padding:1px 5px;">&lt;head&gt;</code> on every frontend page</p>
                    </div>
                </div>
                <div class="sm-card-body">
                    <span class="sm-badge sm-badge-pink"><i class="fa fa-terminal"></i> Raw HTML / Script</span>
                    <div class="sm-textarea-wrap">
                        <textarea class="form-control" id="custom_head_scripts" name="custom_head_scripts"
                            rows="10"
                            placeholder="<!-- Paste <script>, <meta>, <link> or any other tags here -->&#10;<!-- Example: Bing Webmaster verification -->&#10;<meta name=&quot;msvalidate.01&quot; content=&quot;XXXXXXXXXX&quot; />&#10;&#10;<!-- Example: Custom CSS -->&#10;<style>:root { --brand-color: #e63946; }</style>"
                            >{{ old('custom_head_scripts', $existing_scripts->custom_head_scripts ?? '') }}</textarea>
                    </div>
                    <div class="sm-tip">
                        <i class="fa fa-exclamation-triangle" style="color:#f59e0b;"></i>
                        <span>Only paste trusted code here. Scripts are output raw without escaping — malicious code can compromise your readers.</span>
                    </div>
                </div>
            </div>

            <div class="sm-section-label">Body Section Scripts</div>
            <div class="sm-card">
                <div class="sm-card-header">
                    <div class="sm-card-logo" style="background:#f0fdf4;color:#16a34a;font-size:1.2rem;"><i class="fa fa-terminal"></i></div>
                    <div>
                        <p class="sm-card-title">Custom Body Scripts</p>
                        <p class="sm-card-subtitle">Injected just before <code style="font-size:0.75rem;background:#f3f4f6;border-radius:4px;padding:1px 5px;">&lt;/body&gt;</code> on every frontend page</p>
                    </div>
                </div>
                <div class="sm-card-body">
                    <span class="sm-badge sm-badge-gsc"><i class="fa fa-terminal"></i> Raw HTML / Script</span>
                    <div class="sm-textarea-wrap">
                        <textarea class="form-control" id="custom_body_scripts" name="custom_body_scripts"
                            rows="10"
                            placeholder="<!-- Scripts loaded at end of body are non-blocking -->&#10;<!-- Example: Live chat widget, custom analytics, etc. -->&#10;<script>&#10;  // Your custom code here&#10;</script>"
                            >{{ old('custom_body_scripts', $existing_scripts->custom_body_scripts ?? '') }}</textarea>
                    </div>
                    <div class="sm-tip">
                        <i class="fa fa-lightbulb" style="color:#f59e0b;"></i>
                        <span>Body scripts load after page content renders — ideal for non-critical widgets and chat tools to avoid slowing down page load.</span>
                    </div>
                </div>
            </div>

        </div>{{-- /tab-custom --}}

        {{-- Save Bar --}}
        <div class="sm-save-bar">
            <span id="sm-save-status" style="font-size:0.82rem; color:#6b7280;"></span>
            <button type="submit" class="sm-btn-save" id="sm-submit-btn">
                <i class="fa fa-save"></i>
                Save Changes
            </button>
        </div>

    </div>{{-- /card --}}
</form>

@endsection

@push('js')
<script>
$(document).ready(function () {
    "use strict";

    // Tab switching
    $(document).on('click', '.sm-tab-btn', function () {
        var target = $(this).data('tab');
        $('.sm-tab-btn').removeClass('active');
        $('.sm-tab-content').removeClass('active');
        $(this).addClass('active');
        $('#' + target).addClass('active');
    });

    // AJAX Form Submit
    $('#scriptManagerForm').on('submit', function (e) {
        e.preventDefault();
        var $btn    = $('#sm-submit-btn');
        var $status = $('#sm-save-status');
        var form    = this;

        $btn.html('<i class="fa fa-spinner fa-spin"></i> Saving&hellip;').prop('disabled', true);
        $status.text('');

        $.ajax({
            url         : $(form).attr('action'),
            type        : 'POST',
            data        : new FormData(form),
            contentType : false,
            processData : false,
            success: function (response) {
                if (response.error === false) {
                    $status.html('<span style="color:#22c55e;"><i class="fa fa-check-circle"></i> ' + response.msg + '</span>');
                    refreshStatusDots();
                } else {
                    $status.html('<span style="color:#ef4444;"><i class="fa fa-times-circle"></i> ' + response.msg + '</span>');
                }
            },
            error: function (xhr) {
                var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'An error occurred.';
                $status.html('<span style="color:#ef4444;"><i class="fa fa-times-circle"></i> ' + msg + '</span>');
            },
            complete: function () {
                $btn.html('<i class="fa fa-save"></i> Save Changes').prop('disabled', false);
                setTimeout(function () { $status.fadeOut(400, function() { $(this).text('').show(); }); }, 5000);
            }
        });
    });

    // Live status dot refresh
    function refreshStatusDots() {
        $('.sm-card').each(function () {
            var $card   = $(this);
            var $inputs = $card.find('input[type="text"], textarea');
            var hasVal  = false;
            $inputs.each(function () { if ($(this).val().trim() !== '') hasVal = true; });
            $card.find('.sm-status-dot').toggleClass('active', hasVal);
        });
    }

    $('input[type="text"], textarea').on('input', refreshStatusDots);
});
</script>
@endpush
