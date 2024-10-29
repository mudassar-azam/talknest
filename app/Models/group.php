<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Groupcomment;
use App\Models\category;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'user_id', 'group_name', 'status', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function groupComments()
    {
        return $this->hasMany(GroupComment::class, 'group_id');
    }
}
