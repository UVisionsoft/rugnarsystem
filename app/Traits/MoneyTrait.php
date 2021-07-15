<?php


namespace App\Traits;


trait MoneyTrait
{
    public static function bootMoneyTrait()
    {
//        $moneyAttribute = (new self)->moneyAttribute;
//
//        if (!property_exists(self::class, 'moneyAttribute'))
//            throw new \Exception('Please define "$moneyAttribute" in your model');
//
//        if (in_array($moneyAttribute, ['', null]))
//            throw new \Exception('the "$moneyAttribute" must have a value');
//
//        if (is_array($moneyAttribute)) {
//            foreach ($moneyAttribute as $attribute)
//                if (!in_array($attribute, (new self)->fillable))
//                    throw new \Exception('the "$moneyAttribute":'.$attribute.'  value is not in your model $fillable');
//        } else {
//            if (!in_array($moneyAttribute, (new self)->fillable))
//                throw new \Exception('the "$moneyAttribute" value is not in your model $fillable');
//        }
//
//        static::creating(function ($model) {
//            if (!is_array($model->moneyAttribute)) {
//                $model->moneyAttribute = [$model->moneyAttribute];
//            }
//            foreach ($model->moneyAttribute as $attribute) {
//                $model[$attribute] = $model[$attribute] * 100;
//            }
//        });
//
//        static::retrieved(function ($model) {
//            if (!is_array($model->moneyAttribute)) {
//                $model->moneyAttribute = [$model->moneyAttribute];
//            }
//            foreach ($model->moneyAttribute as $attribute) {
//                $model[$attribute] = $model[$attribute] / 100;
//            }
//        });
    }
}
