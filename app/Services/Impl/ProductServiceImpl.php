<?php
namespace App\Services\Impl;

use App\Repositories\ProductRepository;
use App\Services\ProductService;

class ProductServiceImpl implements ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllJoin()
    {
        $products = $this->productRepository->getAllJoin();

        return $products;
    }

    public function findByIdJoin($id)
    {
        $product = $this->productRepository->findByIdJoin($id);

        $statusCode = 200;
        if(!$product)
            $statusCode = 404;
        $data = [
            'statusCode'=>$statusCode,
            'products'=>$product
        ];

        return $data;
    }

    public function create($request)
    {
        $product = $this->productRepository->create($request);

        $statusCode = 201;
        if (!$product)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'products' => $product
        ];

        return $data;
    }

    public function update($request,$id)
    {
        $oldProduct= $this->productRepository->findByIdJoin($id);

        if(!$oldProduct) {
            $newProduct = null;
            $statusCode = 404;
        }else {
            $newProduct = $this->productRepository->update($request,$oldProduct);
            $statusCode = 200;
        }

        $data = [
            'statusCode'=>$statusCode,
            'products'=>$newProduct
        ];

        return $data;
    }

    public function destroy($id)
    {
        $product = $this->productRepository->findByIdJoin($id);

        $statusCode = 404;
        $message = "Not Found";

        if($product){
            $this->productRepository->destroy($product);
            $statusCode=200;
            $message = "Delete success";
        }

        $data = [
            'statusCode'=>$statusCode,
            'message'=>$message
        ];

        return $data;
    }
    public function getTrash() 
    {
        $products = $this->productRepository->getTrash();

        return  $products;
    }

    public function restore($id)
    {
        return $this->productRepository->restore($id);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }

};
?>
