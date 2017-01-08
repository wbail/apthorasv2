<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use DB;
use View;
use Auth;
use App\User;
use App\Task;
use Session;
use Collection;

class UserController extends Controller {
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $query = DB::select('select t.id
                                  , p.titulo
                                  , t.descricao
                                  , t.status
                                  , u.name
                                  , t.created_at
                                  , concat(HOUR(SEC_TO_TIME(sum(UNIX_TIMESTAMP(a.hora_fim) - UNIX_TIMESTAMP(a.hora_inicio)))), \' horas \'
                                  ,        MINUTE(SEC_TO_TIME(sum(UNIX_TIMESTAMP(a.hora_fim) - UNIX_TIMESTAMP(a.hora_inicio)))), \' minutos \' 
                                  ,        SECOND(SEC_TO_TIME(sum(UNIX_TIMESTAMP(a.hora_fim) - UNIX_TIMESTAMP(a.hora_inicio)))), \' segundos\') as diff
                               from apontamentos as a
                              inner join tasks as t
                                 on t.id = a.task_id
                              inner join users as u
                                 on u.id = a.user_id
                              inner join projects as p
                                 on t.project_id = p.id
                              where a.user_id = ?
                              group by t.id, t.descricao, t.status, u.name, p.titulo, t.created_at;', [Auth::user()->id]);
        
        $query = collect($query);
            
        return View::make('users.index', ['tasks'=>$query]);

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
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
