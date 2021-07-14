<?php

namespace App\Models;

use App\Traits\MoneyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory, MoneyTrait;

    protected $fillable = ['type', 'user_id', 'discount', 'tax', 'total_amount'];
    protected $moneyAttribute = ['discount', 'tax', 'total_amount'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

}
