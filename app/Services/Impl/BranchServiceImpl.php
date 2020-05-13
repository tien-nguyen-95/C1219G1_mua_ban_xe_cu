<?php

namespace App\Services\Impl;

use App\Repositories\BranchRepository;
use App\Services\BranchService;

class BranchServiceImpl implements BranchService
{
    protected $branchRepository;


    public function __construct(BranchRepository $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    public function getAll()
    {
        $branches = $this->branchRepository->getAll();

        return $branches;
    }

    public function findById($id)
    {
        $branch = $this->branchRepository->findById($id);

        $statusCode = 200;
        if (!$branch)
            $statusCode = 404;

            $data = [
                'statusCode' => $statusCode,
                'branches' => $branch
            ];

        return $data;
    }

    public function create($request)
    {
        $branch = $this->branchRepository->create($request);
        $statusCode = 201;
        if (!$branch)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'branches' => $branch
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldbranch = $this->branchRepository->findById($id);
        // if (!$oldbranch) {
        //     $newbranch = null;
        //     $statusCode = 404;
        // } else {
            $newbranch = $this->branchRepository->update($request, $oldbranch);

            $statusCode = 200;
        // }

        $data = [
            'statusCode' => $statusCode,
            'branches' => $newbranch
        ];
        return $data;
    }

    public function destroy($id)
    {
        $branch = $this->branchRepository->findById($id);

        $statusCode = 404;
        $message = "Branch not found";
        if ($branch) {
            $this->branchRepository->destroy($branch);
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
        $branches = $this->branchRepository->getTrash();

        return $branches;
    }

    public function findTrashById($id)
    {
        $branch = $this->branchRepository->findTrashById($id);
        $status = 200;

        if (!$branch)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $branch
        ];

        return $data;
    }

    public function restore($id){
        $branch = $this->branchRepository->findTrashById($id);
        $statusCode = 404;
        $message = "Branch not found";
        if ($branch) {
            $this->branchRepository->restore($branch);
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
        $branch = $this->branchRepository->findTrashById($id);
        $statusCode = 404;
        $message = "Branch not found";
        if ($branch) {
            $this->branchRepository->delete($branch);
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
