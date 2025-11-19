<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBranch extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'branch_id',
        'meta_title_en',
        'meta_title_ar',
        'meta_description_en',
        'meta_description_ar',
        'keywords_en',
        'keywords_ar',
        'status',
    ];

    public function branch()
    {
        //return $this->belongsToMany('Museums', 'id');
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }
}
