<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = ['name','avatar','age','notes','user_id','registration_num'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
