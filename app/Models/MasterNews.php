<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;

class MasterNews extends Model
{
    //

    protected $table = 'master_news';

    protected $fillable = [
        'slug',
        'judul',
        'judul_eng',
        'tanggal',
        'tanggal_eng',
        'content',
        'content_eng',
        'image_path',
    ];

    protected static function booted()
    {
        static::creating(function ($news) {
            if (empty($news->slug) && !empty($news->judul)) {
                $news->slug = \Illuminate\Support\Str::slug($news->judul);
            }
        });

        static::updating(function ($news) {
            if (empty($news->slug) && !empty($news->judul)) {
                $news->slug = \Illuminate\Support\Str::slug($news->judul);
            }
        });
    }

    public function getLocalizedJudulAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->judul_eng)) {
            return $this->judul_eng;
        }
        return $this->judul;
    }

    public function getLocalizedContentAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->content_eng)) {
            return $this->content_eng;
        }
        return $this->content;
    }

    public function getFormattedTanggalAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->tanggal_eng)) {
            return $this->tanggal_eng;
        }
        if (!empty($this->tanggal)) {
            return $this->tanggal;
        }
        return $this->created_at ? $this->created_at->format('d M Y') : date('d M Y');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image_path && file_exists(public_path($this->image_path))) {
            return asset($this->image_path);
        }
        if ($this->image_path && (str_starts_with($this->image_path, 'http://') || str_starts_with($this->image_path, 'https://'))) {
            return $this->image_path;
        }
        return asset('images/logo-indraco-est.png');
    }
}

