<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'branch_name_en',
        'branch_name_ar',
        'address_en',
        'address_ar',
        'zipcode',
        'email',
        'phone',
        'lat',
        'long',
        'status'
   ];

   public function branch() {

    return $this->hasOne(Branch::class, 'id', 'branch_id');
}

}
