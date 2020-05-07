<?php

namespace App\Reponsitories;

interface Reponsitory {

    public function getAll();

    public function findById($id);

    public function create($data);

    public function update($data,$object);

    public function destroy($object);

};

?>
