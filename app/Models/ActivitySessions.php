<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitySessions extends Model
{
    use HasFactory;

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function activity()
    {
        return $this->belongsTo(DogActivities::class, 'dog_activity_id');
    }
}
