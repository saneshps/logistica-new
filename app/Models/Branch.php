<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'display_loc_en',
        'display_loc_ar',
        'short_code',
        'country_id',
        'zipcode',
        'image_url',
        'domain_url',
        'status'
    ];

    public function country()
    {

        return $this->hasOne(Country::class, 'id', 'country_id');
    }


    public function page_branch()
    {

        return $this->hasone(PageBranch::class, 'branch_id', 'id');
    }

    public function branch_offices()
    {

        return $this->hasMany(BranchOffice::class, 'branch_id', 'id');
    }

    public function default_value()
    {
        return $this->hasOne(BranchOffice::class, 'branch_id', 'id')->where('default', '=', '1');
        //return $this->branch_offices()
    }
}
