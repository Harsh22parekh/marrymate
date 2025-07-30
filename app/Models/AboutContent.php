<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
     protected $fillable = [
        'main_title',
        'main_description',
        'mission_title',
        'mission_content_1',
        'mission_content_2',
        'features',
        'main_image',
        'mission_image',
        'mission_bg_image',
    ];

      protected $casts = [
        'features' => 'array',
    ];
    
}
