<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterMerek extends Model
{
    //

    protected $table = 'master_merek';

    protected $fillable = [
        'nama_merek',
        'slug',
        'logo_path',
        'deskripsi',
        'deskripsi_eng',
        'status',
    ];

    public function collections(): HasMany
    {
        return $this->hasMany(MasterCollection::class, 'merek_id');
    }

    public function produk(): HasMany
    {
        return $this->hasMany(MasterProduk::class, 'merek_id');
    }
}
