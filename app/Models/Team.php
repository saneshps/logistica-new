<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [

        'name_en',
        'name_ar',
        'designation_en',
        'designation_ar',
        'branch_office_id',
        'department_id',
        'message_en',
        'message_ar',
        'email',
        'phone',
        'priority',
        'image_url',
        'linkedin_url',
        'status'
   ];

   public function branch_office() {
      return $this->hasOne(BranchOffice::class, 'id', 'branch_office_id');
   }

   public function department() {

        return $this->hasOne(Department::class, 'id', 'department_id');
   }
}
