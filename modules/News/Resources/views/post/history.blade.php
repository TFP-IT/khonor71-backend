<div class="p-2">
    @if(isset($activities) && $activities->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 16%;">তারিখ ও সময়</th>
                        <th style="width: 20%;">ব্যবহারকারী (User)</th>
                        <th style="width: 14%;">অ্যাকশন</th>
                        <th style="width: 38%;">পরিবর্তিত ফিল্ডসমূহ (Old vs New)</th>
                        <th style="width: 12%;">আইপি / ডিভাইস</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $act)
                        @php
                            $props = $act->properties ? $act->properties->toArray() : [];
                            $attrs = $props['attributes'] ?? [];
                            $old   = $props['old'] ?? [];
                            $allKeys = array_unique(array_merge(array_keys($attrs), array_keys($old)));
                            $causer = $act->causer;
                            $roles = $causer && method_exists($causer, 'getRoleNames') ? $causer->getRoleNames()->implode(', ') : '';
                            $event = strtolower($act->event ?? $act->description ?? 'action');
                        @endphp
                        <tr>
                            <td>
                                <div class="fw-semibold">{{ \Carbon\Carbon::parse($act->created_at)->format('d M Y, h:i A') }}</div>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($act->created_at)->diffForHumans() }}</small>
                            </td>
                            <td>
                                @if($causer)
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="fw-semibold">
                                                {{ $causer->full_name ?? $causer->user_name }}
                                                @if($roles)
                                                    <span class="badge bg-secondary rounded-pill ms-1" style="font-size: 10px;">{{ $roles }}</span>
                                                @endif
                                            </div>
                                            <small class="text-muted">{{ $causer->email }}</small>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted"><i class="fas fa-robot me-1"></i>System</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $badgeClass = match ($event) {
                                        'created' => 'bg-success',
                                        'updated' => 'bg-warning text-dark',
                                        'deleted' => 'bg-danger',
                                        default => 'bg-primary',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }} rounded-pill px-2 py-1">
                                    {{ ucfirst($event) }}
                                </span>
                            </td>
                            <td>
                                @if(count($allKeys) > 0)
                                    <div class="table-responsive" style="max-height: 200px; overflow-y: auto;">
                                        <table class="table table-sm table-bordered mb-0" style="font-size: 12px;">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Field</th>
                                                    <th class="text-danger">পূর্বের মান (Old)</th>
                                                    <th class="text-success">নতুন মান (New)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($allKeys as $k)
                                                    @php
                                                        $oldV = $old[$k] ?? null;
                                                        $newV = $attrs[$k] ?? null;
                                                        $strOld = is_array($oldV) ? json_encode($oldV, JSON_UNESCAPED_UNICODE) : (string)($oldV ?? '-');
                                                        $strNew = is_array($newV) ? json_encode($newV, JSON_UNESCAPED_UNICODE) : (string)($newV ?? '-');
                                                    @endphp
                                                    <tr>
                                                        <td class="fw-semibold"><code>{{ $k }}</code></td>
                                                        <td class="text-danger bg-light" style="max-width: 200px; word-break: break-all;">
                                                            {{ mb_strimwidth($strOld, 0, 150, '...') }}
                                                        </td>
                                                        <td class="text-success bg-light" style="max-width: 200px; word-break: break-all;">
                                                            {{ mb_strimwidth($strNew, 0, 150, '...') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <span class="text-muted small">
                                        {{ $act->description ?? 'No direct field changes recorded.' }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div><code>{{ $props['ip'] ?? '-' }}</code></div>
                                @if(!empty($props['user_agent']))
                                    <small class="text-muted d-block text-truncate" style="max-width: 120px;" title="{{ $props['user_agent'] }}">
                                        {{ mb_strimwidth($props['user_agent'], 0, 25, '...') }}
                                    </small>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-history fa-3x text-muted mb-3 d-block"></i>
            <h6 class="text-muted">এই খবরের জন্য এখনও কোনো পরিবর্তন ইতিহাস রেকর্ড হয়নি।</h6>
            <small class="text-muted">ভবিষ্যতে এই খবরের কোনো ফিল্ড (শিরোনাম, এসইও, স্ট্যাটাস, ক্যাটাগরি ইত্যাদি) পরিবর্তন করা হলে তা স্বয়ংক্রিয়ভাবে এখানে সংরক্ষিত হবে।</small>
        </div>
    @endif
</div>
