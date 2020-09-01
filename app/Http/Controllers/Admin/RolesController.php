<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\UsersAdmin;
use App\UserRoles;
use App\UserPermissions;


class RolesController extends Controller
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
        try{
            $roles = UserRoles::all();
        }catch (Exception $e) {
            $roles = [];
        }

        try{
            $names = UsersAdmin::where('role' , '1')->orWhere('role' , '2')->get();
            // dd($names);
        }catch (Exception $e) {
            $roles = [];
        }
        return view('pages.admin.role', compact('roles', 'names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            'role' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        if ($validator->passes()){

            $input = $request->all();

            if($request->input('role') == "SuperAdmin"){
                $input['role'] = 0;

            }if($request->input('role') == "Admin"){
                $input['role'] = 1;

            }if($request->input('role') == "Employee"){
                $input['role'] = 2;
            } 


            $names = UsersAdmin::find($id);
            $names->role = $input['role'];
            $names->save();
            $names = UserPermissions::where(['user_id' => $id])
            ->update(['user_role' => $input['role']]);
            

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
        //
    }
}
