<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'client_type',
        'technologies',
        'image_url',
        'project_url',
        'what_i_did',
    ];

    protected $casts = [
        'technologies' => 'array',
    ];
}
