<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Setting\Http\DataTables\ActivityTrackingDataTable;
use Spatie\Activitylog\Models\Activity;

class ActivityTrackingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_activity_tracking');
    }

    /**
     * Display the Activity Tracking log listing.
     */
    public function index(ActivityTrackingDataTable $dataTable)
    {
        $users = User::select('id', 'full_name', 'email')
            ->orderBy('full_name')
            ->get();

        $events = Activity::distinct()
            ->whereNotNull('event')
            ->pluck('event')
            ->toArray();

        $logNames = Activity::distinct()
            ->whereNotNull('log_name')
            ->pluck('log_name')
            ->toArray();

        return $dataTable->render('setting::activity_tracking.index', compact('users', 'events', 'logNames'));
    }

    /**
     * Get details / diff of a specific activity log entry.
     */
    public function details(int $id): JsonResponse
    {
        $activity = Activity::with(['causer', 'subject'])->findOrFail($id);

        $properties = $activity->properties ? $activity->properties->toArray() : [];
        $attributes = $properties['attributes'] ?? [];
        $old        = $properties['old'] ?? [];

        // Build list of all changed keys
        $allKeys = array_unique(array_merge(array_keys($attributes), array_keys($old)));

        $diff = [];
        foreach ($allKeys as $key) {
            $oldVal = $old[$key] ?? null;
            $newVal = $attributes[$key] ?? null;

            // Format array or json values nicely
            $formattedOld = is_array($oldVal) ? json_encode($oldVal, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : (string) ($oldVal ?? '-');
            $formattedNew = is_array($newVal) ? json_encode($newVal, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : (string) ($newVal ?? '-');

            $diff[] = [
                'field' => $key,
                'old'   => $formattedOld,
                'new'   => $formattedNew,
            ];
        }

        $html = view('setting::activity_tracking.diff_modal', compact('activity', 'diff', 'properties'))->render();

        return response()->json([
            'status' => 'success',
            'html'   => $html,
        ]);
    }
}
