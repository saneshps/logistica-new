<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_id',
        'file_path',
        'title_en',
        'title_ar',
        'content_en',
        'content_ar',

   ];

}
