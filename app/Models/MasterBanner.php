<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;

class MasterBanner extends Model
{
    //

    protected $table = 'master_banners';

    protected $fillable = [
        'image_path',
        'title_id',
        'title_en',
        'subtitle_id',
        'subtitle_en',
        'link',
        'button_text_id',
        'button_text_en',
        'order_num',
        'is_active',
        'schedule_days',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Normalize image_path so asset() works regardless of how the path was stored.
     *
     * Cases:
     *  - "http://..."          → external URL, return as-is
     *  - "storage/..."         → file in storage symlink, return as-is
     *  - "images/..."          → file directly in public/, return as-is
     *  - "images/banners/..."  → legacy stored without storage prefix, prefix with storage/
     */
    public function getImagePathAttribute($value): string
    {
        if (!$value) {
            return 'images/placeholder-banner.jpg';
        }
        // External URL or already prefixed with storage/
        if (str_starts_with($value, 'http') || str_starts_with($value, 'storage/')) {
            return $value;
        }
        // Files seeded/uploaded directly from public/images/ directory
        if (str_starts_with($value, 'images/')) {
            return $value;
        }
        // Legacy: raw path from Storage::disk('public') without storage/ prefix
        return 'storage/' . $value;
    }
}
