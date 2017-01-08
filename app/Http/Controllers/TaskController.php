<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Validator;

use DB;
use App\Task;
use App\Project;
use Response;
use View;
use Redirect;

class TaskController extends Controller {
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $tasks = Task::with('user', 'project')->get();
        
        return View::make('tasks.index', [
            'tasks'=>$tasks,
            'users'=>DB::table('users')->orderBy('name')->pluck('name', 'id'),
            'projects'=>DB::table('projects')->orderBy('titulo')->pluck('titulo', 'id')
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request) {

        $task = new Task();
        $task->descricao = $request->input('descricao');
        $task->prazo_finalizacao = date("Y-m-d H:m:s",strtotime(str_replace('/','-',$request->input('prazo_finalizacao'))));
        $task->user()->associate($request->input('user'));
        $task->project()->associate($request->input('project'));
        $task->save();

        return redirect()->route('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $tasks = Task::find($id);
        
        return Response::json($tasks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        return view('tasks.edit', [
            'tasks'=>Task::find($id), 
            'users'=>DB::table('users')->pluck('name', 'id'), 
            'projects'=>DB::table('projects')->pluck('titulo', 'id')
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        Task::find($id)->update([
            'descricao' => $request->input('descricao'),
            'prazo_finalizacao' => date("Y-m-d H:m:s",strtotime(str_replace('/','-',$request->input('prazo_finalizacao')))),
            'status' => $request->input('status'),
            'user_id' => $request->input('user'),
            'project_id' => $request->input('project'),
        ]);       

        return Redirect::to('tasks');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        Task::find($id)->delete();
        return redirect()->route('tasks');
    
    }
}
