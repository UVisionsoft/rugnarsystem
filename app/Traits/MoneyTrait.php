<?php


namespace App\Traits;


trait MoneyTrait
{
    public static function bootMoneyTrait()
    {
        if(!property_exists(self::class, 'moneyAttribute')){
            throw new \Exception('Please define "$moneyAttribute" in your model');
        }
        static::creating(function ($model) {
            if(!is_array($model->moneyAttribute)){
                $model->moneyAttribute = [$model->moneyAttribute];
            }
            foreach ($model->moneyAttribute as $attribute) {
                $model[$attribute] = $model[$attribute]*100;
            }
        });
        static::retrieved(function ($model){
            if(!is_array($model->moneyAttribute)){
                $model->moneyAttribute = [$model->moneyAttribute];
            }
            foreach ($model->moneyAttribute as $attribute) {
                $model[$attribute] = $model[$attribute]/100;
            }
        });
    }
}
