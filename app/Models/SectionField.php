<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionField extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'title',
        'tag',
        'input_id',

   ];

    public function input() {

        return $this->hasone(Input::class, 'id', 'input_id');
    }
}
