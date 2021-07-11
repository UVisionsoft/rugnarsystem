<?php

namespace App\Models;

use App\Traits\MoneyTrait;
use App\Traits\TransactableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory, MoneyTrait, TransactableTrait;

    protected $fillable = ['name','amount','notes'];

    protected $moneyAttribute = 'amount';
    protected $transactionDirection = -1;
    protected $transactionAmount = 'amount';



}
