<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogHospitality extends Model
{
    use HasFactory;

    protected $fillable = ['dog_id','from','to'];

    protected $dates = ['from', 'to'];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }

}
