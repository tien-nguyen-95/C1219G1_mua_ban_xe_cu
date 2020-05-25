<?php
namespace App\Services\Impl;

use App\Repositories\GuaranteeRepository;
use App\Services\GuaranteeService;

class GuaranteeServiceImpl implements GuaranteeService
{
    protected $guaranteeRepository;


    public function __construct(GuaranteeRepository $guaranteeRepository)
    {
        $this->guaranteeRepository = $guaranteeRepository;
    }

    public function getAll()
    {
        $guarantees = $this->guaranteeRepository->getAll();

        return $guarantees;
    }
    public function getAllForeign()
    {
        $guarantees = $this->guaranteeRepository->getAllForeign();

        return $guarantees;
    }
    public function getByIdForeign($id)
    {
        $guarantee = $this->guaranteeRepository->getByIdForeign($id);
        return $guarantee;
    }

    public function findById($id)
    {
        $guarantee = $this->guaranteeRepository->findById($id);

        $statusCode = 200;
        if (!$guarantee)
            $statusCode = 404;

            $data = [
                'statusCode' => $statusCode,
                'guarantee' => $guarantee
            ];

        return $data;
    }

    public function create($request)
    {
        $guarantee = $this->guaranteeRepository->create($request);

        $statusCode = 201;
        if (!$guarantee)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'guarantee' => $guarantee
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldGuarantee = $this->guaranteeRepository->findById($id);

        if (!$oldGuarantee) {
            $newGuarantee = null;
            $statusCode = 404;
        } else {
            $newGuarantee = $this->guaranteeRepository->update($request, $oldGuarantee);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'guarantee' => $newGuarantee
        ];
        return $data;
    }

    public function destroy($id)
    {
        $guarantee = $this->guaranteeRepository->findById($id);

        $statusCode = 404;
        $message = "Guarantee not found";
        if ($guarantee) {
            $this->guaranteeRepository->destroy($guarantee);
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
        $guarantees = $this->guaranteeRepository->getTrash();

        return $guarantees;
    }
    public function restore($id){

        $guarantees = $this->guaranteeRepository->restore($id);

        return $guarantees;
    }

    public function delete($id){
        $guarantees = $this->guaranteeRepository->delete($id);

        return $guarantees;
    }


}
