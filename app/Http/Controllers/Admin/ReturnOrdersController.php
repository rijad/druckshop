<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\OrderReturn;
use App\OrderDetailsFinal;
use Auth;

class ReturnOrdersController extends Controller
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
            $return = OrderReturn::orderBy('id','DESC')->get();
        }catch (Exception $e) {
            $return = [];
        }
        return view('/pages/admin/returnorder',compact('return'));
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

   
    public function store(Request $request)
    { 

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
    public function update(Request $request)
    {
          
            $input = $request->all();

            if(! Auth::guard('admin')->check()) 
            {
            return redirect()->route('index'); 
            } 
           
            $response = OrderReturn::where(['order_id' => $request->order_id])->first();

            $response->admin_response = $input['admin_response'];
            $response->status = $input['status'];
            $response->save();

            $order = OrderDetailsFinal::where('order_id', $request->order_id)
                                            ->update(['state' => $request->status, 'admin_response' => $request->admin_response]);
            
            return redirect()->route('returnorder.index', ['status' => 'Submitted']);
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
