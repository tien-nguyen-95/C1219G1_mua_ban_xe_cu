<?php

namespace App\Http\Controllers;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware(function($request, $next){
            if($request->ajax()){
                return $next($request);
            }
            abort(404);
        })->except('list');
        $this->userService = $userService;
    }

    public function list(){
        return view('admin.user.index');
    }

    public function index()
    {
        $users = $this->userService->getAll();

        return response()->json($users, 200);
    }

    public function edit($id)
    {
        if(Gate::allows('boss')||$id == Auth::id()){
            $dataUser = $this->userService->findById($id);
        }else {
           abort(401);
        }

        return response()->json($dataUser, 200);
    }

    public function update(Request $request, $id){
        if(Gate::allows('boss')||$id == Auth::id()){
            $dataUser = $this->userService->update($request->all(), $id);
        }else {
           abort(401);
        }
        return response()->json($dataUser['users'], $dataUser['statusCode']);
    }

    public function destroy($id){
        $dataUser = $this->userService->destroy($id);
        return response()->json($dataUser['message'], $dataUser['statusCode']);
    }
}
