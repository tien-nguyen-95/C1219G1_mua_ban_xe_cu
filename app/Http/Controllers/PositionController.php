<?php

namespace App\Http\Controllers;


use App\Services\PositionService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Validator;

class PositionController extends Controller
{
    protected $positionService;

    public function __construct(PositionService $positionService)
    {
        $this->middleware(function($request, $next){
            if($request->ajax()){
                return $next($request);
            }
            abort(404);
        });
        $this->positionService = $positionService;
    }

    public function index()
    {
        $positions = $this->positionService->getAll();

        return response()->json($positions, 200);
    }

    public function show($id)
    {

    }

    public function create(){
        $view = view('admin\Position\create');
        return response()->make($view,200);
    }

    public function store(Request $request)
    {
        $dataPosition = $this->positionService->create($request->all());
        return response()->json($dataPosition['positions'], $dataPosition['statusCode']);
    }

    public function edit($id)
    {
        $dataPosition = $this->positionService->findById($id);

        return response()->json($dataPosition, 200);
    }

    public function update(Request $request, $id)
    {
        $dataPosition = $this->positionService->update($request->all(), $id);
        return response()->json($dataPosition['positions'], $dataPosition['statusCode']);
    }

    public function destroy($id)
    {
        $dataPosition = $this->positionService->destroy($id);
        return response()->json($dataPosition['message'], $dataPosition['statusCode']);
    }

    public function trash()
    {
        $positions = $this->positionService->getTrash();

        return response()->json($positions, 200);
    }

    public function findTrash($id){
        $dataPosition = $this->positionService->findTrashById($id);

        return response()->json($dataPosition, 200);
    }

    public function restore($id)
    {
        $dataPosition = $this->positionService->restore($id);
        return response()->json($dataPosition,200);
    }

    public function delete($id)
    {
        $dataPosition = $this->positionService->delete($id);
        return response()->json($dataPosition,200);
    }
}
