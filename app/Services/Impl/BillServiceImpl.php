<?php
namespace App\Services\Impl;

use App\Repositories\BillRepository;
use App\Services\BillService;

class BillServiceImpl implements BillService
{
    protected $billRepository;

    public function __construct(BillRepository $billRepository)
    {
        $this->billRepository = $billRepository;
    }

    public function getAll()
    {
        $bills = $this->billRepository->getAll();

        return $bills;
    }

    public function findById($id)
    {
        $bill = $this->billRepository->findById($id);

        $statusCode = 200;
        if (!$bill)
            $statusCode = 404;

            $data = [
                'statusCode' => $statusCode,
                'bills' => $bill
            ];

        return $data;
    }

    public function create($request)
    {
        $bill = $this->billRepository->create($request);

        $statusCode = 201;
        if (!$bill)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'bills' => $bill
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldBill = $this->billRepository->findById($id);
        // dd($oldBill);
        if (!$oldBill) {
            $newBill = null;
            $statusCode = 404;
        } else {
            $newBill = $this->billRepository->update($request, $oldBill);
            $statusCode = 200;
        }

        // dd($newBill);
        $data = [
            'statusCode' => $statusCode,
            'bills' => $newBill
        ];
        return $data;
    }

    public function destroy($id)
    {
        $bill = $this->billRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($bill) {
            $this->billRepository->destroy($bill);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function getTrash(){

        $bills = $this->billRepository->getTrash();

        return $bills;
        
    }

    public function restore($id)
    {
        return $this->billRepository->restore($id);
    }

    public function delete($id){

        return $this->billRepository->delete($id);
    }

    // public function updateComplete($request, $id){
    //     $oldBill = $this->billRepository->findById($id);
    //     // dd($oldBill);
    //     if (!$oldBill) {
    //         $newBill = null;
    //         $statusCode = 404;
    //     } else {
    //         $newBill = $this->billRepository->update($request, $oldBill);
    //         $statusCode = 200;
    //     }

    //     // dd($newBill);
    //     $data = [
    //         'statusCode' => $statusCode,
    //         'bills' => $newBill
    //     ];
    //     return $data;
    // }
    
}
