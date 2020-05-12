<?php
namespace App\Repositories;

interface Repository
{
    public function getAll();
    public function findById($id);
    public function create($data);
    public function update($data, $object);
    public function destroy($object);
    public function getTrash();
    public function restore($id);
    public function delete($id);
}
