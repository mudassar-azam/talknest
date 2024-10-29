<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupCommentReply extends Model
{
    use HasFactory;

    protected $table = 'group_comment_replies';

    public function comment()
    {
        return $this->belongsTo(GroupComment::class, 'comment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
