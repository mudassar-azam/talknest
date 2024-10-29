<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'groupcomments';

    protected $fillable = ['blog_id', 'post_id', 'user_id', 'username', 'email', 'mobile', 'text'];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function replies()
    {
        return $this->hasMany(CommentReply::class, 'comment_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
