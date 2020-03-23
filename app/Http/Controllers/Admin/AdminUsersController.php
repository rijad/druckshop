<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\UsersAdmin;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { dd("kjkl");
        $users = UsersAdmin::all();
        return view('pages.admin.users.adminuser', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['users'] = UsersAdmin::where('status', '1')->get();
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users_admin',
            'password' => 'required|min:6',
            'user' => 'nullable',
            'admin' => 'nullable',
            'superadmin' => 'nullable',
            'employee' => 'nullable',
            'supervisor' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        

        $input = $request->all();

        if($request->input('superadmin') == "on"){
            $input['role'] = 0;
        }else if($request->input('admin') == "on"){
            $input['role'] = 1;
        }else if($request->input('employee') == "on"){
            $input['role'] = 2;
        }else if($request->input('user') == "on"){
            $input['role'] = 3;
        }else if($request->input('supervisor') == "on"){
            $input['role'] = 4;
        }
        $users = UsersAdmin::create($input);

        return redirect()->back()->with('status' , 'Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = UsersAdmin::find($id);
        return view('pages.admin.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'user' => 'nullable',
            'admin' => 'nullable',
            'superadmin' => 'nullable',
            'employee' => 'nullable',
            'supervisor' => 'nullable',   
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if ($validator->passes()){
            
        $input = $request->all();
        // dd($input);
        if($request->input('superadmin') == "superadmin"){
            $role = 0;
            
        }if($request->input('admin') == "admin"){
            $role = 1;
        }if($request->input('employee') == "employee"){
            $role = 2;
        } if($request->input('user') == "user"){
            $role = 3;
        }if($request->input('supervisor') == "supervisor"){
            $role = 4;
        }

        $users = UsersAdmin::find($id);
        $users->name = $input['name'];
        $users->email = $input['email'];
        $users->password = $input['password'];
        $users->role = $role;
        $users->save();
        
    }
        return redirect()->back()->with('status' , 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = UsersAdmin::destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
