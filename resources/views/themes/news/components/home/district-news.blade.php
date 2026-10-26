<section class="container my-8">
    <!-- Header Section -->
    <div class="border-b-2 border-neutral-300 dark:border-neutral-700 pb-3 mb-5 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center gap-2">
            <span class="w-1.5 h-6 bg-brand-primary rounded-full inline-block"></span>
            <h2 class="text-brand-primary dark:text-neutral-100 text-xl font-bold uppercase tracking-wide">
                {{ localize('সারাদেশ') ?? 'সারাদেশ' }} / {{ localize('জেলার খবর') ?? 'জেলার খবর' }}
            </h2>
        </div>

        <!-- Filter Controls -->
        <div class="flex flex-wrap items-center gap-2.5">
            <!-- Division Selector -->
            <div class="relative min-w-[140px]">
                <label class="sr-only" for="home_division_filter">বিভাগ নির্বাচন</label>
                <select id="home_division_filter" class="w-full text-sm bg-white dark:bg-neutral-800 text-neutral-700 dark:text-neutral-200 border border-neutral-300 dark:border-neutral-600 rounded-md py-1.5 px-3 focus:outline-none focus:border-brand-primary cursor-pointer">
                    <option value="">সকল বিভাগ</option>
                    @foreach($divisions as $div)
                        <option value="{{ $div->id }}" data-url="{{ $div->url }}">{{ $div->bn_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- District Selector -->
            <div class="relative min-w-[140px]">
                <label class="sr-only" for="home_district_filter">জেলা নির্বাচন</label>
                <select id="home_district_filter" class="w-full text-sm bg-white dark:bg-neutral-800 text-neutral-700 dark:text-neutral-200 border border-neutral-300 dark:border-neutral-600 rounded-md py-1.5 px-3 focus:outline-none focus:border-brand-primary cursor-pointer">
                    <option value="">সকল জেলা</option>
                </select>
            </div>

            <!-- Search / Reset Button -->
            <button type="button" id="home_district_reset_btn" title="রিসেট" class="text-xs bg-neutral-200 dark:bg-neutral-700 text-neutral-700 dark:text-neutral-200 px-2.5 py-2 rounded-md hover:bg-neutral-300 dark:hover:bg-neutral-600 transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            </button>

            <!-- View Archive Link -->
            <a id="home_district_archive_link" href="{{ route('website.district.news', ['slug' => 'all']) }}" class="text-xs font-semibold text-red-700 dark:text-red-400 hover:underline px-2 py-1.5">
                {{ localize('view_more') }} &raquo;
            </a>
        </div>
    </div>

    <!-- News Grid Container -->
    <div class="relative">
        <div id="district-news-loading" class="hidden absolute inset-0 bg-white/70 dark:bg-neutral-900/70 z-10 flex items-center justify-center rounded-lg backdrop-blur-xs">
            <div class="inline-flex items-center gap-2 text-brand-primary font-medium text-sm">
                <svg class="animate-spin h-5 w-5 text-brand-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                সংবাদ লোড হচ্ছে...
            </div>
        </div>

        <div id="district-news-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 transition-opacity duration-200">
            @include('themes.news.components.home.district-news-items', ['districtNews' => $districtNews])
        </div>
    </div>
</section>

<script>
    (function () {
        const divisionData = @json($divisions);
        const divisionFilter = document.getElementById('home_division_filter');
        const districtFilter = document.getElementById('home_district_filter');
        const resetBtn = document.getElementById('home_district_reset_btn');
        const archiveLink = document.getElementById('home_district_archive_link');
        const newsGrid = document.getElementById('district-news-grid');
        const loadingIndicator = document.getElementById('district-news-loading');
        const filterUrl = "{{ route('website.district.filter') }}";
        const baseArchiveUrl = "{{ url('/district') }}";

        // Division Change -> Update District Options & Filter News
        divisionFilter.addEventListener('change', function () {
            const divId = this.value;
            districtFilter.innerHTML = '<option value="">সকল জেলা</option>';

            if (divId) {
                const selectedDiv = divisionData.find(d => d.id == divId);
                if (selectedDiv && selectedDiv.districts) {
                    selectedDiv.districts.forEach(dist => {
                        const opt = document.createElement('option');
                        opt.value = dist.id;
                        opt.dataset.url = dist.url;
                        opt.textContent = dist.bn_name ? `${dist.bn_name} (${dist.name})` : dist.name;
                        districtFilter.appendChild(opt);
                    });
                }
                archiveLink.href = `${baseArchiveUrl}/${selectedDiv ? selectedDiv.url : 'all'}`;
            } else {
                archiveLink.href = `${baseArchiveUrl}/all`;
            }

            fetchDistrictNews(divId, '');
        });

        // District Change -> Filter News & Update Archive Link
        districtFilter.addEventListener('change', function () {
            const divId = divisionFilter.value;
            const distId = this.value;
            const selectedOpt = this.options[this.selectedIndex];

            if (distId && selectedOpt && selectedOpt.dataset.url) {
                archiveLink.href = `${baseArchiveUrl}/${selectedOpt.dataset.url}`;
            } else if (divId) {
                const selectedDiv = divisionData.find(d => d.id == divId);
                archiveLink.href = `${baseArchiveUrl}/${selectedDiv ? selectedDiv.url : 'all'}`;
            } else {
                archiveLink.href = `${baseArchiveUrl}/all`;
            }

            fetchDistrictNews(divId, distId);
        });

        // Reset Button
        resetBtn.addEventListener('click', function () {
            divisionFilter.value = '';
            districtFilter.innerHTML = '<option value="">সকল জেলা</option>';
            archiveLink.href = `${baseArchiveUrl}/all`;
            fetchDistrictNews('', '');
        });

        // AJAX Fetch Function
        function fetchDistrictNews(divisionId, districtId) {
            loadingIndicator.classList.remove('hidden');
            newsGrid.style.opacity = '0.5';

            const params = new URLSearchParams();
            if (divisionId) params.append('division_id', divisionId);
            if (districtId) params.append('district_id', districtId);

            fetch(`${filterUrl}?${params.toString()}`)
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.html) {
                        newsGrid.innerHTML = data.html;
                    }
                })
                .catch(err => console.error('District news fetch error:', err))
                .finally(() => {
                    loadingIndicator.classList.add('hidden');
                    newsGrid.style.opacity = '1';
                });
        }
    })();
</script>
