<?php
namespace App\Repositories;

interface ProductRepository extends Repository
{
    public function delete($id);
    
     public function getAllJoin();
};
?>
