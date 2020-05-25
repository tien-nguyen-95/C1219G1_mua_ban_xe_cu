<?php

namespace App\Services\Impl;

use App\Repositories\PositionRepository;
use App\Services\PositionService;

class PositionServiceImpl implements PositionService
{
    protected $positionRepository;


    public function __construct(PositionRepository $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    public function getAll()
    {
        $positions = $this->positionRepository->getAll();

        return $positions;
    }

    public function findById($id)
    {
        $position = $this->positionRepository->findById($id);

        $statusCode = 200;
        if (!$position)
            $statusCode = 404;

            $data = [
                'statusCode' => $statusCode,
                'positions' => $position
            ];

        return $data;
    }

    public function create($request)
    {
        $position = $this->positionRepository->create($request);
        $statusCode = 201;
        if (!$position)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'positions' => $position
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldPosition = $this->positionRepository->findById($id);
        if (!$oldPosition) {
            $newPosition = null;
            $statusCode = 404;
        } else {
            $newPosition = $this->positionRepository->update($request, $oldPosition);

            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'positions' => $newPosition
        ];
        return $data;
    }

    public function destroy($id)
    {
        $position = $this->positionRepository->findById($id);

        $statusCode = 404;
        $message = "Position not found";
        if ($position) {
            $this->positionRepository->destroy($position);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function getTrash()
    {
        $positions = $this->positionRepository->getTrash();

        return $positions;
    }

    public function findTrashById($id)
    {
        $position = $this->positionRepository->findTrashById($id);
        $status = 200;

        if (!$position)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $position
        ];

        return $data;
    }

    public function restore($id){
        $position = $this->positionRepository->findTrashById($id);
        $statusCode = 404;
        $message = "Position not found";
        if ($position) {
            $this->positionRepository->restore($position);
            $statusCode = 200;
            $message = "Restore success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function delete($id){
        $position = $this->positionRepository->findTrashById($id);
        $statusCode = 404;
        $message = "Position not found";
        if ($position) {
            $this->positionRepository->delete($position);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
