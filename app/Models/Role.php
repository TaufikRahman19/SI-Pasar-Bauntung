<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillabe = [
        'name',
        'redirect_to'
    ];
}
