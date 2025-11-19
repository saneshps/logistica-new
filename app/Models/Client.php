<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'country_id',
        'industry_id',
        'website',
        'logo_url',
        'status',
    ];

    public function country() {

        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function industry() {

        return $this->hasOne(Industry::class, 'id', 'industry_id');
    }
}
