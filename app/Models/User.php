<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected  $primaryKey ='id';

    protected $keyType ='string';

    public $incrementing =false;

    protected $fillable = [
        'name',
        'id'
    ];

    public function posts(){
        return this->hasMany('App\Models\Post');
    }

    public function likes(){
        return this->hasMany('App\Models\Like');
    }
}