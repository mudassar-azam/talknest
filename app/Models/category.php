<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\group;
use App\Models\Groupcomment;




class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'image',
        'add_to_fav',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'category_id');
    }
      public function groupComments()
    {
        return $this->hasManyThrough(
            GroupComment::class, // The final model you want to access
            Group::class,        // The intermediate model
            'category_id',       // Foreign key on the intermediate model (Group)
            'group_id',          // Foreign key on the final model (GroupComment)
            'id',                // Local key on the Category model
            'id'                 // Local key on the Group model
        );
    }
}
