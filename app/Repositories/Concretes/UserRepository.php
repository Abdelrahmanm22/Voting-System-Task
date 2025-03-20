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
    public function getAllNonAdminUsers()
    {
        return User::where('role', '!=', 'admin')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function updateStatus($id, $status)
    {
        $user = User::findOrFail($id);
        $user->status = $status;
        return $user->save();
    }
}
