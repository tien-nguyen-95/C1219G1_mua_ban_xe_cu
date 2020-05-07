<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BrandService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
class BrandController extends Controller
{
    //
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = $this->brandService->getAll();

       return view('brand.dashboard',compact('brands'));
    }

    public function show($id)
    {
        $dataBrand = $this->brandService->findById($id);

        return response()->json($dataBrand['brands'],$dataBrand['statusCode']);

    }

    public function store(Request $request)
    {
        // $this->validate();
        $dataBrand = $this->brandService->create($request->all());

        return response()->json($dataBrand['brands'],$dataBrand['statusCode']);

    }

    public function update(Request $request,$id)
    {
        $dataBrand = $this->brandService->update($request->all(),$id);

        return response()->json($dataBrand['brands'],$dataBrand['statusCode']);

    }

    public function destroy($id)
    {
        $dataBrand = $this->brandService->destroy($id);

        return response()->json($dataBrand['brands'],$dataBrand['statusCode']);
    }
}
