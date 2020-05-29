<?php
namespace App\Repositories;

interface ProductRepository extends Repository
{
    public function delete($id);
    
     public function getAllJoin();

     public function findByIdJoin($id);

     public function findByIdTrash($id);

     public function getTrash();
};
?>
