<?php


namespace App\Http\Services\Users;


use App\Models\User;

class CustomerServices
{
    protected $customer;

    public function user(User $user)
    {
        $this->customer = $user;

        return $this;
    }
}
