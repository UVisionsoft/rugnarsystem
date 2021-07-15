<?php

namespace App\Models;

use App\Traits\MoneyTrait;
use App\Traits\TransactableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory, MoneyTrait, TransactableTrait;

    protected $fillable = ['amount', 'user_id', 'rest', 'notes'];
    protected $moneyAttribute = ['amount', 'rest'];
    protected $transactionAmount = 'amount';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactionDirection()
    {
        if ($this->user->type === 2) // IF customer
            return 1;

        return -1;
    }

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $userCredit = $model->user->credit;
            $newCredit = $userCredit + $model->amount;
            $model->user->update([
                'credit' => $newCredit
            ]);

            $model->update(['rest' => $newCredit]);
        });
    }

}
