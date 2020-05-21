<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->getAll();
        // dd( $customers);
        return response()->json($customers, 200);
    }

    public function show($id)
    {
        $dataCustomer = $this->customerService->findById($id);

        return response()->json($dataCustomer['customers'], $dataCustomer['statusCode']);
    }

    public function edit($id)
    {
        $dataCustomer = $this->customerService->findById($id);

        return response()->json($dataCustomer, 200);
    }

    public function store(CustomerRequest $request)
    {
        $dataCustomer = $this->customerService->create($request->all());

        return response()->json($dataCustomer['customers'], $dataCustomer['statusCode']);
    }

    public function update(CustomerRequest $request, $id)
    {
        $dataCustomer = $this->customerService->update($request->all(), $id);

        return response()->json($dataCustomer['customers'], $dataCustomer['statusCode']);
    }

    public function destroy($id)
    {
        $dataCustomer = $this->customerService->destroy($id);
        return response()->json($dataCustomer['message'], $dataCustomer['statusCode']);
    }

    public function trash()
    {
        $customers = $this->customerService->getTrash();

        return response()->json($customers, 200);
    }

    public function restore($id)
    {
        $dataCustomer = $this->customerService->restore($id);
        return response()->json($dataCustomer, 200);
    }
    
    public function delete($id)
    {
        $dataCustomer = $this->customerService->delete($id);
        return response()->json($dataCustomer, 200);
    }
}
