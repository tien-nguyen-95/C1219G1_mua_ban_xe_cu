<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->getAll();

        return response()->json($categories, 200);
    }

    public function show($id)
    {
        $dataCategory = $this->categoryService->findById($id);

        return response()->json($dataCategory['categories'], $dataCategory['statusCode']);
    }

    public function edit($id)
    {
        $dataCategory = $this->categoryService->findById($id);

        return response()->json($dataCategory, 200);
    }

    public function store(CategoryRequest $request)
    {
        $dataCategory = $this->categoryService->create($request->all());

        return response()->json($dataCategory['categories'], $dataCategory['statusCode']);
    }

    public function update(CategoryRequest $request, $id)
    {
        $dataCategory = $this->categoryService->update($request->all(), $id);

        return response()->json($dataCategory['categories'], $dataCategory['statusCode']);
    }

    public function destroy($id)
    {
        $dataCategory = $this->categoryService->destroy($id);
        return response()->json($dataCategory['message'], $dataCategory['statusCode']);
    }

    public function trash()
    {
        $categories = $this->categoryService->getTrash();

        return response()->json($categories, 200);
    }

    public function restore($id)
    {
        $dataCategory = $this->categoryService->restore($id);
        return response()->json($dataCategory, 200);
    }
    
    public function hardDelete($id)
    {
        $dataCategory = $this->categoryService->hardDelete($id);
        return response()->json($dataCategory, 200);
    }
}
