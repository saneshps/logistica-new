<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionType extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'status',
    ];

    public function section_feilds()
    {

        return $this->hasMany(SectionField::class, 'section_id', 'id');
    }
}
