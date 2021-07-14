<?php

namespace App\Models;

use App\Traits\MoneyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory, MoneyTrait;

    protected $fillable = ['invoice_id', 'dog_id', 'service_id', 'amount'];
    protected $moneyAttribute = 'amount';

}
