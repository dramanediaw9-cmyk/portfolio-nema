<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'company_name',
        'testimonial_text',
        'rating',
        'client_photo',
    ];
}
