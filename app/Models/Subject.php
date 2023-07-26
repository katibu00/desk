<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function userRoles()
    {
        return $this->belongsTo(UserRole::class,'user_role_id','id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
