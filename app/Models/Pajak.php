<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{

    protected $table = "pajaks";

    protected $guarded = [];


    public function pedagang()
    {
        return $this->belongsTo(Pedagang::class);
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function tunggakan()
    {
        return $this->hasMany(Tunggakan::class);
    }

    public function perpanjangan()
    {
        return $this->hasMany(Perpanjangan::class);
    }

    public function pertama()
    {
        return $this->hasMany(Pertama::class);
    }
    // protected $fillable = [
    //     // 'name', 'phone'
    // ];

    // public function histories()
    // {
    //     return $this->hasMany(Shipping::class);
    // }
}
