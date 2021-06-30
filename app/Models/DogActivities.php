<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogActivities extends Model
{
    use HasFactory;

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }

    public function training()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
