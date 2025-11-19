<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'same_content_for_all_branches',
        'status',
   ];
    public function page_branch() {
        //return $this->belongsToMany('Museums', 'id');
        return $this->hasMany(PageBranch::class, 'page_id', 'id');
    }


}
