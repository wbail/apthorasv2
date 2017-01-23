<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Project;
use DB;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $fase = [
            '0' => 'Iniciação',
            '1' => 'Planejamento',
            '2' => 'Execução',
            '3' => 'Monitoramento e Controle',
            '4' => 'Finalização'
        ];

        return view('projects.index', [
            'fase' => $fase,
            'projects' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $fase = [
            '0' => 'Iniciação',
            '1' => 'Planejamento',
            '2' => 'Execução',
            '3' => 'Monitoramento e Controle',
            '4' => 'Finalização'
        ];
        
        return view('projects.create', [
            'clients' => DB::table('clients')->pluck('nome_fantasia', 'id'),
            'fase' => $fase
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request) {
        
        $project = new Project();
        $project->titulo = $request->input('titulo');
        $project->data_entrega = date("Y-m-d H:m:s",strtotime(str_replace('/','-',$request->input('data_entrega'))));
        $project->fase = $request->input('fase');
        $project->status = $request->input('status');
        $project->client()->associate($request->input('client'));
        $project->user()->associate(Auth::user()->id);
        $project->save();

        return redirect()->route('projects');
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

        $fase = [
            '0' => 'Iniciação',
            '1' => 'Planejamento',
            '2' => 'Execução',
            '3' => 'Monitoramento e Controle',
            '4' => 'Finalização'
        ];

        return view('projects.edit', [
            'clients' => DB::table('clients')->pluck('nome_fantasia', 'id'),
            'fase' => $fase,
            'projects' => Project::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id) {
        
        $project = Project::find($id);
        $project->titulo = $request->input('titulo');
        $project->fase = $request->input('fase');
        $project->status = $request->input('status');
        $project->data_entrega = date("Y-m-d H:m:s",strtotime(str_replace('/','-',$request->input('data_entrega'))));
        $project->client()->associate($request->input('client'));

        $project->save();

        return redirect()->route('projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        Project::find($id)->delete();
    
        return redirect()->route('projects');
    
    }
}
