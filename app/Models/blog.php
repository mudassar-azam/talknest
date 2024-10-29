<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

        public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
