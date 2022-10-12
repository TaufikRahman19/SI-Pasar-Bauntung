<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{

    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','pedagang_id','name','username', 'email', 'password', 'level',
    ];


    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function pedagang()
    {
        return $this->belongsTo(Pedagang::class);
    }
    // protected $fillable = [
    //     // 'name', 'phone'
    // ];

    // public function histories()
    // {
    //     return $this->hasMany(Shipping::class);
    // }
}
