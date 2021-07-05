<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitySession extends Model
{
    use HasFactory;

    protected $fillable = ['dog_activity_id','trainer_id', 'duration', 'status', 'created_at', 'updated_at'];

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id')->withDefault([
            'id'=> null,
            'name'=> 'مدرب راجنر',
            'email'=> 'trainer@rugnar.com',
        ]);
    }

    public function activity()
    {
        return $this->belongsTo(DogActivity::class, 'dog_activity_id');
    }
}
