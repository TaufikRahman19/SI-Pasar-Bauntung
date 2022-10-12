<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{

    protected $table = 'kegiatans';

    protected $guarded = [];

    // public function kegiatan()
    // {
    //     return $this->hasMany(Kegiatan::class);
    // }

    public function event()
    {
        return $this->hasMany(Pedagang::class);
    }

}
