<?php

use Illuminate\Support\Facades\Route;

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}

function set_show($uri, $output = 'show')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    }
}

function badge($status){
    if(strtolower($status) == 'lunas' || strtolower($status) == 'selesai' || strtolower($status) == 'dikirim'){
        return '<span class="badge badge-success">'.strtoupper($status).'</span>';
    }
    else if(strtolower($status) == 'belum lunas'  || strtolower($status) == 'belum'){
        return '<span class="badge badge-danger">'.strtoupper($status).'</span>';
    }
    else if(strtolower($status) == 'proses' || strtolower($status) == 'sebagian' || strtolower($status) == 'pending' || strtolower($status) == 'sedang'){
        return '<span class="badge badge-warning">'.strtoupper($status).'</span>';
    }
    else if(strtolower($status) == 'belum'  || strtolower($status) == 'penting'){
        return '<span class="badge badge-danger">'.strtoupper($status).'</span>';
    }
    else if(strtolower($status) == 'Baru'){
        return '<span class="badge badge-primary">'.strtoupper($status).'</span>';
    }

}

function badges($keterangan){
    if(strtolower($keterangan) == 'terlaksana' || strtolower($keterangan) == 'terlaksana' || strtolower($keterangan) == 'Terikirm'){
        return '<span class="badge badge-success">'.strtoupper($keterangan).'</span>';
    }
    else if(strtolower($keterangan) == 'belum terlaksana'  || strtolower($keterangan) == 'Belum Terkirim'){
        return '<span class="badge badge-danger">'.strtoupper($keterangan).'</span>';
    }
    else if(strtolower($keterangan) == 'proses' || strtolower($keterangan) == 'sebagian' || strtolower($keterangan) == 'pending' || strtolower($keterangan) == 'sedang'){
        return '<span class="badge badge-warning">'.strtoupper($keterangan).'</span>';
    }
    else if(strtolower($keterangan) == 'belum'  || strtolower($keterangan) == 'penting'){
        return '<span class="badge badge-danger">'.strtoupper($keterangan).'</span>';
    }
    else if(strtolower($keterangan) == 'normal'){
        return '<span class="badge badge-primary">'.strtoupper($keterangan).'</span>';
    }

}

function badget($keterangan){
    if(strtolower($keterangan) == 'Terkirim' || strtolower($keterangan) == 'terkirim'){
        return '<span class="badge badge-success">'.strtoupper($keterangan).'</span>';
    }
    else if(strtolower($keterangan) == 'Belum Terikirim'  || strtolower($keterangan) == 'belum terkirim'){
        return '<span class="badge badge-danger">'.strtoupper($keterangan).'</span>';
    }
    else if(strtolower($keterangan) == 'proses' || strtolower($keterangan) == 'sebagian' || strtolower($keterangan) == 'pending' || strtolower($keterangan) == 'sedang'){
        return '<span class="badge badge-warning">'.strtoupper($keterangan).'</span>';
    }
    else if(strtolower($keterangan) == 'belum'  || strtolower($keterangan) == 'penting'){
        return '<span class="badge badge-danger">'.strtoupper($keterangan).'</span>';
    }
    else if(strtolower($keterangan) == 'normal'){
        return '<span class="badge badge-primary">'.strtoupper($keterangan).'</span>';
    }

}

function currency($number)
{
    return str_replace(',', '.', number_format($number));
}

function rowColor($status)
{
    $status = strtolower($status);
    if ( $status == "penting") {
        return 'class="table-danger"';
    }
    else if ($status == "sedang") {
        return 'class="table-warning"';
    }
    else if ($status == "normal") {
        return 'class="table-default"';
    }
}

