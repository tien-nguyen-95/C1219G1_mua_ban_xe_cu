<?php

namespace App\Repositories;


interface BranchRepository extends Repository
{
    public function findTrashById($id);

    public function restore($object);

    public function delete($object);
}
