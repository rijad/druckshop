<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\OrderDetailsFinal;
use App\UsersAdmin;
use App\OrderState;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = OrderDetailsFinal::all();
        return view('/pages/admin/order',compact('order'));
    }

    public static function users($id)  
    {
        // dd($id);
        $user = UsersAdmin::where(['id' => $id])->first();
        //dd($user);

        if(! empty($user->name)){
            return $user->name;
        }else{
            return "";
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
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
    public function edit(Request $request, $id)
    {
        // dd($request->order_id);
        $users = UsersAdmin::where('status', '1')->get();
        $orderstate = OrderState::where('status', '1')->get();
        $orderhistory = OrderDetailsFinal::with('orderProductHistory')
                        ->where(['order_id' => $request->order_id ])
                        ->first();
        return view('/pages/admin/orderdetails',compact('orderhistory', 'users', 'orderstate'));
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
        // dd($request->all());
        $order = OrderDetailsFinal::find($id);

        $validator = Validator::make($request->all(), [
            'state' => 'required',
            'priority' => 'required',
            'assigned_to' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $order->state = $request->state;
        $order->priority = $request->priority;
        $order->assigned_to = $request->assigned_to;
        $order->save();

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
