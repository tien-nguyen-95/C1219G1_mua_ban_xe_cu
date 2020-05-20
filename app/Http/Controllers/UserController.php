<?php

namespace App\Http\Controllers;
use App\Services\UserService;

use Illuminate\Http\Request;

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
        });
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();

        return response()->json($users, 200);
    }

    public function edit($id)
    {
        $dataUser = $this->userService->findById($id);

        return response()->json($dataUser, 200);
    }

    public function update(Request $request, $id){
        $dataUser = $this->userService->update($request->all(), $id);
        return response()->json($dataUser['users'], $dataUser['statusCode']);
    }

    public function destroy($id){
        $dataUser = $this->userService->destroy($id);
        return response()->json($dataUser['message'], $dataUser['statusCode']);
    }
}
