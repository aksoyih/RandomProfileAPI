<?php

namespace App\Jobs;

use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class LogRequestJob implements ShouldQueue
{
    use Queueable;

    protected $logData;

    /**
     * Create a new job instance.
     */
    public function __construct(array $logData)
    {
        $this->logData = $logData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Save the log to the database
        Log::create($this->logData);
    }
}
