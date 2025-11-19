<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBranch extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id',
        'branch_id',
        'slug_en',
        'slug_ar',
        'meta_title_en',
        'meta_title_ar',
        'meta_description_en',
        'meta_description_ar',
        'keywords_en',
        'keywords_ar',
        'status',
   ];
}
