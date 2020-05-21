<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Rules\OldPwdRule;
use App\UsersAdmin;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->check())
        {
        $user_id = Auth::guard('admin')->user()->id;
        // dd($user_id);
        }
        return view('pages.admin.changepassword', compact('user_id'));
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
        // $input['password'] = Hash::make('trantor@123');
        //         UsersAdmin::find(1)->update($input);
        $validator = Validator::make($request->all(), [
            'old_password' => ['required',new OldPwdRule('old_password')],
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->passes()) {

            $input = $request->all();

            if (Auth::guard('admin')->check())
            {
                $user_id = Auth::guard('admin')->user()->id;
            }

            $input['password'] = Hash::make($request->password);
                UsersAdmin::find($user_id)->update($input);

                return redirect()->back()->with('status' , 'Updated');
        }
       
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
