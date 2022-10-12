<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tunggakan extends Model
{
    protected $guarded = [];

    public function pajak()
    {
        return $this->belongsTo(Pajak::class);
    }

    public function pedagang()
    {
        return $this->belongsTo(Pedagang::class);
        return $this->hasMany(Pedagang::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }

}
