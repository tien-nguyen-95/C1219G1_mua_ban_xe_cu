<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ShopController extends Controller
{
    public function filter(Request $request){

        $category = $request->category;
        $brand = $request->brand;
        $branch = $request->branch;

        $products = Product::all();

        if($category){
            $products = $products->where('category_id', $category);
        }

        if($brand){
            $products = $products->where('brand_id', $brand);
        }

        if($branch){
            $products = $products->where('branch_id', $branch);
        }
        foreach($products as $product)
        {
            foreach($product->files as $file)
            {
                $file->name = "/img/banner/".$file->name;
            }
        }
        return response()->json($products);
    }

    public function detail($id){
        $product = Product::find($id);
        return view('product', compact('product'));
    }
}
