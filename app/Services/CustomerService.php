<?php
namespace App\Services;

interface CustomerService
{
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
    public function getTrash();
    public function restore($id);
    public function delete($id);

}
