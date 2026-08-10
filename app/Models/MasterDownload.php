<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;

class MasterDownload extends Model
{
    //

    protected $table = 'master_downloads';

    protected $fillable = [
        'judul',
        'judul_eng',
        'kategori',
        'deskripsi',
        'image_path',
        'file_path',
        'file_size',
        'order_num',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order_num' => 'integer',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image_path && file_exists(public_path($this->image_path))) {
            return asset($this->image_path);
        }
        return asset('images/icon-download.png');
    }

    public function getDownloadUrlAttribute()
    {
        if ($this->file_path && file_exists(public_path($this->file_path))) {
            return asset($this->file_path);
        }
        return '#';
    }
}
