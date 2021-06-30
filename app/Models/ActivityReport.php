<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityReport extends Model
{
    use HasFactory;
    protected $table = 'activity_reports';

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function activity()
    {
        return $this->belongsTo(DogActivity::class, 'dog_activity_id');
    }
}
