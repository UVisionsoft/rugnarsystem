<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceReturn extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_id', 'deduction'];

    public function items()
    {
        return $this->hasMany(ReturnItem::class, 'invoice_return_id');
    }
}
