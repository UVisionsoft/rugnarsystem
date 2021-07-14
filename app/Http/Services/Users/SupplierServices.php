<?php


namespace App\Http\Services\Users;


use App\Models\User;

class SupplierServices
{
    protected $supplier;

    public function user(User $user)
    {
        $this->supplier = $user;

        return $this;
    }
}
