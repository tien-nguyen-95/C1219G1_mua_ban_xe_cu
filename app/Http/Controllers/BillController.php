<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Branch;
use App\Customer;
use Illuminate\Http\Request;
use App\Services\BillService;
use App\Http\Requests\BillRequest;
use App\Product;
use App\Staff;

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
        
        $dataBill['customer_name'] = (Customer::where("id", $dataBill['bills']['customer_id'])->first())->name;
        $dataBill['code_product'] = (Product::where("id", $dataBill['bills']['product_id'])->first())->code;
        $dataBill['name_product'] = (Product::where("id", $dataBill['bills']['product_id'])->first())->name;
        $dataBill['name_staff'] = (Staff::where("id", $dataBill['bills']['staff_id'])->first())->name;
        $dataBill['name_remain'] = $dataBill['bills']['payment'] - $dataBill['bills']['deposit'];
        $dataBill['name_branch'] = (Branch::where("id", $dataBill['bills']['branch_id'])->first())->name;

        return response()->json($dataBill, 200);
    }

    public function edit($id)
    {
        $dataBill = $this->billService->findById($id);
        $dataBill['name_customer'] = (Customer::where("id", $dataBill['bills']['customer_id'])->first())->name;
        $dataBill['name_product'] = (Product::where("id", $dataBill['bills']['product_id'])->first())->name;
        $dataBill['import_product'] = (Product::where("id", $dataBill['bills']['product_id'])->first())->import_price;
        $dataBill['export_product'] = (Product::where("id", $dataBill['bills']['product_id'])->first())->export_price;
        $dataBill['branch_product'] = (Product::where("id", $dataBill['bills']['product_id'])->first())->branch_id;
        $dataBill['name_staff'] = (Staff::where("id", $dataBill['bills']['staff_id'])->first())->name;
        $dataBill['name_branch'] = (Branch::where("id", $dataBill['bills']['branch_id'])->first())->name;
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
