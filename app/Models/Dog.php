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

    public function vaccines()
    {
        return $this->belongsToMany(Vaccine::class, 'dog_vaccines','dog_id','vaccine_id')->withPivot('status');
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'dog_activities', 'dog_id', 'activity_id')->withPivot('id','duration','created_at')->orderBy('pivot_created_at', 'DESC');
    }



//    public function
}
