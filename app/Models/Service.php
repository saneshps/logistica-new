<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'slug_en',
        'slug_ar',
        'content_en',
        'content_ar',
        'subtitle_en',
        'subtitle_ar',
        'branch_id',
        'parent_id',
        'default_image',
        'image_icon',
        'same_content_for_all_branches',
        'priority',
        'status',
    ];
    public function branch()
    {
        //return $this->belongsToMany('Museums', 'id');
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }
    public function parent()
    {
        //return $this->belongsToMany('Museums', 'id');
        return $this->hasOne(self::class, 'id', 'parent_id');
    }


    public function siblings()
    {
        // Get siblings by excluding the current child
        return $this->parent->childs->where('id', '!=', $this->id);
    }

    public function childs()
    {
        //return $this->belongsToMany('Museums', 'id');
        return $this->hasMany(self::class, 'parent_id', 'id');
    }


    public function service_images()
    {
        //return $this->belongsToMany('Museums', 'id');
        return $this->hasMany(ServiceImage::class, 'service_id', 'id');
    }
}
