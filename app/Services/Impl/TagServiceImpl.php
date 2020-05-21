<?php
namespace App\Services\Impl;

use App\Repositories\TagRepository;
use App\Services\TagService;

class TagServiceImpl implements TagService
{
    protected $tagRepository;


    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getAll()
    {
        $tags = $this->tagRepository->getAll();

        return $tags;
    }

    public function findById($id)
    {
        $tag = $this->tagRepository->findById($id);

        $statusCode = 200;
        if (!$tag)
            $statusCode = 404;

            $data = [
                'statusCode' => $statusCode,
                'tags' => $tag
            ];

        return $data;
    }

    public function create($request)
    {
        $tag = $this->tagRepository->create($request);

        $statusCode = 201;
        if (!$tag)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'tags' => $tag
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldTag = $this->tagRepository->findById($id);

        if (!$oldTag) {
            $newTag = null;
            $statusCode = 404;
        } else {
            $newTag = $this->tagRepository->update($request, $oldTag);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'tags' => $newTag
        ];
        return $data;
    }

    public function destroy($id)
    {
        $tag = $this->tagRepository->findById($id);

        $statusCode = 404;
        $message = "Tag not found";
        if ($tag) {
            $this->tagRepository->destroy($tag);
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
        $tags = $this->tagRepository->getTrash();

        return $tags;
    }
    public function restore($id){

        $tags = $this->tagRepository->restore($id);

        return $tags;
    }

    public function delete($id){
        $tags = $this->tagRepository->delete($id);

        return $tags;
    }


}
