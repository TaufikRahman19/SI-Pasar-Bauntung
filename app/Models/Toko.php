<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    // protected $table = "tokos";
    // protected $primaryKey = "id";
    // protected $fillable = ['id','jenis_toko', 'deskripsi', 'foto'];
    protected $guarded = [];

    public function pedagang()
    {
        return $this->hasMany(Pedagang::class);
    }

    public function pajak()
    {
        return $this->hasMany(Pajak::class);
    }

}
