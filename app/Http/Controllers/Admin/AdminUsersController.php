<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\UsersAdmin;


class AdminUsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if (Auth::user()) {

            $user_id = Auth::user()->id;

        }
        try{
        $users = UsersAdmin::orderBy('id', 'ASC')->get();
        }catch (Exception $e) {
            $users = [];
        }

        return view('pages.admin.users.adminuser', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'phone' => 'required',
            'email' => 'required|email|unique:users_admin',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $input = $request->all();

        if($request->input('role') == "superadmin"){
            $input['role'] = 0;

        }else if($request->input('role') == "admin"){
            $input['role'] = 1;

        }else if($request->input('role') == "employee"){
            $input['role'] = 2;
        }

        $data = [

            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => @$input['role'],
        ];

        if ($data) {

            $users = UsersAdmin::create($data);
        }

        return redirect('/admin/users');
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
            'phone' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        if ($validator->passes()){

            $input = $request->all();

            if($request->input('role') == "superadmin"){
                $role = 0;

            }if($request->input('role') == "admin"){
                $role = 1;

            }if($request->input('role') == "employee"){
                $role = 2;
            } 


            $users = UsersAdmin::find($id);
            $users->name = $input['name'];
            $users->phone = $input['phone'];
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



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeAdminPassword(Request $request, $role = '') {

        $data = [];
        if ($role == 1) {

            $data = UsersAdmin::where(['role' => 1, 'status' => 1])->get()->toArray();
            
        }elseif ($role == 2) {

            $data = UsersAdmin::where(['role' => 2, 'status' => 1])->get()->toArray();
        }

        return view('pages.admin.users.change_admin_password', compact('data'));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request) {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'password' => 'required|min:8',
            
        ]);

        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        if ($validator->passes()){

            $users = UsersAdmin::find($request->user_id);
            $users->password = Hash::make($request->password);
            $users->save();

        }
        return redirect()->back()->with('status' , 'Updated');

    }


}
