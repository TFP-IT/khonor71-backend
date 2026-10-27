<?php

namespace Modules\News\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Modules\News\Entities\AiNewsCandidate;
use Modules\News\Services\GemmaNewsDraftService;
use Throwable;

class GenerateAiNewsCandidateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 2;
    public int $timeout = 150;

    public function __construct(public readonly int $candidateId)
    {
    }

    public function backoff(): array
    {
        return [30, 120];
    }

    public function handle(GemmaNewsDraftService $draftService): void
    {
        $candidate = AiNewsCandidate::find($this->candidateId);
        if (! $candidate || $candidate->status !== AiNewsCandidate::STATUS_PENDING) {
            return;
        }

        if ($candidate->generation_attempts >= 5) {
            $candidate->forceFill([
                'status' => AiNewsCandidate::STATUS_FAILED,
                'error_message' => 'The generation attempt limit for this candidate has been reached.',
            ])->save();
            return;
        }

        $candidate->increment('generation_attempts');
        $candidate->refresh();

        $draftService->generate($candidate);
    }

    public function failed(?Throwable $exception): void
    {
        Log::error('AI news draft generation failed.', [
            'candidate_id' => $this->candidateId,
            'error' => $exception?->getMessage(),
        ]);

        AiNewsCandidate::whereKey($this->candidateId)
            ->where('status', AiNewsCandidate::STATUS_PENDING)
            ->update([
                'status' => AiNewsCandidate::STATUS_FAILED,
                'error_message' => Str::limit($exception?->getMessage() ?? 'Draft generation failed.', 2000),
                'updated_at' => now(),
            ]);
    }
}
