<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Traits\AttachmentTrait;

class UserService
{
    use AttachmentTrait;
    protected $_userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->_userRepository = $userRepository;
    }
    public function registerUser($data){
        $data['photo'] = $this->saveAttachment($data['photo'], 'Uploads/Users');
        $data['password'] = bcrypt($data['password']);
        return $this->_userRepository->create($data);
    }
    //this function get all approved users exclude the authenticated user
    public function getApprovedUsers() {
        return $this->_userRepository->findApprovedUsers()->where('id', '!=', auth()->id());
    }
    public function getAllNonAdminUsers()
    {
        return $this->_userRepository->getAllNonAdminUsers();
    }

    public function updateUserStatus($id, $status)
    {
        return $this->_userRepository->updateStatus($id, $status);
    }
}
