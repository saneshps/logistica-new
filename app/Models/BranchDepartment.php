<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'branch_id',
     ];

     public function departments() {
        return $this->belongsTo('App\Models\Departments');
    }

    public function branches() {
        return $this->hasMany(Branch::class, 'branch_id', 'id');
    }
}
