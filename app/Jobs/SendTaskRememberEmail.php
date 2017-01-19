<?php

namespace App\Jobs;

use App\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTaskRememberEmail implements ShouldQueue {

    use InteractsWithQueue, Queueable, SerializesModels;

    protected $task;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Task $task) {
        
        $this->task = $task;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        
        //

    }
}
