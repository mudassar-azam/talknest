<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onesection extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'heading',
        'description',
        'image'
    ];
}
