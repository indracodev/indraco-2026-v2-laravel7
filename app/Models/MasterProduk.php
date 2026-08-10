<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MasterProduk extends Model
{
    //

    protected $table = 'master_produk';

    protected $fillable = [
        'merek_id',
        'kategori_id',
        'collection_id',
        'type_id',
        'variant_id',
        'nama_produk',
        'slug',
        'sku',
        'deskripsi_singkat',
        'deskripsi_lengkap',
        'tipe_packing',
        'inner_kemasan',
        'harga_reguler',
        'gambar_utama',
        'gambar_gallery_json',
        'is_unggulan',
        'link_shopee',
        'link_web',
        'link_tokopedia',
        'link_lazada',
        'link_tiktok',
        'status',
        'is_deleted',
    ];

    protected $casts = [
        'gambar_gallery_json' => 'array',
        'harga_reguler' => 'decimal:2',
        'is_unggulan' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    public function merek(): BelongsTo
    {
        return $this->belongsTo(MasterMerek::class, 'merek_id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(MasterKategori::class, 'kategori_id');
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(MasterCollection::class, 'collection_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(MasterType::class, 'type_id');
    }

    public function variant(): BelongsTo
    {
        return $this->belongsTo(MasterVariant::class, 'variant_id');
    }
}
