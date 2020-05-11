<?php


namespace App\Services;

interface BrandService
{
    public function getAll();

    public function findById($id);

    public function create($request);

    public function update($request, $id);

    public function destroy($id);

    //  các hàm xóa mềm
    public function getAlltrash();

    public function restore($id);

    public function delete($id);
}
?>
