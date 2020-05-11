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

    public function json()
    {
        $brands = $this->brandService->getAll();

       return response()->json($brands,200);
    }

    public function index() {
        return view('brand.dashboard');
    }
    public function show($id)
    {
        $dataBrand = $this->brandService->findById($id);

        return response()->json($dataBrand['brands'],$dataBrand['statusCode']);

    }

    public function store(Request $request)
    {
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

        return response()->json($dataBrand['statusCode']);
    }
    // các hàm xóa mềm
    public function trash() {
        $trashs = $this->brandService->getAlltrash();
        return response()->json($trashs,200);

    }

    public function history() {
        return view('brand.history');
    }

    public function restore($id){

        $brand = $this->brandService->restore($id);
        return response()->json($brand,200);



    }

    public function delete($id){

        $brand =  $this->brandService->delete($id);
        return response()->json($brand,200);
    }

}
