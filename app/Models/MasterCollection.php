<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterCollection extends Model
{
    //

    protected $table = 'master_collection';

    protected $fillable = [
        'merek_id',
        'collection_name',
        'slug',
        'status',
    ];

    public function merek(): BelongsTo
    {
        return $this->belongsTo(MasterMerek::class, 'merek_id');
    }

    public function types(): HasMany
    {
        return $this->hasMany(MasterType::class, 'collection_id');
    }

    public function produk(): HasMany
    {
        return $this->hasMany(MasterProduk::class, 'collection_id');
    }

    public function getNamaCollectionAttribute(): ?string
    {
        return $this->attributes['collection_name'] ?? $this->attributes['nama_collection'] ?? null;
    }
}
