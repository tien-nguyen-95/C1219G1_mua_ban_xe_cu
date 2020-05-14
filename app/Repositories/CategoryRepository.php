<?php

namespace App\Repositories;

interface CategoryRepository extends Repository
{
    public function getTrash();
    public function restore($id);
    public function delete($id);
}
