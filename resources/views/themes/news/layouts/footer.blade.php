<footer class="relative w-full h-max isolate">
    <img class="absolute top-0 left-0 w-full h-full -z-1"
        src="@if (app_setting()->footer_bg_img) {{ asset('storage/' . app_setting()->footer_bg_img) }} @else {{ asset('/assets/footer-bg.png') }} @endif"
        alt="Footer Background" />
    <div class="container py-8">

        <?php /* 
        @include ('themes.news.components.common.footer-heading') 
        */ ?>

        <section
            class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-4 xl:gap-0 border-y border-y-neutral-700 py-8 lg:divide-x lg:divide-neutral-700">
            <!--  {/* Address Section */} -->
            <!-- <div class="text-white space-y-8 lg:pr-4 2xl:pr-6">
                <div>
                    <h2 class="text-xl font-bold mb-8 capitalize">About Us</h2>
                </div>
                <ul class="space-y-2">
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span>{{ app_setting()->address }}</span>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span>{{ app_setting()->phone }}</span>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span>{{ app_setting()->email }}</span>
                    </li>
                </ul>
            </div> -->
            <!-- Address Section -->
            <div class="text-white space-y-8 lg:pr-4 2xl:pr-6">
                <div>
                    <h2 class="text-xl font-bold mb-8 capitalize">আমাদের সম্পর্কে</h2>
                </div>
                <ul class="space-y-4">
                    <!-- প্রকাশক -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 640 640" stroke="currentColor">
                                <path d="M320 312C253.7 312 200 258.3 200 192C200 125.7 253.7 72 320 72C386.3 72 440 125.7 440 192C440 258.3 386.3 312 320 312zM289.5 368L350.5 368C360.2 368 368 375.8 368 385.5C368 389.7 366.5 393.7 363.8 396.9L336.4 428.9L367.4 544L368 544L402.6 405.5C404.8 396.8 413.7 391.5 422.1 394.7C484 418.3 528 478.3 528 548.5C528 563.6 515.7 575.9 500.6 575.9L139.4 576C124.3 576 112 563.7 112 548.6C112 478.4 156 418.4 217.9 394.8C226.3 391.6 235.2 396.9 237.4 405.6L272 544.1L272.6 544.1L303.6 429L276.2 397C273.5 393.8 272 389.8 272 385.6C272 375.9 279.8 368.1 289.5 368.1z" fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>প্রকাশক:</strong> এস এম তাসদীদ সোয়াদ</span>
                    </li>

                    <!-- সম্পাদক -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 640 640" stroke="currentColor">
                                <path d="M320 312C253.7 312 200 258.3 200 192C200 125.7 253.7 72 320 72C386.3 72 440 125.7 440 192C440 258.3 386.3 312 320 312zM289.5 368L350.5 368C360.2 368 368 375.8 368 385.5C368 389.7 366.5 393.7 363.8 396.9L336.4 428.9L367.4 544L368 544L402.6 405.5C404.8 396.8 413.7 391.5 422.1 394.7C484 418.3 528 478.3 528 548.5C528 563.6 515.7 575.9 500.6 575.9L139.4 576C124.3 576 112 563.7 112 548.6C112 478.4 156 418.4 217.9 394.8C226.3 391.6 235.2 396.9 237.4 405.6L272 544.1L272.6 544.1L303.6 429L276.2 397C273.5 393.8 272 389.8 272 385.6C272 375.9 279.8 368.1 289.5 368.1z" fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>সম্পাদক:</strong> লে. কর্নেল এ এস এম আল ইমরান (অব:)</span>
                    </li>

                    <!-- যোগাযোগ -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>যোগাযোগ:</strong> বাড়ী নং-০১, ২য় তলা, রোড নং-০৬, মধ্যবাড্ডা, বাড্ডা, ঢাকা</span>
                    </li>

                    <!-- মার্কেটিং মোবাইল -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>মার্কেটিং মোবাইল:</strong> ০১৯০৭০৯৯২৫২</span>
                    </li>

                    <!-- নিউজ রুম মোবাইল -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>নিউজ রুম মোবাইল:</strong> ০১৯০৭০৯৯২৫২</span>
                    </li>

                    <!-- নিউজ রুম ইমেইল -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>নিউজ রুম ইমেইল:</strong> news.khobor71@gmail.com</span>
                    </li>
                </ul>
            </div>
            <!-- {/* Quick Link */} -->
            <!-- <div class="text-white lg:px-4 2xl:px-6">
                <h2 class="text-xl font-bold mb-8">{{ localize('categories') }}</h2>

                <div class="grid grid-cols-2 gap-16">
                    @if ($footerCategories->isNotEmpty())
                        @php
                            $leftFooterCategories = $footerCategories->take(5);
                            $rightFooterCategories = $footerCategories->slice(5);
                        @endphp
                        <ul class="space-y-2">
                            @foreach ($leftFooterCategories as $footerCategory)
                                @php
                                    if ($footerCategory->content_type == 'links') {
                                        $link = $footerCategory->link_url;
                                    } elseif ($footerCategory->content_type == 'pages') {
                                        $link = __url($footerCategory->slug);
                                    } else {
                                        $link = __url($footerCategory->slug);
                                    }
                                @endphp

                                <li class="nav_link">
                                    <a href="{{ $link }}">{{ $footerCategory->menu_level }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="space-y-2">
                            @foreach ($rightFooterCategories as $footerCategory)
                                @php
                                    if ($footerCategory->content_type == 'links') {
                                        $link = $footerCategory->link_url;
                                    } elseif ($footerCategory->content_type == 'pages') {
                                        $link = __url($footerCategory->slug);
                                    } else {
                                        $link = __url($footerCategory->slug);
                                    }
                                @endphp

                                <li class="nav_link">
                                    <a href="{{ $link }}">{{ $footerCategory->menu_level }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div> -->
            <div class="text-white lg:px-4 2xl:px-6 flex flex-col items-center justify-center h-full gap-2">
                <!-- Logo -->
                <a class="w-44 md:w-64 h-11 flex justify-center items-center" href="{{ __url('/') }}">
                    <img src="{{ app_setting()->footer_logo }}" alt="Brand Logo" class="max-w-full object-contain" />
                </a>

                <p class="text-center mt-12">
                    {{ localize('subscribe_to_our_newsletter_to_get_our_newest_articles_instantly!') }}
                </p>

                <form id="subscribe-form" class="relative my-2 max-w-xl mx-auto">
                    @csrf

                    <div id="subscribe-message" class="text-sm pb-1 text-center"></div>

                    <div class="relative">
                        <input name="subscriber_email" id="subscriber_email"
                            class="text-neutral-800 py-3 pl-3 pr-28 rounded-md w-full duration-300 ease-in placeholder:text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500"
                            type="email" placeholder="Email" required />

                        <button type="submit" id="subscribe-btn"
                            class="absolute top-1/2 -translate-y-1/2 right-0 rounded-r-md bg-red-500 text-white hover:bg-red-600 px-4 h-full border border-red-500 flex items-center justify-center gap-1 transition-all duration-300 ease-in">
                            {{ localize('subscribe') }}
                        </button>
                    </div>
                </form>

                <!-- Social Links -->
                <div class="flex flex-row items-center gap-3">
                    <a target="_blank"
                        class="w-8 h-8 md:w-10 md:h-10 text-white flex justify-center items-center group rounded-full p-1 hover:text-social-facebook ring-1 ring-white hover:ring-2 hover:ring-social-facebook transition-all duration-300 ease-in-out"
                        href="{{ $socialLinks->fb->link ?? 'https://www.facebook.com' }}">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 13.65H16.8571L18 9.25H14V7.05C14 5.917 14 4.85 16.2857 4.85H18V1.154C17.6274 1.1067 16.2206 1 14.7349 1C11.632 1 9.42857 2.8227 9.42857 6.17V9.25H6V13.65H9.42857V23H14V13.65Z"
                                fill="currentColor" />
                        </svg>
                    </a>

                    <a target="_blank"
                        class="w-8 h-8 md:w-10 md:h-10 text-white flex justify-center items-center group rounded-full p-1 hover:text-social-twitter ring-1 ring-white hover:ring-2 hover:ring-social-twitter transition-all duration-300 ease-in-out"
                        href="{{ $socialLinks->tw->link ?? 'https://www.twitter.com/' }}">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22.9989 5.1368C22.175 5.50356 21.3012 5.74443 20.4065 5.85143C21.3495 5.28389 22.0553 4.39068 22.3924 3.33826C21.5074 3.86826 20.5371 4.2397 19.5258 4.44062C18.8465 3.70924 17.9461 3.22418 16.9646 3.06086C15.9831 2.89754 14.9755 3.0651 14.0984 3.5375C13.2213 4.0099 12.5239 4.76067 12.1145 5.67309C11.7052 6.58551 11.6069 7.60846 11.8349 8.58291C10.0401 8.49239 8.2844 8.02306 6.68163 7.2054C5.07885 6.38774 3.66487 5.24003 2.5315 3.83677C2.13032 4.53017 1.9195 5.31842 1.92062 6.12078C1.92062 7.69559 2.71713 9.08685 3.92808 9.9014C3.21145 9.8787 2.51059 9.68395 1.88393 9.33339V9.38986C1.88414 10.4387 2.24481 11.4552 2.90476 12.2669C3.56472 13.0787 4.48335 13.6358 5.50491 13.8439C4.83965 14.0253 4.14211 14.052 3.46507 13.922C3.75309 14.8248 4.31447 15.6144 5.0706 16.1801C5.82672 16.7459 6.73974 17.0595 7.68181 17.0771C6.74551 17.8171 5.67346 18.3641 4.52695 18.6868C3.38044 19.0096 2.18195 19.1018 1 18.9582C3.06325 20.2934 5.46508 21.0023 7.91817 21C16.2211 21 20.7616 14.0784 20.7616 8.07571C20.7616 7.88022 20.7562 7.68255 20.7475 7.48923C21.6313 6.84646 22.3941 6.05021 23 5.13788L22.9989 5.1368Z"
                                fill="currentColor" />
                        </svg>
                    </a>

                    <a target="_blank"
                        class="w-8 h-8 md:w-10 md:h-10 text-white flex justify-center items-center group rounded-full p-1 hover:text-social-instragram ring-1 ring-white hover:ring-2 hover:ring-social-instragram transition-all duration-300 ease-in-out"
                        href="{{ $socialLinks->instagram->link ?? 'https://www.instagram.com/' }}">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 1C14.9887 1 15.3616 1.011 16.5342 1.066C17.7057 1.121 18.5032 1.3047 19.205 1.5775C19.931 1.8569 20.5426 2.2353 21.1542 2.8458C21.7135 3.39569 22.1463 4.06085 22.4225 4.795C22.6942 5.4957 22.879 6.2943 22.934 7.4658C22.9857 8.6384 23 9.0113 23 12C23 14.9887 22.989 15.3616 22.934 16.5342C22.879 17.7057 22.6942 18.5032 22.4225 19.205C22.1471 19.9396 21.7142 20.6049 21.1542 21.1542C20.6042 21.7134 19.939 22.1461 19.205 22.4225C18.5043 22.6942 17.7057 22.879 16.5342 22.934C15.3616 22.9857 14.9887 23 12 23C9.0113 23 8.6384 22.989 7.4658 22.934C6.2943 22.879 5.4968 22.6942 4.795 22.4225C4.06056 22.1469 3.39528 21.714 2.8458 21.1542C2.28635 20.6044 1.85352 19.9392 1.5775 19.205C1.3047 18.5043 1.121 17.7057 1.066 16.5342C1.0143 15.3616 1 14.9887 1 12C1 9.0113 1.011 8.6384 1.066 7.4658C1.121 6.2932 1.3047 5.4968 1.5775 4.795C1.85276 4.0604 2.28568 3.39505 2.8458 2.8458C3.39544 2.28615 4.06067 1.8533 4.795 1.5775C5.4968 1.3047 6.2932 1.121 7.4658 1.066C8.6384 1.0143 9.0113 1 12 1ZM12 6.5C10.5413 6.5 9.14236 7.07946 8.11091 8.11091C7.07946 9.14236 6.5 10.5413 6.5 12C6.5 13.4587 7.07946 14.8576 8.11091 15.8891C9.14236 16.9205 10.5413 17.5 12 17.5C13.4587 17.5 14.8576 16.9205 15.8891 15.8891C16.9205 14.8576 17.5 13.4587 17.5 12C17.5 10.5413 16.9205 9.14236 15.8891 8.11091C14.8576 7.07946 13.4587 6.5 12 6.5V6.5ZM19.15 6.225C19.15 5.86033 19.0051 5.51059 18.7473 5.25273C18.4894 4.99487 18.1397 4.85 17.775 4.85C17.4103 4.85 17.0606 4.99487 16.8027 5.25273C16.5449 5.51059 16.4 5.86033 16.4 6.225C16.4 6.58967 16.5449 6.93941 16.8027 7.19727C17.0606 7.45513 17.4103 7.6 17.775 7.6C18.1397 7.6 18.4894 7.45513 18.7473 7.19727C19.0051 6.93941 19.15 6.58967 19.15 6.225ZM12 8.7C12.8752 8.7 13.7146 9.04768 14.3335 9.66655C14.9523 10.2854 15.3 11.1248 15.3 12C15.3 12.8752 14.9523 13.7146 14.3335 14.3335C13.7146 14.9523 12.8752 15.3 12 15.3C11.1248 15.3 10.2854 14.9523 9.66655 14.3335C9.04768 13.7146 8.7 12.8752 8.7 12C8.7 11.1248 9.04768 10.2854 9.66655 9.66655C10.2854 9.04768 11.1248 8.7 12 8.7V8.7Z"
                                fill="currentColor" />
                        </svg>
                    </a>

                    <a target="_blank"
                        class="w-8 h-8 md:w-10 md:h-10 text-white flex justify-center items-center group rounded-full p-1 hover:text-social-youtube ring-1 ring-white hover:ring-2 hover:ring-social-youtube transition-all duration-300 ease-in-out"
                        href="{{ $socialLinks->youtube->link ?? 'https://www.youtube.com/' }}">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22.4973 5.81025C23 7.815 23 12 23 12C23 12 23 16.185 22.4973 18.1898C22.2179 19.2979 21.4006 20.1698 20.3655 20.4645C18.4856 21 12 21 12 21C12 21 5.5177 21 3.6345 20.4645C2.595 20.1653 1.7788 19.2945 1.5027 18.1898C1 16.185 1 12 1 12C1 12 1 7.815 1.5027 5.81025C1.7821 4.70213 2.5994 3.83025 3.6345 3.5355C5.5177 3 12 3 12 3C12 3 18.4856 3 20.3655 3.5355C21.405 3.83475 22.2212 4.7055 22.4973 5.81025V5.81025ZM9.8 15.9375L16.4 12L9.8 8.0625V15.9375Z"
                                fill="currentColor" />
                        </svg>
                    </a>
                </div>
            </div>

            <!--  {/* Inportens Link */} -->
            <!-- <div class="text-white xl:flex flex-col items-center lg:px-4 2xl:px-6">
                <h2 class="text-xl font-bold mb-8">{{ localize('company') }}</h2>

                <ul class="space-y-2">
                    @if ($footerMenus->isNotEmpty())
                    @foreach ($footerMenus as $footerMenu)
                    @php
                    if ($footerMenu->content_type == 'links') {
                    $link = $footerMenu->link_url;
                    } elseif ($footerMenu->content_type == 'pages') {
                    $link = __url($footerMenu->slug);
                    } else {
                    $link = __url($footerMenu->slug);
                    }
                    @endphp

                    <li class="nav_link">
                        <a href="{{ $link }}">{{ $footerMenu->menu_level }}</a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div> -->
<!-- right aligned content -->
            <div class="text-white space-y-8 lg:pl-4 2xl:pl-6">
                <div>
                    <h2 class="text-xl font-bold mb-8 capitalize">About Us</h2>
                </div>
                <ul class="space-y-4">
                    <!-- প্রকাশক -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 640 640" stroke="currentColor">
                                <path d="M320 312C253.7 312 200 258.3 200 192C200 125.7 253.7 72 320 72C386.3 72 440 125.7 440 192C440 258.3 386.3 312 320 312zM289.5 368L350.5 368C360.2 368 368 375.8 368 385.5C368 389.7 366.5 393.7 363.8 396.9L336.4 428.9L367.4 544L368 544L402.6 405.5C404.8 396.8 413.7 391.5 422.1 394.7C484 418.3 528 478.3 528 548.5C528 563.6 515.7 575.9 500.6 575.9L139.4 576C124.3 576 112 563.7 112 548.6C112 478.4 156 418.4 217.9 394.8C226.3 391.6 235.2 396.9 237.4 405.6L272 544.1L272.6 544.1L303.6 429L276.2 397C273.5 393.8 272 389.8 272 385.6C272 375.9 279.8 368.1 289.5 368.1z" fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>Publisher:</strong> S M Tasdid Swad</span>
                    </li>

                    <!-- সম্পাদক -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 640 640" stroke="currentColor">
                                <path d="M320 312C253.7 312 200 258.3 200 192C200 125.7 253.7 72 320 72C386.3 72 440 125.7 440 192C440 258.3 386.3 312 320 312zM289.5 368L350.5 368C360.2 368 368 375.8 368 385.5C368 389.7 366.5 393.7 363.8 396.9L336.4 428.9L367.4 544L368 544L402.6 405.5C404.8 396.8 413.7 391.5 422.1 394.7C484 418.3 528 478.3 528 548.5C528 563.6 515.7 575.9 500.6 575.9L139.4 576C124.3 576 112 563.7 112 548.6C112 478.4 156 418.4 217.9 394.8C226.3 391.6 235.2 396.9 237.4 405.6L272 544.1L272.6 544.1L303.6 429L276.2 397C273.5 393.8 272 389.8 272 385.6C272 375.9 279.8 368.1 289.5 368.1z" fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>Editor:</strong> Lt. Col. A S M Al Imran (Retd.)</span>
                    </li>

                    <!-- যোগাযোগ -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>Contact us:</strong> House No. 01, 2nd Floor, Road No. 06, Middle Badda, Badda, Dhaka</span>
                    </li>

                    <!-- মার্কেটিং মোবাইল -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>Marketing Mobile:</strong> 01907099252</span>
                    </li>

                    <!-- নিউজ রুম মোবাইল -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>News Room Mobile:</strong> 01907099252</span>
                    </li>

                    <!-- নিউজ রুম ইমেইল -->
                    <li class="flex gap-3 items-center">
                        <div>
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"
                                    fill="#d3d3d3" />
                            </svg>
                        </div>
                        <span><strong>News Room Email:</strong> news.khobor71@gmail.com</span>
                    </li>
                </ul>
            </div>

            
        </section>

        <section class="md:flex items-center justify-between pt-4 text-sm text-white">
            <p class="">{{ app_setting()->copy_right ?? '' }}</p>
            <ul class="flex items-center gap-4 capitalize mt-4 md:mt-0">
                @if ($footerPages->isNotEmpty())
                @foreach ($footerPages as $footerPage)
                @php
                if ($footerPage->content_type == 'links') {
                $link = $footerPage->link_url;
                } elseif ($footerPage->content_type == 'pages') {
                $link = __url($footerPage->slug);
                } else {
                $link = __url($footerPage->slug);
                }
                @endphp

                <li>
                    <a class="nav_link" href="{{ $link }}">{{ $footerPage->menu_level }}</a>
                </li>
                @endforeach
                @endif
            </ul>
        </section>
    </div>
</footer>