<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {
	
	use SoftDeletes;
    
    public $fillable = [
		'titulo',
		'data_entrega',
		'user_id',
		'client_id'
	];

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function client() {
		return $this->belongsTo(Client::class);
	}

	public function task() {
		return $this->hasMany(Task::class);
	}

}
