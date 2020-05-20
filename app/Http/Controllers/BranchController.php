<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchRequest;
use App\Services\BranchService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Validator;

class BranchController extends Controller
{
    protected $branchService;

    public function __construct(BranchService $branchService)
    {
        $this->middleware(function($request, $next){
            if($request->ajax()){
                return $next($request);
            }
            abort(404);
        });
        $this->branchService = $branchService;
    }

    public function index()
    {
        $branches = $this->branchService->getAll();

        return response()->json($branches, 200);
    }

    public function show($id)
    {

    }

    public function create(){
        $view = view('admin\branch\create');
        return response()->make($view,200);
    }

    public function store(BranchRequest $request)
    {

        $dataBranch = $this->branchService->create($request->all());
        return response()->json($dataBranch['branches'], $dataBranch['statusCode']);
    }

    public function edit($id)
    {
        $dataBranch = $this->branchService->findById($id);

        return response()->json($dataBranch, 200);
    }

    public function update(BranchRequest $request, $id)
    {
        $dataBranch = $this->branchService->update($request->all(), $id);
        return response()->json($dataBranch['branches'], $dataBranch['statusCode']);
    }

    public function destroy($id)
    {
        $dataBranch = $this->branchService->destroy($id);
        return response()->json($dataBranch['message'], $dataBranch['statusCode']);
    }

    public function trash()
    {
        $branches = $this->branchService->getTrash();

        return response()->json($branches, 200);
    }

    public function findTrash($id){
        $dataBranch = $this->branchService->findTrashById($id);

        return response()->json($dataBranch, 200);
    }

    public function restore($id)
    {
        $dataBranch = $this->branchService->restore($id);
        return response()->json($dataBranch,200);
    }

    public function delete($id)
    {
        $dataBranch = $this->branchService->delete($id);
        return response()->json($dataBranch,200);
    }
}
