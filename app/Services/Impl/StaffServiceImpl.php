<?php

namespace App\Services\Impl;

use App\Repositories\StaffRepository;
use App\Services\StaffService;

class StaffServiceImpl implements StaffService
{
    protected $staffRepository;


    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function getAll()
    {
        $staffs = $this->staffRepository->getAll();

        return $staffs;
    }

    public function findById($id)
    {
        $staff = $this->staffRepository->findById($id);

        $statusCode = 200;
        if (!$staff)
            $statusCode = 404;

            $data = [
                'statusCode' => $statusCode,
                'staffs' => $staff
            ];

        return $data;
    }

    public function create($request)
    {
        $staff = $this->staffRepository->create($request);
        // dd($staff);
        $statusCode = 201;
        if (!$staff)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'staffs' => $staff
        ];
        return $data;
    }

    public function update($request, $id)
    {
        $oldStaff = $this->staffRepository->findById($id);
        if (!$oldStaff) {
            $newStaff = null;
            $statusCode = 404;
        } else {
            $newStaff = $this->staffRepository->update($request, $oldStaff);

            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'staffs' => $newStaff
        ];
        return $data;
    }

    public function destroy($id)
    {
        $staff = $this->staffRepository->findById($id);

        $statusCode = 404;
        $message = "Staff not found";
        if ($staff) {
            $this->staffRepository->destroy($staff);
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
        $staffs = $this->staffRepository->getTrash();

        return $staffs;
    }

    public function findTrashById($id)
    {
        $staff = $this->staffRepository->findTrashById($id);
        $status = 200;

        if (!$staff)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $staff
        ];

        return $data;
    }

    public function restore($id){
        $staff = $this->staffRepository->findTrashById($id);
        $statusCode = 404;
        $message = "Staff not found";
        if ($staff) {
            $this->staffRepository->restore($staff);
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
        $staff = $this->staffRepository->findTrashById($id);
        $statusCode = 404;
        $message = "staff not found";
        if ($staff) {
            $this->staffRepository->delete($staff);
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
