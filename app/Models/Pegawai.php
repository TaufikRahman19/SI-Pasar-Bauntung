<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';

    protected $guarded = [];

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class);
    }
}
