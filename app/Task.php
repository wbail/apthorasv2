<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    
    public $fillable = [
    	'descricao',
    	'prazo_finalizacao',
    	'status',
    	'user_id',
    	'project_id'
    ];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function project() {
		return $this->belongsTo('App\Project');
	}

	public function apontamento() {
		return $this->hasMany('App\Apontamento');
	}

}
