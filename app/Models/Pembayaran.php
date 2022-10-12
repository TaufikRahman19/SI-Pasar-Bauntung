<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
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

    public function tunggakan()
    {
        return $this->hasMany(Tunggakan::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
