<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReplay extends Model
{
    use HasFactory;


    protected $fillable = ['blog_id', 'user_id', 'comment_id','replay'];

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
    

}
