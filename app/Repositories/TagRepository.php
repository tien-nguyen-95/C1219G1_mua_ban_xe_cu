<?php
namespace App\Repositories;

interface TagRepository extends Repository
{
    public function getTrash();
    public function restore($id);
    public function delete($id);
}
