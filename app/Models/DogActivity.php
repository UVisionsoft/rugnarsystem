<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogActivity extends Model
{
    use HasFactory;

    protected $fillable = ['dog_id','activity_id','duration'];
    protected $appends = ['remaining_hours'];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }

    public function training()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function sessions()
    {
        return $this->hasMany(ActivitySession::class);
    }

    public function getRemainingHoursAttribute()
    {
        $totalSessions = $this->sessions()->sum('duration');

        return (int)$this->duration - (int)$totalSessions ;
    }
}
