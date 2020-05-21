<?php


namespace App\Services;

interface ProductService
{
    public function getAllJoin();

    public function findById($id);

    public function create($request);

    public function update($request, $id);

    public function destroy($id);

    //  các hàm xóa mềm
    public function getAlltrash();

    public function restore($id);

    public function delete($id);
    //
}
?>
