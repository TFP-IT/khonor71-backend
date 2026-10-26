@forelse($districtNews as $news)
    <div class="group bg-white dark:bg-neutral-800 rounded-lg overflow-hidden border border-neutral-200 dark:border-neutral-700 hover:border-brand-primary hover:shadow-sm transition duration-200 flex flex-col">
        <a href="{{ __url($news->encode_title) }}" class="relative block overflow-hidden aspect-[16/9] bg-neutral-100 dark:bg-neutral-900">
            @php
                $imgUrl = asset('/assets/news-card-view.webp');
                $photoLib = $news->photoLibrary ?? null;

                if (!empty($photoLib?->thumb_image) && file_exists(public_path('storage/' . $photoLib->thumb_image))) {
                    $imgUrl = asset('storage/' . $photoLib->thumb_image);
                } elseif (!empty($photoLib?->large_image) && file_exists(public_path('storage/' . $photoLib->large_image))) {
                    $imgUrl = asset('storage/' . $photoLib->large_image);
                } elseif (!empty($news->image)) {
                    $imagePath = str_starts_with($news->image, 'images/') ? $news->image : 'images/thumb/' . $news->image;
                    if (file_exists(public_path('storage/' . $imagePath))) {
                        $imgUrl = asset('storage/' . $imagePath);
                    } elseif (!empty($photoLib?->image_base_url)) {
                        $parsedPath = parse_url($photoLib->image_base_url, PHP_URL_PATH);
                        if ($parsedPath && file_exists(public_path(ltrim($parsedPath, '/')))) {
                            $imgUrl = asset(ltrim($parsedPath, '/'));
                        } else {
                            $imgUrl = $photoLib->image_base_url;
                        }
                    }
                } elseif (!empty($photoLib?->image_base_url)) {
                    $parsedPath = parse_url($photoLib->image_base_url, PHP_URL_PATH);
                    if ($parsedPath && file_exists(public_path(ltrim($parsedPath, '/')))) {
                        $imgUrl = asset(ltrim($parsedPath, '/'));
                    } else {
                        $imgUrl = $photoLib->image_base_url;
                    }
                }
            @endphp
            <img 
                src="{{ $imgUrl }}" 
                alt="{{ $news->image_alt ?? $news->title }}" 
                onerror="this.onerror=null;this.src='{{ asset('/assets/news-card-view.webp') }}';"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                loading="lazy"
            />
            @if($news->district)
                <span class="absolute top-2 left-2 bg-brand-primary text-white text-xs font-semibold px-2 py-0.5 rounded shadow-sm">
                    {{ $news->district->bn_name }}
                </span>
            @elseif($news->division)
                <span class="absolute top-2 left-2 bg-neutral-800/80 text-white text-xs font-semibold px-2 py-0.5 rounded shadow-sm">
                    {{ $news->division->bn_name }}
                </span>
            @elseif($news->category)
                <span class="absolute top-2 left-2 bg-neutral-800/70 text-white text-xs font-semibold px-2 py-0.5 rounded shadow-sm">
                    {{ $news->category->category_name }}
                </span>
            @endif
        </a>
        <div class="p-3 flex-1 flex flex-col justify-between">
            <h3 class="font-bold text-base text-neutral-800 dark:text-neutral-100 line-clamp-2 group-hover:text-brand-primary transition duration-150 mb-2 leading-snug">
                <a href="{{ __url($news->encode_title) }}">
                    {{ $news->title }}
                </a>
            </h3>
            <div class="flex items-center text-xs text-neutral-500 dark:text-neutral-400 gap-1.5 mt-auto pt-2 border-t border-neutral-100 dark:border-neutral-700/50">
                <span class="inline-flex items-center gap-1 shrink-0 whitespace-nowrap">
                    <svg class="w-3.5 h-3.5 shrink-0 text-neutral-400 dark:text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" stroke-width="2"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5l3 3"></path>
                    </svg>
                    <span>{{ news_time_ago($news->publish_date ?? $news->created_at) }}</span>
                </span>
                @if($news->postByUser)
                    <span class="truncate" title="{{ $news->postByUser->full_name }}">| {{ $news->postByUser->full_name }}</span>
                @endif
            </div>
        </div>
    </div>
@empty
    <div class="col-span-full py-12 text-center text-neutral-500 dark:text-neutral-400 bg-neutral-50 dark:bg-neutral-800/50 rounded-lg border border-dashed border-neutral-300 dark:border-neutral-700">
        <svg class="w-12 h-12 mx-auto mb-3 text-neutral-400 dark:text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
        </svg>
        <p class="text-base font-medium">এই এলাকা সম্পর্কিত কোনো সংবাদ এই মুহূর্তে পাওয়া যায়নি।</p>
        <p class="text-xs text-neutral-400 mt-1">অন্য কোনো বিভাগ বা জেলা নির্বাচন করে পুনরায় অনুসন্ধান করুন।</p>
    </div>
@endforelse
