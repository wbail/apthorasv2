<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApontamentoRequest;
use DB;
use App\Apontamento;
use App\Project;
use App\User;
use View;
use Auth;
use Response;
use App\Task;
use Carbon\Carbon;

class ApontamentoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
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
    public function store(ApontamentoRequest $request) {
        
        $apontamento = new Apontamento();
        $apontamento->hora_inicio = $request->input('hora_inicio');
        $apontamento->hora_fim = Carbon::now();
        $apontamento->comentario = $request->input('comentario');
        $apontamento->task()->associate($request->input('task'));
        $apontamento->user()->associate(Auth::user()->id);
        $apontamento->save();

        DB::table('tasks')
            ->where('id', $request->input('task'))
            ->update(['status' => $request->input('status')]);

        return redirect()->route('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $comm = DB::table('apontamentos as a')
                ->select('a.*', 'u.name')
                ->join('users as u', 'u.id', '=', 'a.user_id')
                ->where('task_id', '=', $id)
                ->orderBy('a.created_at')
                ->get();

        return Response::json($comm);

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
    public function update(ApontamentoRequest $request, $id) {
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
