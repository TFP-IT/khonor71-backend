<section
  class="border p-2 2xl:p-3 rounded-md dark:bg-neutral-900 dark:divide-neutral-700 dark:border-neutral-800 shadow-sm">


  <div
    class="divide-y divide-neutral-300 dark:divide-neutral-600 capitalize lg:col-span-3 xl:col-span-1">
    <!-- News Heading -->

    @foreach ($latestNews as $latestNewsItem)
      <div class="py-2 4xl:py-3 grid grid-cols-3 gap-3 items-center">
        <!-- Content 2/3 -->
        <div class="col-span-2">
          <a
            href="{{ __url($latestNewsItem->encode_title) }}"
            class="text-neutral-800 text-lg font-bold line-clamp-2 dark:text-neutral-50 dark:hover:text-red-300 hover:text-brand-primary transition_3">
            {{ $latestNewsItem->title }}
          </a>
          <p
            class="text-neutral-600 dark:text-neutral-400 my-1.5 text-sm line-clamp-2 xl:line-clamp-1 4xl:line-clamp-2">
            {{ clean_news_content($latestNewsItem->news) }}
          </p>
          <div class="flex items-center gap-1 text-neutral-600 dark:text-neutral-400">
            <svg class="mb-0.5" width="16" height="16" viewBox="0 0 16 16" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_146_24422)">
                <path
                  d="M7.99967 14.6663C4.31767 14.6663 1.33301 11.6817 1.33301 7.99967C1.33301 4.31767 4.31767 1.33301 7.99967 1.33301C11.6817 1.33301 14.6663 4.31767 14.6663 7.99967C14.6663 11.6817 11.6817 14.6663 7.99967 14.6663ZM7.99967 13.333C9.41416 13.333 10.7707 12.7711 11.7709 11.7709C12.7711 10.7707 13.333 9.41416 13.333 7.99967C13.333 6.58519 12.7711 5.22863 11.7709 4.22844C10.7707 3.22824 9.41416 2.66634 7.99967 2.66634C6.58519 2.66634 5.22863 3.22824 4.22844 4.22844C3.22824 5.22863 2.66634 6.58519 2.66634 7.99967C2.66634 9.41416 3.22824 10.7707 4.22844 11.7709C5.22863 12.7711 6.58519 13.333 7.99967 13.333ZM8.66634 7.99967H11.333V9.33301H7.33301V4.66634H8.66634V7.99967Z"
                  fill="currentColor" />
              </g>
              <defs>
                <clipPath id="clip0_146_24422">
                  <rect width="16" height="16" fill="white" />
                </clipPath>
              </defs>
            </svg>
            <span class="text-xs">{{ news_time_ago($latestNewsItem->created_at) }}</span>
          </div>
        </div>

        <!-- Image 1/3 -->
        <div class="col-span-1">
          @php
            $newsImage = asset('/assets/default.jpg');
            if (!empty($latestNewsItem->image_base_url)) {
              $newsImage = $latestNewsItem->image_base_url;
            } elseif (!empty($latestNewsItem->image)) {
              $imagePath = str_starts_with($latestNewsItem->image, 'images/')
                ? $latestNewsItem->image
                : 'images/thumb/' . ltrim($latestNewsItem->image, '/');
              $newsImage = get_image_url('/assets/default.jpg', $imagePath);
            }
          @endphp
          <a href="{{ __url($latestNewsItem->encode_title) }}" class="block overflow-hidden rounded-md group">
            <img 
              src="{{ $newsImage }}" 
              alt="{{ $latestNewsItem->image_alt ?? $latestNewsItem->title }}"
              class="w-full h-24 object-cover group-hover:scale-105 transition_slow"
              loading="lazy"
              decoding="async">
          </a>
        </div>
      </div>
    @endforeach

  </div>
</section>
