<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function() {
    return view('layouts.index');
});

Route::get('/cep', function() {
    return view('cep');
});

Route::get('my-tasks', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

//Com autentição
Route::group(['prefix'=>'tasks','where'=>['id'=>'[0-9]+']], function() {

	Route::get('', ['as'=>'tasks', 'uses'=>'TaskController@index', 'middleware' => 'auth']);
	Route::get('novo', ['as'=>'tasks.create', 'uses'=>'TaskController@create', 'middleware' => 'auth']);
	Route::post('store', ['as'=>'tasks.store', 'uses'=>'TaskController@store', 'middleware' => 'auth']);
	Route::get('edit/{id}', ['as'=>'tasks.edit', 'uses'=>'TaskController@edit', 'middleware' => 'auth']);
	Route::put('update/{id}', ['as'=>'tasks.update', 'uses'=>'TaskController@update', 'middleware' => 'auth']);
	Route::get('destroy/{id}', ['as'=>'tasks.destroy', 'uses'=>'TaskController@destroy', 'middleware' => 'auth']);
	Route::get('show/{id}', ['as'=>'tasks.show', 'uses'=>'TaskController@show', 'middleware' => 'auth']);
	Route::get('remember/{id}', ['as'=>'tasks.remember', 'uses'=>'TaskController@remember', 'middleware' => 'auth']);
	Route::get('chama', ['as'=>'tasks.chama', 'uses'=>'TaskController@chama', 'middleware' => 'auth']);

});

//Com autentição
Route::group(['prefix'=>'clients','where'=>['id'=>'[0-9]+']], function() {

	Route::get('', ['as'=>'clients', 'uses'=>'ClientController@index', 'middleware' => 'auth']);
	Route::get('novo', ['as'=>'clients.create', 'uses'=>'ClientController@create', 'middleware' => 'auth']);
	Route::post('store', ['as'=>'clients.store', 'uses'=>'ClientController@store', 'middleware' => 'auth']);
	Route::get('edit/{id}', ['as'=>'clients.edit', 'uses'=>'ClientController@edit', 'middleware' => 'auth']);
	Route::put('update/{id}', ['as'=>'clients.update', 'uses'=>'ClientController@update', 'middleware' => 'auth']);
	Route::get('destroy/{id}', ['as'=>'clients.destroy', 'uses'=>'ClientController@destroy', 'middleware' => 'auth']);
	Route::get('show/{id}', ['as'=>'clients.show', 'uses'=>'ClientController@show', 'middleware' => 'auth']);
	
});

//Com autentição
Route::group(['prefix'=>'projects','where'=>['id'=>'[0-9]+']], function() {

	Route::get('', ['as'=>'projects', 'uses'=>'ProjectController@index', 'middleware' => 'auth']);
	Route::get('novo', ['as'=>'projects.create', 'uses'=>'ProjectController@create', 'middleware' => 'auth']);
	Route::post('store', ['as'=>'projects.store', 'uses'=>'ProjectController@store', 'middleware' => 'auth']);
	Route::get('edit/{id}', ['as'=>'projects.edit', 'uses'=>'ProjectController@edit', 'middleware' => 'auth']);
	Route::put('update/{id}', ['as'=>'projects.update', 'uses'=>'ProjectController@update', 'middleware' => 'auth']);
	Route::get('destroy/{id}', ['as'=>'projects.destroy', 'uses'=>'ProjectController@destroy', 'middleware' => 'auth']);
	Route::get('show/{id}', ['as'=>'projects.show', 'uses'=>'ProjectController@show', 'middleware' => 'auth']);
	
});

//Com autentição
Route::group(['prefix'=>'apontamentos','where'=>['id'=>'[0-9]+']], function() {

	Route::get('', ['as'=>'apontamentos', 'uses'=>'ApontamentoController@index', 'middleware' => 'auth']);
	Route::get('novo', ['as'=>'apontamentos.create', 'uses'=>'ApontamentoController@create', 'middleware' => 'auth']);
	Route::post('store', ['as'=>'apontamentos.store', 'uses'=>'ApontamentoController@store', 'middleware' => 'auth']);
	Route::get('edit/{id}', ['as'=>'apontamentos.edit', 'uses'=>'ApontamentoController@edit', 'middleware' => 'auth']);
	Route::put('update/{id}', ['as'=>'apontamentos.update', 'uses'=>'ApontamentoController@update', 'middleware' => 'auth']);
	Route::get('destroy/{id}', ['as'=>'apontamentos.destroy', 'uses'=>'ApontamentoController@destroy', 'middleware' => 'auth']);
	Route::get('show/{id}', ['as'=>'apontamentos.show', 'uses'=>'ApontamentoController@show', 'middleware' => 'auth']);
	
});

// // Sem autenticação
// Route::group(['prefix'=>'tasks','where'=>['id'=>'[0-9]+']], function() {

// 	Route::get('', ['as'=>'tasks', 'uses'=>'TaskController@index']);
// 	Route::get('novo', ['as'=>'tasks.create', 'uses'=>'TaskController@create']);
// 	Route::post('store', ['as'=>'tasks.store', 'uses'=>'TaskController@store']);
// 	Route::get('edit/{id}', ['as'=>'tasks.edit', 'uses'=>'TaskController@edit']);
// 	Route::put('update/{id}', ['as'=>'tasks.update', 'uses'=>'TaskController@update']);
// 	Route::get('destroy/{id}', ['as'=>'tasks.destroy', 'uses'=>'TaskController@destroy']);
// 	Route::get('show/{id}', ['as'=>'tasks.show', 'uses'=>'TaskController@show']);

// });

// Sem autenticação
// Route::group(['prefix'=>'clients','where'=>['id'=>'[0-9]+']], function() {

// 	Route::get('', ['as'=>'clients', 'uses'=>'ClientController@index']);
// 	Route::get('novo', ['as'=>'clients.create', 'uses'=>'ClientController@create']);
// 	Route::post('store', ['as'=>'clients.store', 'uses'=>'ClientController@store']);
// 	Route::get('edit/{id}', ['as'=>'clients.edit', 'uses'=>'ClientController@edit']);
// 	Route::put('update/{id}', ['as'=>'clients.update', 'uses'=>'ClientController@update']);
// 	Route::get('destroy/{id}', ['as'=>'clients.destroy', 'uses'=>'ClientController@destroy']);

// });

// Sem autenticação
// Route::group(['prefix'=>'projects','where'=>['id'=>'[0-9]+']], function() {

// 	Route::get('', ['as'=>'projects', 'uses'=>'ProjectController@index']);
// 	Route::get('novo', ['as'=>'projects.create', 'uses'=>'ProjectController@create']);
// 	Route::post('store', ['as'=>'projects.store', 'uses'=>'ProjectController@store']);
// 	Route::get('edit/{id}', ['as'=>'projects.edit', 'uses'=>'ProjectController@edit']);
// 	Route::put('update/{id}', ['as'=>'projects.update', 'uses'=>'ProjectController@update']);
// 	Route::get('destroy/{id}', ['as'=>'projects.destroy', 'uses'=>'ProjectController@destroy']);

// });

// Sem autenticação
// Route::group(['prefix'=>'apontamentos','where'=>['id'=>'[0-9]+']], function() {

// 	Route::get('', ['as'=>'apontamentos', 'uses'=>'ApontamentoController@index']);
// 	Route::get('novo', ['as'=>'apontamentos.create', 'uses'=>'ApontamentoController@create']);
// 	Route::post('store', ['as'=>'apontamentos.store', 'uses'=>'ApontamentoController@store']);
// 	Route::get('edit/{id}', ['as'=>'apontamentos.edit', 'uses'=>'ApontamentoController@edit']);
// 	Route::put('update/{id}', ['as'=>'apontamentos.update', 'uses'=>'ApontamentoController@update']);
// 	Route::get('destroy/{id}', ['as'=>'apontamentos.destroy', 'uses'=>'ApontamentoController@destroy']);
// 	Route::get('show/{id}', ['as'=>'apontamentos.show', 'uses'=>'ApontamentoController@show']);

// });

