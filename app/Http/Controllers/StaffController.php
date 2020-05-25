<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Services\StaffService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Validator;

class StaffController extends Controller
{
    protected $staffService;

    public function __construct(StaffService $staffService)
    {
        $this->middleware(function($request, $next){
            if($request->ajax()){
                return $next($request);
            }
            abort(404);
        })->except('list');
        $this->staffService = $staffService;
    }

    public function list()
    {
        return view('admin.staff.index');
    }

    public function index()
    {
        $staffs = $this->staffService->getAll();
        foreach($staffs as $item){
            $staffs->user_id = $item->user->email;
            $staffs->position_id = $item->position->email;
            $staffs->branch_id = $item->branch->email;
        }

        return response()->json($staffs, 200);
    }


    public function store(StaffRequest $request)
    {

        $dataStaff = $this->staffService->create($request->all());

        return response()->json($dataStaff['staffs'], $dataStaff['statusCode']);
    }

    public function edit($id)
    {
        $dataStaff = $this->staffService->findById($id);

        return response()->json($dataStaff, 200);
    }

    public function update(StaffRequest $request, $id)
    {
        $dataStaff = $this->staffService->update($request->all(), $id);
        return response()->json($dataStaff['staffs'], $dataStaff['statusCode']);
    }

    public function destroy($id)
    {
        $dataStaff = $this->staffService->destroy($id);
        return response()->json($dataStaff['message'], $dataStaff['statusCode']);
    }

    public function trash()
    {
        $staffs = $this->staffService->getTrash();
        foreach($staffs as $item){
            $staffs->user_id = $item->user->email;
            $staffs->position_id = $item->position->email;
            $staffs->branch_id = $item->branch->email;
        }
        return response()->json($staffs, 200);
    }

    public function findTrash($id){
        $dataStaff = $this->staffService->findTrashById($id);

        return response()->json($dataStaff, 200);
    }

    public function restore($id)
    {
        $dataStaff = $this->staffService->restore($id);
        return response()->json($dataStaff,200);
    }

    public function delete($id)
    {
        $dataStaff = $this->staffService->delete($id);
        return response()->json($dataStaff,200);
    }
}
