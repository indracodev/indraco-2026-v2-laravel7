<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterVariant extends Model
{
    //

    protected $table = 'master_variant';

    protected $fillable = [
        'type_id',
        'variant_name',
        'slug',
        'description',
        'taste',
        'acidity',
        'body',
        'roast',
        'ingredient',
        'map_image',
        'map_opacity',
        'icon_path',
        'bg_color',
        'text_color',
        'status',
        'sort_order',
        'map_size',
        'map_top',
        'map_right',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(MasterType::class, 'type_id');
    }

    public function produk(): HasMany
    {
        return $this->hasMany(MasterProduk::class, 'variant_id');
    }

    public function getNamaVariantAttribute(): ?string
    {
        return $this->attributes['variant_name'] ?? $this->attributes['nama_variant'] ?? null;
    }
}
