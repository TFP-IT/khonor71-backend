@php
    $footerLocale = str_starts_with(app()->getLocale(), 'bn') ? 'bn' : 'en';
    $footerInfo = $footerContent[$footerLocale] ?? ($footerContent['en'] ?? []);
    $footerLogo = app_setting()->footer_logo ?: app_setting()->logo;
    $footerSiteName = app_setting()->title ?: 'News Portal';
    $footerCopyright = trim((string) app_setting()->copy_right);
    $footerCopyright = $footerCopyright !== ''
        ? preg_replace('/©\s*\d{4}/u', '© ' . date('Y'), $footerCopyright)
        : '© ' . date('Y') . ' ' . $footerSiteName;

    $footerSocialLinks = [
        ['label' => 'Facebook', 'mark' => 'f', 'url' => data_get($socialLinks, 'fb.link')],
        ['label' => 'X', 'mark' => '𝕏', 'url' => data_get($socialLinks, 'tw.link')],
        ['label' => 'Instagram', 'mark' => '◎', 'url' => data_get($socialLinks, 'instagram.link')],
        ['label' => 'YouTube', 'mark' => '▶', 'url' => data_get($socialLinks, 'youtube.link')],
        ['label' => 'LinkedIn', 'mark' => 'in', 'url' => data_get($socialLinks, 'linkd.link')],
    ];

    $footerSocialLinks = array_filter($footerSocialLinks, fn ($link) => filled($link['url']));
    $editorialFields = ['editor_in_chief', 'editor', 'publisher'];
    $contactFields = ['address', 'mobile', 'email'];
    $footerLabels = $footerLocale === 'bn'
        ? [
            'about' => $footerInfo['editorial_heading'] ?? 'সম্পাদকীয় বিভাগ',
            'contact' => $footerInfo['contact_heading'] ?? 'যোগাযোগ',
            'newsletter' => $footerInfo['newsletter_heading'] ?? 'নিউজলেটার',
            'newsletter_text' => $footerInfo['newsletter_text'] ?? 'নতুন খবর ও গুরুত্বপূর্ণ আপডেট পেতে আমাদের সঙ্গে থাকুন।',
            'quick_links' => $footerInfo['quick_links_heading'] ?? 'গুরুত্বপূর্ণ লিংক',
            'legal' => $footerInfo['legal_heading'] ?? 'তথ্য ও নীতিমালা',
            'email_placeholder' => $footerInfo['email_placeholder'] ?? 'আপনার ইমেইল ঠিকানা',
            'subscribe' => $footerInfo['subscribe_label'] ?? 'সাবস্ক্রাইব',
            'subscribing' => $footerInfo['subscribing_label'] ?? 'সাবস্ক্রাইব হচ্ছে…',
            'follow' => $footerInfo['follow_heading'] ?? 'সামাজিক মাধ্যমে অনুসরণ করুন',
        ]
        : [
            'about' => $footerInfo['editorial_heading'] ?? 'Editorial Team',
            'contact' => $footerInfo['contact_heading'] ?? 'Contact',
            'newsletter' => $footerInfo['newsletter_heading'] ?? 'Newsletter',
            'newsletter_text' => $footerInfo['newsletter_text'] ?? 'Get the latest headlines and important updates from our newsroom.',
            'quick_links' => $footerInfo['quick_links_heading'] ?? 'Useful Links',
            'legal' => $footerInfo['legal_heading'] ?? 'Information & Policies',
            'email_placeholder' => $footerInfo['email_placeholder'] ?? 'Your email address',
            'subscribe' => $footerInfo['subscribe_label'] ?? 'Subscribe',
            'subscribing' => $footerInfo['subscribing_label'] ?? 'Subscribing…',
            'follow' => $footerInfo['follow_heading'] ?? 'Follow us',
        ];
@endphp

<footer class="relative isolate overflow-hidden bg-slate-950 text-white" aria-label="{{ $footerSiteName }} footer">
    <img class="pointer-events-none absolute inset-0 -z-10 h-full w-full object-cover opacity-[0.12]"
        src="{{ app_setting()->footer_bg_img ? asset('storage/' . app_setting()->footer_bg_img) : asset('/assets/footer-bg.webp') }}"
        alt="" width="1920" height="504" loading="lazy" decoding="async" />
    <div class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-br from-slate-950/95 via-slate-950/90 to-slate-900/95"></div>

    <div class="container relative px-4 pt-5 pb-4 sm:pt-6 sm:pb-5 lg:pt-8 lg:pb-6">
        <div class="grid grid-cols-1 gap-7 border-b border-white/15 pb-6 sm:grid-cols-2 sm:gap-x-8 lg:grid-cols-4 lg:gap-x-10 lg:gap-y-8">
            <section class="min-w-0" aria-labelledby="footer-brand-heading">
                <h2 id="footer-brand-heading" class="sr-only">{{ $footerSiteName }}</h2>
                <a class="inline-flex max-w-full items-center border-0 p-0 shadow-none focus:outline-none focus:ring-2 focus:ring-brand-primary focus:ring-offset-4 focus:ring-offset-slate-950"
                    href="{{ __url('/') }}" aria-label="{{ $footerSiteName }} home">
                    <img src="{{ $footerLogo }}" alt="{{ $footerSiteName }}" width="144" height="51"
                        class="h-12 w-auto max-w-full border-0 p-0 object-contain object-left" loading="lazy" decoding="async" />
                </a>

                <div class="mt-4">
                    <h2 class="text-base font-bold tracking-wide text-white">{{ $footerLabels['newsletter'] }}</h2>
                    <p class="mt-2 max-w-sm text-sm leading-6 text-slate-300">{{ $footerLabels['newsletter_text'] }}</p>

                    <form id="subscribe-form" class="mt-4" aria-label="{{ $footerLabels['newsletter'] }}">
                        @csrf
                        <div id="subscribe-message" class="mb-2 text-sm" role="status" aria-live="polite"></div>
                        <label for="subscriber_email" class="sr-only">{{ $footerLabels['email_placeholder'] }}</label>
                        <div class="flex min-w-0 overflow-hidden rounded-md border border-white/20 bg-white focus-within:ring-2 focus-within:ring-brand-primary">
                            <input name="subscriber_email" id="subscriber_email" type="email" required autocomplete="email"
                                placeholder="{{ $footerLabels['email_placeholder'] }}"
                                class="min-w-0 flex-1 border-0 bg-transparent px-3 py-3 text-sm text-slate-900 outline-none placeholder:text-slate-500 focus:ring-0" />
                            <button type="submit" id="subscribe-btn"
                                data-label="{{ $footerLabels['subscribe'] }}"
                                data-loading-label="{{ $footerLabels['subscribing'] }}"
                                class="shrink-0 bg-brand-primary px-4 text-sm font-semibold text-white transition-colors hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white disabled:cursor-wait disabled:opacity-70">
                                {{ $footerLabels['subscribe'] }}
                            </button>
                        </div>
                    </form>
                </div>

                @if (count($footerSocialLinks))
                    <div class="mt-6">
                        <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-300">{{ $footerLabels['follow'] }}</h3>
                        <ul class="mt-3 flex flex-wrap gap-2" aria-label="{{ $footerLabels['follow'] }}">
                            @foreach ($footerSocialLinks as $socialLink)
                                <li>
                                    <a href="{{ $socialLink['url'] }}" target="_blank" rel="noopener noreferrer"
                                        aria-label="{{ $socialLink['label'] }}"
                                        class="inline-flex h-9 min-w-9 items-center justify-center rounded-full border border-white/20 px-2 text-sm font-bold text-slate-200 transition-colors hover:border-brand-primary hover:bg-brand-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-brand-primary">
                                        <span aria-hidden="true">{{ $socialLink['mark'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </section>

            <section class="min-w-0" aria-labelledby="footer-editorial-heading">
                <h2 id="footer-editorial-heading" class="text-base font-bold text-white">{{ $footerLabels['about'] }}</h2>
                <ul class="mt-4 space-y-4">
                    @foreach ($editorialFields as $field)
                        @if (filled($footerInfo[$field] ?? null))
                            <li class="min-w-0 border-l-2 border-brand-primary pl-3">
                                @if (filled($footerInfo[$field . '_label'] ?? null))
                                    <h3 class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        {{ rtrim($footerInfo[$field . '_label'], ':：') }}
                                    </h3>
                                @endif
                                <p class="mt-1 break-words text-sm leading-6 text-slate-100">{{ $footerInfo[$field] }}</p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>

            <section class="min-w-0" aria-labelledby="footer-contact-heading">
                <h2 id="footer-contact-heading" class="text-base font-bold text-white">{{ $footerLabels['contact'] }}</h2>
                <address class="mt-4 space-y-4 not-italic">
                    @if (filled($footerInfo['address'] ?? null))
                        <div class="flex items-start gap-3 text-sm leading-6 text-slate-300">
                            <svg class="mt-1 h-4 w-4 shrink-0 text-brand-primary" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 21s7-5.2 7-12a7 7 0 1 0-14 0c0 6.8 7 12 7 12Z" stroke="currentColor" stroke-width="1.8" />
                                <circle cx="12" cy="9" r="2.2" stroke="currentColor" stroke-width="1.8" />
                            </svg>
                            <span><span class="font-semibold text-white">{{ rtrim($footerInfo['address_label'] ?? $footerLabels['contact'], ':：') }}:</span> {{ $footerInfo['address'] }}</span>
                        </div>
                    @endif

                    @if (filled($footerInfo['mobile'] ?? null))
                        <div class="flex items-center gap-3 text-sm text-slate-300">
                            <svg class="h-4 w-4 shrink-0 text-brand-primary" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7.2 3.5h2.2l1.1 4-1.7 1.4a14 14 0 0 0 6.3 6.3l1.4-1.7 4 1.1v2.2a2 2 0 0 1-2.2 2A15.5 15.5 0 0 1 5.2 5.7a2 2 0 0 1 2-2.2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                            </svg>
                            <span><span class="font-semibold text-white">{{ rtrim($footerInfo['mobile_label'] ?? '', ':：') }}:</span>
                                <a class="break-all underline decoration-white/30 underline-offset-4 hover:text-white" href="tel:{{ preg_replace('/[^0-9+]/', '', $footerInfo['mobile']) }}">{{ $footerInfo['mobile'] }}</a>
                            </span>
                        </div>
                    @endif

                    @if (filled($footerInfo['email'] ?? null))
                        <div class="flex items-center gap-3 text-sm text-slate-300">
                            <svg class="h-4 w-4 shrink-0 text-brand-primary" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M3.5 6.5h17v11h-17v-11Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                                <path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                            </svg>
                            <span><span class="font-semibold text-white">{{ rtrim($footerInfo['email_label'] ?? '', ':：') }}:</span>
                                <a class="break-all underline decoration-white/30 underline-offset-4 hover:text-white" href="mailto:{{ $footerInfo['email'] }}">{{ $footerInfo['email'] }}</a>
                            </span>
                        </div>
                    @endif
                </address>
            </section>

            <section class="min-w-0" aria-labelledby="footer-links-heading">
                <h2 id="footer-links-heading" class="text-base font-bold text-white">{{ $footerLabels['quick_links'] }}</h2>
                <nav class="mt-4" aria-label="{{ $footerLabels['quick_links'] }}">
                    @if ($footerMenus->isNotEmpty())
                        <ul class="grid grid-cols-2 gap-x-3 gap-y-2">
                            @foreach ($footerMenus->take(12) as $footerMenu)
                                @php
                                    $footerLink = $footerMenu->content_type === 'links'
                                        ? $footerMenu->link_url
                                        : __url($footerMenu->slug);
                                @endphp
                                <li class="min-w-0">
                                    <a class="flex min-w-0 items-start gap-2 text-sm leading-5 text-slate-300 transition-colors hover:text-white focus:outline-none focus:text-white"
                                        href="{{ $footerLink }}">
                                        <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-primary" aria-hidden="true"></span>
                                        <span class="min-w-0 break-words">{{ $footerMenu->menu_level }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-slate-400">{{ $footerSiteName }}</p>
                    @endif
                </nav>
            </section>
        </div>

        <div class="flex flex-col gap-3 pt-4 text-xs leading-5 text-slate-400 sm:flex-row sm:items-center sm:justify-between">
            <p>{{ $footerCopyright }}</p>
            @if ($footerPages->isNotEmpty())
                <nav aria-label="{{ $footerLabels['legal'] }}" class="min-w-0">
                    <ul class="flex flex-wrap gap-x-4 gap-y-2">
                        @foreach ($footerPages as $footerPage)
                            @php
                                $footerLink = $footerPage->content_type === 'links'
                                    ? $footerPage->link_url
                                    : __url($footerPage->slug);
                            @endphp
                            <li><a class="hover:text-white" href="{{ $footerLink }}">{{ $footerPage->menu_level }}</a></li>
                        @endforeach
                    </ul>
                </nav>
            @endif
        </div>
    </div>
</footer>
