<?php


namespace App\Traits;


trait MoneyTrait
{
    public static function bootMoneyTrait()
    {
        if (!property_exists(self::class, 'moneyAttribute'))
            throw new \Exception('Please define "$moneyAttribute" in your model');

        if (in_array((new self)->moneyAttribute, ['', null]))
            throw new \Exception('the "$moneyAttribute" must have a value');

        if (!in_array((new self)->moneyAttribute, (new self)->fillable))
            throw new \Exception('the "$moneyAttribute" value is not in your model $fillable');


        static::creating(function ($model) {
            if (!is_array($model->moneyAttribute)) {
                $model->moneyAttribute = [$model->moneyAttribute];
            }
            foreach ($model->moneyAttribute as $attribute) {
                $model[$attribute] = $model[$attribute] * 100;
            }
        });
        static::retrieved(function ($model) {
            if (!is_array($model->moneyAttribute)) {
                $model->moneyAttribute = [$model->moneyAttribute];
            }
            foreach ($model->moneyAttribute as $attribute) {
                $model[$attribute] = $model[$attribute] / 100;
            }
        });
    }
}
