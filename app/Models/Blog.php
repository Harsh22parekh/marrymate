<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'image', 'category',
        'short_description', 'content', 'author_name', 'published_at'
    ];
}
