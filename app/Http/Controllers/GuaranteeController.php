<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuaranteeRequest;
use App\Services\GuaranteeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use App\Branch;

class GuaranteeController extends Controller
{
    protected $guaranteeService;

    public function __construct(GuaranteeService $guaranteeService)
    {
        $this->guaranteeService = $guaranteeService;
    }

    public function index()
    {
        $datas = $this->guaranteeService->getAllForeign();


        return response()->json($datas, 200);
    }

    public function show($id)
    {
        $dataGuarantee = $this->guaranteeService->getByIdForeign($id);


        return response()->json($dataGuarantee, 200);
    }

    public function store(GuaranteeRequest $request)
    {
        $dataGuarantee = $this->guaranteeService->create($request->all());

        return response()->json($dataGuarantee['guarantee'], $dataGuarantee['statusCode']);
    }

    public function update(GuaranteeRequest $request, $id)
    {
        $dataGuarantee = $this->guaranteeService->update($request->all(), $id);

        return response()->json($dataGuarantee['guarantee'], $dataGuarantee['statusCode']);
    }

    public function destroy($id)
    {
        $dataGuarantee = $this->guaranteeService->destroy($id);

        return response()->json($dataGuarantee['message'], $dataGuarantee['statusCode']);
    }
    public function trash()
    {
        $datas = $this->guaranteeService->getTrash();
        foreach($datas as $data){
            $data->product->name;
            $data->customer->name;
            $data->branch->name;
            $data->staff->name;
        }
        return response()->json($datas, 200);
    }
    public function restore($id){

        $guarantee = $this->guaranteeService->restore($id);
        return response()->json($guarantee,200);
    }

    public function delete($id){

        $guarantee =  $this->guaranteeService->delete($id);
        return response()->json($guarantee,200);
    }
}
