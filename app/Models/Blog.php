<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_en',
        'title_ar',
        'short_code_en',
        'short_code_ar',
        'description_en',
        'description_ar',
        'image_url',
        'image_alt',
        'video_url',
        'meta_title_en',
        'meta_title_ar',
        'meta_description_en',
        'meta_description_ar',
        'keywords_en',
        'keywords_ar',
        'post_type',
        'addedby',
        'status'
   ];
}
