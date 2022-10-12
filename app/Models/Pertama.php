<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertama extends Model
{
    protected $guarded = [];

    public function pajak()
    {
        return $this->belongsTo(Pajak::class);
    }

    public function pedagang()
    {
        return $this->belongsTo(Pedagang::class);
    }


}
