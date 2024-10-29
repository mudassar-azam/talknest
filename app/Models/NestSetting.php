<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NestSetting extends Model
{
    use HasFactory;

    protected  $guarded=[];
    public function nest()
    {
        return $this->belongsTo(Nest::class);
    }
}
