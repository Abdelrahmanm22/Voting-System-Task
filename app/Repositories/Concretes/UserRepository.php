<?php

namespace App\Repositories\Concretes;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function create(array $data)
    {
        return User::create($data);
    }
    public function findById($id) {
        return User::find($id);
    }
    public function findApprovedUsers() {
        return User::where('status', 'approved')->get();
    }
}
