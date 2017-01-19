<?php

namespace App\Console\Commands;

use DB;
use App\Task;
use Mail;
use App\Mail\TasksRemember;
use App\Http\Controllers\TaskController;
use App\Jobs\SendTaskRememberEmail;
use Illuminate\Console\Command;

class VerifyTasksToEmail extends Command {
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica se têm tasks não completas e envia lembrete por email';

    protected $task;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Task $task) {
        
        parent::__construct();
    
        $this->task = $task;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        
        $query = DB::select('select count(t.id)
                              from tasks as t
                             where t.status < 100
                               and date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 1 day), \'%d/%m/%Y\')
                                or date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 3 day), \'%d/%m/%Y\')
                                or date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 7 day), \'%d/%m/%Y\');');

        if ($query > 0) {
            $result = DB::select('select t.id
                                      from tasks as t
                                     where t.status < 100
                                       and date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 1 day), \'%d/%m/%Y\')
                                        or date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 3 day), \'%d/%m/%Y\')
                                        or date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 7 day), \'%d/%m/%Y\');');   

            for ($i = 0; $i < count($result); $i++) {
                // TaskController::remember($result[$i]->id);

                $this->task = Task::find($result[$i]->id);

                Mail::to($this->task->user->email)
                    ->send(new TasksRemember($this->task));
                sleep(10);
            }

        }
    
    }
}
