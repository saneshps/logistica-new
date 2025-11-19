<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id',
        'title_en',
        'title_ar',
        'content_en',
        'content_ar',
        'banner_type',
        'file_path',
        'status'
   ];

        public function page() {

            return $this->hasOne(Page::class, 'id', 'page_id');
        }

        public function bannerDetails()
        {
            return $this->hasMany(BannerDetail::class, 'banner_id', 'id');
        }

}
