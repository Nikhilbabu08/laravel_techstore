<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechPosts extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'topic',
        'description',
        'image',
        'published_on',
    ];

    protected $casts = [
        'published_on' => 'datetime:M d, Y',
    ];
    
}
