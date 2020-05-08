<?php

namespace App\Http\Controllers;
use App\Services\BranchService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Validator;

class BranchController extends Controller
{
    protected $branchService;

    public function __construct(branchService $branchService)
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

        return response()->view('admin.branch.table', compact('branches'),200);
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
        $validator = Validator::make($request->all(),
            [
                'name' => 'required | min:3 | max:50 | unique:branches',
                'phone' => 'required |regex:/^0([0-9]{9,10})$/ | unique:branches',
                'address' => 'required | min:3 | max:255'
            ] ,
            [
                'name.required' =>'Hãy nhập tên',
                'name.min' =>'Tối thiểu 3 ký tự',
                'name.max' =>'Tối đa 50 ký tự',
                'name.unique' =>'Tên đã tồn tại',
                'phone.required' =>'Hãy nhập số điện thoại',
                'phone.regex' =>'Số điện thoại gồm 10 hoặc 11 chữ số bắt đầu từ 0',
                'phone.unique' =>'Số điện thoại đã tồn tại',
                'address.required' => 'Hãy nhập địa chỉ',
                'address.min' => 'Tối thiểu 3 ký tự',
                'address.max' => 'Tối đa 50 ký tự'
            ]
        );

        if ($validator->passes()) {
            $dataBranch = $this->branchService->create($request->all());
        } else {
            return response()->json(['error'=>$validator->errors()->messages()]);
        }
        // return response()->json($dataBranch['branches'], $dataBranch['statusCode']);
    }

    public function edit($id)
    {
        $dataBranch = $this->branchService->findById($id);

        $view = view('admin\branch\edit', ['dataBranch' => $dataBranch['branches']]);

        return response()->make($view, $dataBranch['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required | min:3 | max:50 | unique:branches,name,'.$id.',id',
            'phone' => 'required |regex:/^0([0-9]{9,10})$/ | unique:branches,phone,'.$id.',id',
            'address' => 'required | min:3 | max:255'
        ] ,
        [
            'name.required' =>'Hãy nhập tên',
            'name.min' =>'Tối thiểu 3 ký tự',
            'name.max' =>'Tối đa 50 ký tự',
            'name.unique' =>'Tên đã tồn tại',
            'phone.required' =>'Hãy nhập số điện thoại',
            'phone.regex' =>'Số điện thoại gồm 10 hoặc 11 chữ số bắt đầu từ 0',
            'phone.unique' =>'Số điện thoại đã tồn tại',
            'address.required' => 'Hãy nhập địa chỉ',
            'address.min' => 'Tối thiểu 3 ký tự',
            'address.max' => 'Tối đa 50 ký tự'
        ]);
        if ($validator->passes()) {
            $dataBranch = $this->branchService->update($request->all(), $id);
        } else {
            return response()->json(['error'=>$validator->errors()->messages()]);
        }
    }

    public function destroy($id)
    {
        $dataBranch = $this->branchService->destroy($id);
        return response()->json($dataBranch['message'], $dataBranch['statusCode']);
    }

    public function trash()
    {
        $branches = $this->branchService->getTrash();

        return response()->view('admin.branch.trash', compact('branches'), 200);
    }
}
