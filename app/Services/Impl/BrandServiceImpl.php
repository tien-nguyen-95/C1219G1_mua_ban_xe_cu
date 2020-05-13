<?php
namespace App\Services\Impl;

use App\Repositories\BrandRepository;
use App\Services\BrandService;

class BrandServiceImpl implements BrandService
{
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function getAll()
    {
        $brands = $this->brandRepository->getAll();

        return $brands;
    }

    public function findById($id)
    {
        $brand = $this->brandRepository->findById($id);

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
        $brand = $this->brandRepository->create($request);

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
        $oldBrand = $this->brandRepository->findById($id);

        if(!$oldBrand) {
            $newBrand = null;
            $statusCode = 404;
        }else {
            $newBrand = $this->brandRepository->update($request,$oldBrand);
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
        $brand = $this->brandRepository->findById($id);

        $statusCode = 404;
        $message = "Not Found";

        if($brand){
            $this->brandRepository->destroy($brand);
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
        $trashs = $this->brandRepository->getTrash();

        return  $trashs;
    }

    public function restore($id){

        return $this->brandRepository->restore($id);


    }

    public function delete($id){
        return $this->brandRepository->delete($id);
    }
};
?>
