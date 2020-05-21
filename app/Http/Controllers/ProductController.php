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

        $dataProduct = $this->productService->findById($id);
        // $dataProduct[0]->branch_id = "sss";
        // $dataProduct->sida = "Haha";
        $dataProduct['products']->brand_id = 'ádfsafc';
        // $dataProduct->branch_id   = $dataProduct->branch->name;

        // $dataProduct->brand_id  = $dataProduct->brand->name;
        // $dataProduct->tag_id  = $dataProduct->tag->name;
        // $dataProduct->category_id   = $dataProduct->category->name;

        return response()->json($dataProduct['products'], $dataProduct['statusCode']);
    }

    public function store(ProductFormRequest $request)
    {
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
        $trashs = $this->productService->getAlltrash();
        foreach ($trashs  as $trash) {
            $trashs->branch_id   = $trash->branch->name;
            $trashs->brand_id  = $trash->brand->name;
            $trashs->tag_id  = $trash->tag->name;
            $trashs->category_id   = $trash->category->name;
        }

        return response()->json($trashs, 200);
    }

    // public function history() {
    //     return view('admin.product.history');
    // }

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
