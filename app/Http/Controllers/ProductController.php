<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ProductService;
use Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProductFormRequest;
use SebastianBergmann\Environment\Console;

class ProductController extends Controller
{
    //
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function json()
    {
        $products = $this->productService->getAllJoin();

        return response()->json($products, 200);
    }

    public function index()
    {

        return view('admin.product.dashboard');
    }
    public function show($id)
    {
        $dataProduct = $this->productService->findByIdJoin($id);
       
        return response()->json($dataProduct['products'], $dataProduct['statusCode']);
    }

    public function store(ProductFormRequest $request)
    {
        // return $request;
        // if ($request->hasFile('image'))
        // {
        //     $file = $request->file('image');
        //     $name_image = $file->getClientOriginalName();
        //     $image = Str::random(5) . "_" . $name_image;
        //     while (file_exists("img/banner/" . $image))
        //     {
        //     $image = Str::random(5) . "_" . $name_image;
        //     }
        //     $file->move("img/banner", $image);
        
        $dataProduct = $this->productService->create($request->all());

        return response()->json($dataProduct['products'], $dataProduct['statusCode']);
        // }else {
        //     return Response()->json(array('success'=>0,'message'=>'Upload error!'));
        // }
    }

    public function update(ProductFormRequest $request, $id)
    {
        $dataProduct = $this->productService->update($request->all(), $id);

        return response()->json($dataProduct['products'], $dataProduct['statusCode']);
    }

    public function destroy($id)
    {
        $dataProduct = $this->productService->destroy($id);

        return response()->json($dataProduct['statusCode']);
    }
    // các hàm xóa mềm
    public function trash()
    {
        $trashs = $this->productService->getTrash();
     
        return response()->json($trashs, 200);
    }

    public function restore($id)
    {

        $product = $this->productService->restore($id);

        return response()->json($product, 200);
    }

    public function delete($id)
    {

        $product =  $this->productService->delete($id);
        return response()->json($product, 200);
    }
}
