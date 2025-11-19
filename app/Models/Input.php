<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;
    protected $fillable = [
        'input',
        'template',
        'file_type',
        'status'
    ];

    public function section_input()
    {

        return $this->hasone(SectionField::class, 'input_id', 'id');
    }
}
