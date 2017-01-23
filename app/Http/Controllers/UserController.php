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
        return View::make('users.edit', ['user' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        if ($request->input('admin') != 'on') {

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->admin = 0;
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

        } else {
            
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->admin = 1;
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }
            
        
        return redirect('/admin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return $id;
    }


    public function admin() {

        $query = DB::select('select u.name as name
                                 , count(t.id) as tp
                                 , (select count(t.id)
                                      from tasks as t
                                     where t.status = 100
                                       and u.id = t.user_id) as tc
                              from users as u
                             inner join tasks as t
                                on u.id = t.user_id
                             where t.status < 100
                             group by u.id, u.name');


        $query = collect($query);

        $queryproject = DB::select('select (select c.nome_fantasia
                                              from clients as c
                                             where c.id = p.client_id) as cliente
                                 , p.titulo
                                 , case when p.fase = 0 then \'Iniciação\' 
                                        when p.fase = 1 then \'Planejamento\'
                                        when p.fase = 2 then \'Execução\'
                                        when p.fase = 3 then \'Monitoramento e Controle\'
                                        when p.fase = 4 then \'Finalização\'
                                   end as fase
                                 , p.status
                                 , p.data_entrega
                                 , count(t.id) as tp
                                 , (select count(t.id)
                                      from tasks as t
                                     where t.status = 100
                                       and p.id = t.project_id) as tc
                              from projects as p
                             inner join tasks as t
                                on p.id = t.project_id
                             where t.status < 100
                             group by p.id, p.titulo, fase, p.status, cliente, p.data_entrega');


        $queryproject = collect($queryproject);

        $users = DB::table('users as u')
            ->orderBy('u.name')
            ->get();


        return View::make('users.admin', [
            'users' => $users,
            'user' => $users,
            'query' => $query,
            'queryproject' => $queryproject,
        ]);
    }



}
