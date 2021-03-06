<?php


namespace App\Http\Services\Payments;


use App\Models\Payment;
use App\Models\User;

class PaymentsService
{
    protected $user;

    public function user(User $user)
    {
        $this->user = $user;

        return $this;
    }

    public function createPaymentForUser($amount)
    {
        return Payment::create([
            'amount' => $amount,
            'rest' => $this->user->credit - $amount
        ]);
    }

    public function createPayments($paidAmount, $totalAmount)
    {
        $this->user->update(['credit'=> $this->user->credit + ($totalAmount * -1)]);

        if($paidAmount == $totalAmount){
            $payment = Payment::create([
                'user_id' => $this->user->id,
                'amount' => $paidAmount,
                'rest' => $this->user->credit
            ]);
        }

        else if($paidAmount > $totalAmount){
            $payment = Payment::create([
                'user_id' => $this->user->id,
                'amount' => $totalAmount,
                'rest' => $this->user->credit + $totalAmount
            ]);

            $rest = $paidAmount - $totalAmount;
            $payment = Payment::create([
                'user_id' => $this->user->id,
                'amount' => $rest,
                'rest' => $this->user->credit - $rest
            ]);
        }

        else if($paidAmount < $totalAmount){

            $rest = ($this->user->credit + ( $totalAmount - $paidAmount) ) + $paidAmount;
            $payment = Payment::create([
                'user_id' => $this->user->id,
                'amount' => $paidAmount,
                'rest' => $rest
            ]);
        }
        return $payment;
    }

}
