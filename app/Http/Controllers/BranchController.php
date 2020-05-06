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

    public function index()
    {
        $branches = $this->branchService->getAll();

        return view('admin.branch.table', compact('branches'));
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $dataBranch = $this->branchService->create($request->all());
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
