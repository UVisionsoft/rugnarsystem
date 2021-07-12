<?php

namespace App\Models;

use App\Traits\MoneyTrait;
use App\Traits\TransactableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory, MoneyTrait, TransactableTrait;

    protected $fillable = ['from','to','user_id','amount','notes'];

    protected $moneyAttribute = 'amount';
    protected $transactionDirection = -1;
    protected $transactionAmount = 'amount';


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
