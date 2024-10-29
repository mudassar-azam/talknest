<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GroupCommentReply;

class GroupComment extends Model
{
    use HasFactory;
    protected $table = 'groupcomments';

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(GroupCommentReply::class, 'comment_id');
    }
}
