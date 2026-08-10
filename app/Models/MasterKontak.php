<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;

class MasterKontak extends Model
{
    //

    protected $table = 'master_kontak';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'judul_pesan',
        'pesan',
        'tanggal_kirim',
    ];

    protected $casts = [
        'tanggal_kirim' => 'datetime',
    ];
}
