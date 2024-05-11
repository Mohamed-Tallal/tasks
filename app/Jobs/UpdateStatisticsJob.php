<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Statistic;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateStatisticsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::withCount('tasks')->orderBy('tasks_count', 'desc')->take(10)->get();

        $statistics = $users->map(function ($user) {
            return [
                'user_id' => $user->id,
                'tasks_count' => $user->tasks_count,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();

        Statistic::query()->delete();
        Statistic::insert($statistics);
    }
}
