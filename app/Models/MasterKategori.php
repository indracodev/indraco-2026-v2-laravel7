<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterKategori extends Model
{
    //

    protected $table = 'master_kategori';

    protected $fillable = [
        'parent_id',
        'nama_kategori',
        'slug',
        'ikon_path',
        'urutan',
        'status',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MasterKategori::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(MasterKategori::class, 'parent_id');
    }

    public function produk(): HasMany
    {
        return $this->hasMany(MasterProduk::class, 'kategori_id');
    }
}
