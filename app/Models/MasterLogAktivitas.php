<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MasterLogAktivitas extends Model
{
    //

    protected $table = 'master_log_aktivitas';

    protected $fillable = [
        'user_id',
        'aktivitas',
        'model',
        'model_id',
        'data_lama',
        'data_baru',
        'ip_address',
        'user_agent',
        'url',
    ];

    protected $casts = [
        'data_lama' => 'array',
        'data_baru' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
