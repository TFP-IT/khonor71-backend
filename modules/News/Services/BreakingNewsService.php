<?php

namespace Modules\News\Services;

use Exception;
use App\Models\BreakingNews;
use App\Models\NewsPosition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Modules\Category\Entities\Category;
use Modules\Localize\Entities\Language;
use Modules\Setting\Entities\Application;
use App\Models\Appsetting;
use Illuminate\Http\Exceptions\HttpResponseException;
use Carbon\Carbon;

class BreakingNewsService
{
    /**
     * Form Data
     *
     * @return array
     */
    public function formData(): array
    {
        $languages = Language::all();

        return [
            'languages'     => $languages,
            'categories'    => collect(),
            'newsPositions' => collect(),
        ];
    }

    /**
     * Create
     *
     * @param  array  $attributes
     * @return BreakingNews
     * @throws Exception
     */
    public function create(array $attributes): BreakingNews
    {
        $breaking_news = $attributes['breaking_news'];
        $url           = $attributes['url'] ?? '';
        $start_time    = !empty($attributes['start_time']) ? Carbon::parse($attributes['start_time']) : null;
        $end_time      = !empty($attributes['end_time']) ? Carbon::parse($attributes['end_time']) : null;
        $priority      = isset($attributes['priority']) ? (int) $attributes['priority'] : 0;
        $status        = isset($attributes['status']) ? (int) $attributes['status'] : 1;

        try {
            DB::beginTransaction();

            $data = [
                'language_id'=> $attributes['language_id'],
                'title'      => json_encode(['news_title' => $breaking_news, 'url' => $url]),
                'url'        => $url,
                'time_stamp' => time(),
                'start_time' => $start_time,
                'end_time'   => $end_time,
                'priority'   => $priority,
                'status'     => $status,
            ];

            $breakingNews = BreakingNews::create($data);

            DB::commit();

            $this->clearCache();

            return $breakingNews;
        } catch (Exception $exception) {
            DB::rollBack();

            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => localize("breaking_news_create_error"),
                'title'   => localize("breaking_news"),
            ], 422));
        }
    }

    /**
     * Edit
     *
     * @param  array  $attributes
     * @return BreakingNews
     * @throws Exception
     */
    public function edit(array $attributes): BreakingNews
    {
        $breakingNewsId = $attributes['id'];

        $breakingNews = BreakingNews::find($breakingNewsId);

        if (!$breakingNews) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => localize("breaking_news_data_find_error"),
                'title'   => localize("breaking_news"),
            ], 422));
        }

        // Attach computed / clean attributes for form population
        $breakingNews->headline = $breakingNews->headline;
        $breakingNews->formatted_start_time = $breakingNews->start_time ? Carbon::parse($breakingNews->start_time)->format('Y-m-d\TH:i') : '';
        $breakingNews->formatted_end_time = $breakingNews->end_time ? Carbon::parse($breakingNews->end_time)->format('Y-m-d\TH:i') : '';

        return $breakingNews;
    }

    /**
     * Update
     *
     * @param  array  $attributes
     * @return bool
     * @throws Exception
     */
    public function update(array $attributes): bool
    {
        $breakingNewsId = $attributes['id'];
        $breaking_news  = $attributes['breaking_news'];
        $url            = $attributes['url'] ?? '';
        $start_time     = !empty($attributes['start_time']) ? Carbon::parse($attributes['start_time']) : null;
        $end_time       = !empty($attributes['end_time']) ? Carbon::parse($attributes['end_time']) : null;
        $priority       = isset($attributes['priority']) ? (int) $attributes['priority'] : 0;

        try {
            DB::beginTransaction();
            $data = [
                'language_id'=> $attributes['language_id'],
                'title'      => json_encode(['news_title' => $breaking_news, 'url' => $url]),
                'url'        => $url,
                'start_time' => $start_time,
                'end_time'   => $end_time,
                'priority'   => $priority,
            ];

            if (isset($attributes['status'])) {
                $data['status'] = (int) $attributes['status'];
            }

            BreakingNews::where('id', $breakingNewsId)->update($data);

            DB::commit();

            $this->clearCache();

            return true;
        } catch (Exception $exception) {
            DB::rollBack();

            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => localize("breaking_news_update_error"),
                'title'   => localize("breaking_news"),
            ], 422));
        }
    }

    /**
     * Toggle or set status (ON/OFF)
     *
     * @param array $attributes
     * @return BreakingNews
     * @throws Exception
     */
    public function toggleStatus(array $attributes): BreakingNews
    {
        $breakingNewsId = $attributes['id'];
        $breakingNews   = BreakingNews::find($breakingNewsId);

        if (!$breakingNews) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => localize("breaking_news_data_find_error"),
                'title'   => localize("breaking_news"),
            ], 422));
        }

        try {
            $newStatus = isset($attributes['status']) 
                ? (int) $attributes['status'] 
                : ($breakingNews->status == 1 ? 0 : 1);

            $breakingNews->status = $newStatus;
            $breakingNews->save();

            $this->clearCache();

            return $breakingNews;
        } catch (Exception $exception) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => localize("status_update_error"),
                'title'   => localize("breaking_news"),
            ], 422));
        }
    }

    /**
     * Delete
     *
     * @param  array  $attributes
     * @return bool
     * @throws Exception
     */
    public function destroy(array $attributes): bool
    {
        $breakingNewsId = $attributes['id'];

        try {
            DB::beginTransaction();

            BreakingNews::where('id', $breakingNewsId)->delete();

            DB::commit();

            $this->clearCache();

            return true;
        } catch (Exception $exception) {
            DB::rollBack();

            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => localize("breaking_news_delete_error"),
                'title'   => localize("breaking_news"),
            ], 422));
        }
    }

    /**
     * Toggle frontend news ticker section active/inactive status
     *
     * @param int|null $status
     * @return int
     */
    public function toggleTickerSection(?int $status = null): int
    {
        $app = Application::first();
        $appSettings = Appsetting::first();

        $currentStatus = $app ? (int) $app->newstriker_status : 1;
        $newStatus = $status !== null ? (int) $status : ($currentStatus === 1 ? 0 : 1);

        if ($app) {
            $app->newstriker_status = $newStatus;
            $app->save();
        }

        if ($appSettings) {
            $appSettings->newstriker_status = $newStatus;
            $appSettings->save();
        }

        Cache::forget('appSetting');
        $this->clearCache();

        return $newStatus;
    }

    /**
     * Clear breaking news cache for all languages and themes
     */
    public function clearCache(): void
    {
        try {
            $languages = Language::all();
            $themes = ['news', 'magazine'];

            foreach ($languages as $lang) {
                foreach ($themes as $theme) {
                    Cache::forget("breaking_news_{$lang->id}_{$theme}");
                    Cache::forget("home_page_data_{$lang->id}_{$theme}");
                }
            }
        } catch (\Throwable $e) {
            // Ignore cache clearing failure
        }
    }
}
