<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogVaccines extends Model
{
    use HasFactory;

    public function vaccines(){

        return $this->belongsTo(Vaccine::class,'vaccine_id');

    }


}
