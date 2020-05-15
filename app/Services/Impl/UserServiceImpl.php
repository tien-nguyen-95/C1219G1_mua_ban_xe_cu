<?php

namespace App\Services\Impl;

use App\Repositories\UserRepository;
use App\Services\UserService;

class UserServiceImpl implements UserService
{
    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        $users = $this->userRepository->getAll();

        return $users;
    }

    public function findById($id)
    {
        $user = $this->userRepository->findById($id);

        $statusCode = 200;
        if (!$user)
            $statusCode = 404;

            $data = [
                'statusCode' => $statusCode,
                'users' => $user
            ];

        return $data;
    }

    public function create($request)
    {
        $user = $this->userRepository->create($request);
        $statusCode = 201;
        if (!$user)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'users' => $user
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldUser = $this->userRepository->findById($id);
        if (!$oldUser) {
            $newUser = null;
            $statusCode = 404;
        } else {
            $newUser = $this->userRepository->update($request, $oldUser);

            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'useres' => $newUser
        ];
        return $data;
    }

    public function destroy($id)
    {
        $user = $this->userRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($user) {
            $this->userRepository->destroy($user);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function getTrash()
    {
        $useres = $this->userRepository->getTrash();

        return $useres;
    }

    public function findTrashById($id)
    {
        $user = $this->userRepository->findTrashById($id);
        $status = 200;

        if (!$user)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $user
        ];

        return $data;
    }

    public function restore($id){
        $user = $this->userRepository->findTrashById($id);
        $statusCode = 404;
        $message = "User not found";
        if ($user) {
            $this->userRepository->restore($user);
            $statusCode = 200;
            $message = "Restore success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function delete($id){
        $user = $this->UserRepository->findTrashById($id);
        $statusCode = 404;
        $message = "User not found";
        if ($user) {
            $this->userRepository->delete($user);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
