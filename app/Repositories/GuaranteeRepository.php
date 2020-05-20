<?php
namespace App\Repositories;

interface GuaranteeRepository extends Repository
{
    public function getTrash();
    public function restore($id);
    public function delete($id);
}
