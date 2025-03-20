<?php
namespace App\Repositories\Interfaces;
interface UserRepositoryInterface
{
    public function create(array $data);
    public function findById($id);
    public function findApprovedUsers();
    public function getAllNonAdminUsers();
    public function updateStatus($id, $status);
}
