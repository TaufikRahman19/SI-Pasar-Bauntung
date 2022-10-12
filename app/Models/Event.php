<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';

    protected $guarded = [];

    // public function event()
    // {
    //     return $this->hasMany(event::class);
    // }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

}
