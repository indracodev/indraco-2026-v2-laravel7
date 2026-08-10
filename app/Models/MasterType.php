<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterType extends Model
{
    //

    protected $table = 'master_type';

    protected $fillable = [
        'collection_id',
        'type_name',
        'slug',
    ];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(MasterCollection::class, 'collection_id');
    }

    public function variants(): HasMany
    {
        return $this->hasMany(MasterVariant::class, 'type_id');
    }

    public function produk(): HasMany
    {
        return $this->hasMany(MasterProduk::class, 'type_id');
    }

    public function getNamaTypeAttribute(): ?string
    {
        return $this->attributes['type_name'] ?? $this->attributes['nama_type'] ?? null;
    }
}
