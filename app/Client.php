<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {
    
	public $fillable = [
		'nome_fantasia',
		'documento',
		'telefone',
		'email',
		'user_id'
	];


	public function user() {
		return $this->belongsTo(User::class);
	}

	public function project() {
		return $this->hasMany(Project::class);
	}	


}
