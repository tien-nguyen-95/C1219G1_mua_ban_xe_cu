<?php
namespace App\Repositories;

interface CustomerRepository extends Repository
{
    public function getTrash();
    public function restore($id);
    public function delete($id);
}