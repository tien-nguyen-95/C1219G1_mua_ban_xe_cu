<?php

namespace App\Services;

interface PositionService
{
    public function getAll();

    public function getTrash();

    public function findById($id);

    public function create($request);

    public function update($request, $id);

    public function destroy($id);

    public function findTrashById($id);

    public function restore($id);

    public function delete($id);
}
