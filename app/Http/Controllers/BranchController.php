<?php

namespace App\Http\Controllers;
use App\Services\BranchService;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    protected $branchService;

    public function __construct(branchService $branchService)
    {
        $this->branchService = $branchService;
    }

    public function list()
    {
        return view('admin.branch.index');
    }

    public function index()
    {
        $branches = $this->branchService->getAll();

        return view('admin.branch.table', compact('branches'));
    }

    public function show($id)
    {

    }

    public function create(){
        $view = view('admin\branch\create');
        return response()->make($view,200);
    }

    public function store(Request $request)
    {
        $dataBranch = $this->branchService->create($request->all());
        return response()->json($dataBranch['branches'], $dataBranch['statusCode']);
    }

    public function edit($id)
    {
        $dataBranch = $this->branchService->findById($id);

        $view = view('admin\branch\edit', ['dataBranch' => $dataBranch['branches']]);

        return response()->make($view, $dataBranch['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataBranch = $this->branchService->update($request->all(), $id);
        return response()->json($dataBranch['branches'], $dataBranch['statusCode']);
    }

    public function destroy($id)
    {
        $dataBranch = $this->branchService->destroy($id);
        return response()->json($dataBranch['message'], $dataBranch['statusCode']);
    }
}
