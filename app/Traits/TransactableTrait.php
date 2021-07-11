<?php


namespace App\Traits;


use App\Models\Transaction;

trait TransactableTrait
{

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactable');
    }

    public static function bootTransactableTrait()
    {
        if (!property_exists(self::class, 'transactionDirection')) {
            throw new \Exception('Please define "$transactionDirection" in your model');
        }
        if (!property_exists(self::class, 'transactionAmount')) {
            throw new \Exception('Please define "$transactionAmount" in your model');
        }

        static::created(function ($model) {
            $model->transaction()->create([
                'direction' => $model->transactionDirection,
                'amount' => $model[$model->transactionAmount],
                'notes' => $model->notes ?? "",
            ]);
        });
    }
}
