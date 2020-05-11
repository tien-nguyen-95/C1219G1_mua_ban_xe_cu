<?php
namespace App\Services\Impl;

use App\Reponsitories\BrandReponsitory;
use App\Services\BrandService;

class BranServiceImpl implements BrandService
{
    protected $brandReponsitory;

    public function __construct(BrandReponsitory $brandReponsitory)
    {
        $this->brandReponsitory = $brandReponsitory;
    }

    public function getAll()
    {
        $brands = $this->brandReponsitory->getAll();

        return $brands;
    }

    public function findById($id)
    {
        $brand = $this->brandReponsitory->findById($id);

        $statusCode = 200;
        if(!$brand)
            $statusCode = 404;
        $data = [
            'statusCode'=>$statusCode,
            'brands'=>$brand
        ];

        return $data;
    }

    public function create($request)
    {
        $brand = $this->brandReponsitory->create($request);

        $statusCode = 201;
        if (!$brand)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'brands' => $brand
        ];

        return $data;
    }

    public function update($request,$id)
    {
        $oldBrand = $this->brandReponsitory->findById($id);

        if(!$oldBrand) {
            $newBrand = null;
            $statusCode = 404;
        }else {
            $newBrand = $this->brandReponsitory->update($request,$oldBrand);
            $statusCode = 200;
        }

        $data = [
            'statusCode'=>$statusCode,
            'brands'=>$newBrand
        ];

        return $data;
    }

    public function destroy($id)
    {
        $brand = $this->brandReponsitory->findById($id);

        $statusCode = 404;
        $message = "Not Found";

        if($brand){
            $this->brandReponsitory->destroy($brand);
            $statusCode=200;
            $message = "Delete success";
        }

        $data = [
            'statusCode'=>$statusCode,
            'message'=>$message
        ];

        return $data;
    }
    public function getAlltrash() {
        $trashs = $this->brandReponsitory->getAlltrash();

        return  $trashs;
    }

    public function restore($id){

        return $this->brandReponsitory->restore($id);


    }

    public function delete($id){
        return $this->brandReponsitory->delete($id);
    }
};
?>
