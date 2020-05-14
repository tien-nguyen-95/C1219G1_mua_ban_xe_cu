<?php
namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $tags = $this->tagService->getAll();

        return response()->json($tags, 200);
    }

    public function show($id)
    {
        $dataTag = $this->tagService->findById($id);

        return response()->json($dataTag['tags'], $dataTag['statusCode']);
    }

    public function store(TagRequest $request)
    {
        $dataTag = $this->tagService->create($request->all());

        return response()->json($dataTag['tags'], $dataTag['statusCode']);
    }

    public function update(TagRequest $request, $id)
    {
        $dataTag = $this->tagService->update($request->all(), $id);

        return response()->json($dataTag['tags'], $dataTag['statusCode']);
    }

    public function destroy($id)
    {
        $dataTag = $this->tagService->destroy($id);

        return response()->json($dataTag['message'], $dataTag['statusCode']);
    }
    public function trash()
    {
        $dataTag = $this->tagService->getTrash();

        return response()->json($dataTag, 200);
    }
    public function restore($id){

        $tags = $this->tagService->restore($id);
        return response()->json($tags,200);
    }

    public function delete($id){

        $tags =  $this->tagService->delete($id);
        return response()->json($tags,200);
    }

}
