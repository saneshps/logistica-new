<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'content_en',
        'content_ar',
        'image_url',
        'status',
    ];

    public function branch_departments() {
        return $this->hasMany('App\Models\BranchDepartment');
    }


}
