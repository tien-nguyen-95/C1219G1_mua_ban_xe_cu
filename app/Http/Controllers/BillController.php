<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BillService;
use App\Http\Requests\BillRequest;

class BillController extends Controller
{
    protected $billService;

    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }

    public function index()
    {
        $bills = $this->billService->getAll();
        
        return response()->json($bills, 200);
    }

    public function show($id)
    {
        $dataBill = $this->billService->findById($id);
        dd($dataBill->customer->name);
        return response()->json($dataBill['bills'], $dataBill['statusCode']);
    }

    public function edit($id)
    {
        $dataBill = $this->billService->findById($id);
        // dd($dataBill);
        return response()->json($dataBill, 200);
    }

    public function store(BillRequest $request)
    {
        
        $dataBill = $this->billService->create($request->all());
       
        return response()->json($dataBill['bills'], $dataBill['statusCode']);
    }

    public function update(BillRequest $request, $id)
    {
        $dataBill = $this->billService->update($request->all(), $id);

        return response()->json($dataBill['bills'], $dataBill['statusCode']);
    }

    public function destroy($id)
    {
        $dataBill = $this->billService->destroy($id);
        return response()->json($dataBill['message'], $dataBill['statusCode']);
    }

    public function trash()
    {
        $bills = $this->billService->getTrash();

        return response()->json($bills, 200);
    }

    public function restore($id)
    {
        $dataBill = $this->billService->restore($id);
        return response()->json($dataBill, 200);
    }
    
    public function delete($id)
    {
        $dataBill = $this->billService->delete($id);
        return response()->json($dataBill, 200);
    }
}
