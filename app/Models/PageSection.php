<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PageSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id',
        'section_code',
        'section_type_id',
        'section_values',
        'priority',
        'status',
    ];

    public function section_type()
    {
        return $this->hasOne(SectionType::class, 'id', 'section_type_id');
    }
}
