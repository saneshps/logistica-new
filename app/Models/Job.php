<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'no_of_vacancies',
        'branch_office_id',
        'department_id',
        'expiry_at',
        'status'
   ];

   public function branch_office() {
      return $this->hasOne(BranchOffice::class, 'id', 'branch_office_id');
   }

 public function department() {

      return $this->hasOne(Department::class, 'id', 'department_id');

  }
  protected $dates = [
    'expiry_at',
  ];
  public function getCreatedFormatAttribute()
  {
      return $this->expiry_at->format('d-m-Y');
  }
 // protected $appends = ['created_format'];
}
