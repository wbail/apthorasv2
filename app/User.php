<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function client() {
        return $this->hasMany(Client::class);
    }

    public function project() {
        return $this->hasMany(Project::class);
    }

    public function task() {
        return $this->hasMany(Task::class);
    }

    public function apontamento() {
        return $this->hasMany(Apontamento::class);
    }

}
