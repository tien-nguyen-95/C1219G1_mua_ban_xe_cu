<?php

namespace App\Reponsitories;

interface Reponsitory {

    public function getAll();

    public function findById($id);

    public function create($data);

    public function update($data,$object);

    public function destroy($object);
    //  các hàm xóa mềm
    public function getAlltrash();

    public function restore($id);

    public function delete($id);
};

?>
