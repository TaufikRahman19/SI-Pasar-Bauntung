<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    protected $table = 'pedagangs';

    protected $guarded = [];
    // protected $fillable = [
    //     'no_register','nama', 'nik', 'jenis_dagang','toko_id', 'pembayaran_id','tunggakan_id', 'alamat','notelpon','massa_kontrak', 'pasfoto'
    // ];

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
        return $this->hasMany(Pembayaran::class);
    }

    public function tunggakan()
    {
        return $this->belongsTo(Tunggakan::class);
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

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
