<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;

class MasterLogKunjungan extends Model
{
    //

    protected $table = 'master_log_kunjungan';

    protected $fillable = [
        'nama_halaman',
        'url',
        'method',
        'ip_address',
        'user_agent',
        'device_type',
    ];
}
