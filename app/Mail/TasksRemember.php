<?php

namespace App\Mail;

use App\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TasksRemember extends Mailable {

    use Queueable, SerializesModels;


    public $task;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Task $task) {
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {

        return $this->from('contato.gbengenhariadesoftware@gmail.com', 'GB Engenharia & Consultoria')
                ->view('emails.tasksremember')
                ->with([
                    'id' => $this->task->id,
                    'descricao' => $this->task->descricao,
                    'prazo_finalizacao' => $this->task->prazo_finalizacao
                ]);
    }
}
