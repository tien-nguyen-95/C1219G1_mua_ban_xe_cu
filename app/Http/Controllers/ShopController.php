<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ShopController extends Controller
{
    public function getAll(){
        $products = Product::where('status', 'show')->get();
        $count = count($products);
        return view('welcome', compact('products','count'));
    }

    public function filterCategory($category){
        $products = Product::where('status', 'show')->where('category_id', $category)->get();
        $count = count($products);
        return view('welcome', compact('products','count'));
    }

    public function filterBrand($brand){
        $products = Product::where('status', 'show')->where('brand_id', $brand)->get();
        $count = count($products);
        return view('welcome', compact('products','count'));
    }

    public function filterBranch($branch){
        $products = Product::where('status', 'show')->where('branch_id', $branch)->get();
        $count = count($products);
        return view('welcome', compact('products','count'));
    }

    public function filter(Request $request){

        $category = $request->category;
        $brand = $request->brand;
        $branch = $request->branch;
        $price = $request->price;
        // dd($price);
        $miles = $request->miles;




        if($price == "1"){
            $products = Product::orderBy('export_price', 'asc')->where('status', 'show')->get();
            // dd($products);
        }

        elseif($price == "2"){
            $products = Product::orderBy('export_price', 'desc')->where('status', 'show')->get();
        }
        else{
            $products = Product::where('status', 'show')->get();
        }

        if($category){
            $products = $products->where('category_id', $category);
        }

        if($brand){
            $products = $products->where('brand_id', $brand);
        }

        if($branch){
            $products = $products->where('branch_id', $branch);
        }


        if($miles){
            switch ($miles){
                case 1:   $products = $products->whereBetween('miles', array(0, 4999));break;
                case 2:   $products = $products->whereBetween('miles', array(5000, 9999));break;
                case 3:   $products = $products->whereBetween('miles', array(10000, 20000));break;
                case 4:   $products = $products->where('miles', '>', 20000);break;
            }

        }

        foreach($products as $product)
        {
            foreach($product->files as $file)
            {
                $file->name = "/img/banner/".$file->name;
            }
        }
        return response()->json(['data'=>$products,'count'=>count($products)]);
    }

    public function detail($id){
        $product = Product::find($id);
        return view('product', compact('product'));
    }

    public function search(Request $request){
        $key_word = request('keyword');
        $products = Product::where('status', 'show')->where('title', 'like',"%$key_word%")->get();
        $count = count($products);
        return view('welcome', compact('products','count'));
    }
}
