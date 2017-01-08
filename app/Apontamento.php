<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apontamento extends Model {

    public $fillable = [
		'hora_inicio',
		'hora_fim',
		'comentario',
		'user_id',
		'task_id'
	];

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function task() {
		return $this->belongsTo(Task::class);
	}
}
