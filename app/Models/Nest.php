<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nest extends Model
{
    use HasFactory;
    protected  $guarded=[];

    public function nestPeople()
    {
        return $this->hasMany(NestPeople::class, 'nest_id', 'id');
    }

    public function nestSetting()
    {
        return $this->hasOne(NestSetting::class);
    }

    public function adminUser()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }


}
