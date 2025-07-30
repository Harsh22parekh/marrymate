<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;   
use Illuminate\Notifications\Notifiable;

class register extends Authenticatable   
{
     use Notifiable;

        protected $table = 'registers';

    protected $fillable = ['name', 'email', 'password', 'role_as'];

    protected $hidden = ['password', 'remember_token'];
}
