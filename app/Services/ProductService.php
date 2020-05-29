<?php


namespace App\Services;

interface ProductService
{
    public function getAllJoin();

    public function findByIdJoin($id);

    public function create($request);

    public function update($request, $id);

    public function destroy($id);

    //  các hàm xóa mềm
    public function getTrash();

    public function restore($id);

    public function delete($id);

    public function findByIdTrash($id);
    //
}
?>
