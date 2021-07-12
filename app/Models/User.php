<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'cognome',
        'email',
        'password'
    ];
    protected $table="users" ;
    protected $primaryKey="id";
    protected $autoIncrement=false;
    protected $keyType="string";
    public $timestamps=false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function restaurants() {
        return $this->belongsToMany("App\Models\Restaurant");
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function likes() {
        return $this->belongsToMany('App\Models\Review');
    }
    public function reviews(){
    return $this->hasMany("App\Models\Review");
    }
    public function recipes(){
        return $this->hasMany("App\Models\Recipe");
        }
}