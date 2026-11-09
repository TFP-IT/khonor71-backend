<div>
    {{-- Meta Information Card --}}
    <div class="card bg-light border-0 mb-3">
        <div class="card-body p-3">
            <div class="row g-2 small">
                <div class="col-md-6">
                    <div><span class="text-muted fw-semibold">{{ localize('user') }}:</span> 
                        <strong>{{ $activity->causer?->full_name ?? ($properties['attempted_email'] ?? 'System / Guest') }}</strong>
                        @if($activity->causer?->email)
                            <span class="text-muted">({{ $activity->causer->email }})</span>
                        @endif
                    </div>
                    <div class="mt-1"><span class="text-muted fw-semibold">{{ localize('action') }}:</span> 
                        <span class="badge bg-primary">{{ ucfirst($activity->event ?? $activity->description) }}</span>
                    </div>
                    <div class="mt-1"><span class="text-muted fw-semibold">{{ localize('module') }}:</span> 
                        <code>{{ $activity->log_name ?? '-' }}</code>
                    </div>
                </div>
                <div class="col-md-6">
                    <div><span class="text-muted fw-semibold">{{ localize('date_time') }}:</span> 
                        {{ \Carbon\Carbon::parse($activity->created_at)->format('d M Y, h:i:s A') }}
                    </div>
                    <div class="mt-1"><span class="text-muted fw-semibold">{{ localize('ip') }}:</span> 
                        <code>{{ $properties['ip'] ?? '-' }}</code>
                    </div>
                    @if(!empty($properties['url']))
                        <div class="mt-1 text-truncate" title="{{ $properties['url'] }}">
                            <span class="text-muted fw-semibold">URL:</span> 
                            <small class="text-muted">{{ $properties['url'] }}</small>
                        </div>
                    @endif
                </div>

                @if(!empty($properties['user_agent']))
                    <div class="col-12 mt-2 pt-2 border-top">
                        <span class="text-muted fw-semibold">User Agent:</span>
                        <code class="d-block text-muted small" style="word-break: break-all;">{{ $properties['user_agent'] }}</code>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Changes Diff Table --}}
    @if(count($diff) > 0)
        <h6 class="fw-bold mb-2">
            <i class="fas fa-exchange-alt text-warning me-1"></i> Changes (Old vs New)
        </h6>
        <div class="table-responsive">
            <table class="table table-bordered table-sm diff-table align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 25%;">Field</th>
                        <th style="width: 37.5%;" class="text-danger"><i class="fas fa-minus-circle me-1"></i> Old Value (পূর্বে)</th>
                        <th style="width: 37.5%;" class="text-success"><i class="fas fa-plus-circle me-1"></i> New Value (বর্তমানে)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diff as $item)
                        <tr>
                            <td class="fw-semibold bg-light text-break">
                                <code>{{ $item['field'] }}</code>
                            </td>
                            <td class="diff-old text-break" style="max-height: 150px; overflow-y: auto;">
                                @if(strlen($item['old']) > 300)
                                    <div style="max-height: 120px; overflow-y: auto;">{!! nl2br(e($item['old'])) !!}</div>
                                @else
                                    {!! nl2br(e($item['old'])) !!}
                                @endif
                            </td>
                            <td class="diff-new text-break" style="max-height: 150px; overflow-y: auto;">
                                @if(strlen($item['new']) > 300)
                                    <div style="max-height: 120px; overflow-y: auto;">{!! nl2br(e($item['new'])) !!}</div>
                                @else
                                    {!! nl2br(e($item['new'])) !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info py-2 small mb-0">
            <i class="fas fa-info-circle me-1"></i> No direct attribute changes recorded for this action (e.g. session event or non-field action).
            @if(!empty($properties))
                <div class="mt-2">
                    <button class="btn btn-sm btn-outline-secondary py-0" type="button" data-bs-toggle="collapse" data-bs-target="#rawProperties">
                        View Raw Properties
                    </button>
                    <div class="collapse mt-2" id="rawProperties">
                        <pre class="bg-dark text-white p-2 rounded small" style="max-height: 150px; overflow-y: auto;">{{ json_encode($properties, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
