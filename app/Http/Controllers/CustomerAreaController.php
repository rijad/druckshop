<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetailsFinal; 
use Illuminate\Support\Facades\Validator;
use App\CustomerArea;
use Auth;

class CustomerAreaController extends Controller
{
	public function index(){

		if(!Auth::check()){
			return redirect()->route('index');       
		}
 
		
		$OrderHistory = OrderDetailsFinal::where(['user_id'=>Auth::user()->id])->with('orderProductHistory')->get();

		//print_r($OrderHistory->toArray()); exit;

		return view('/pages/front-end/customer-area',compact('OrderHistory'));
	}


	public function edit($id)
    {
        $area = CustomerArea::find($id);
        return view('pages.front-end.customer-area', compact('area'));
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
            'image' => 'required|image:jpeg,png,jpg,gif',
            'dob' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'shipping_address' => 'required',
            'billing_address' => 'required',
            'status' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->passes()){
              // upload file
              $file = $request->file('image'); 
              //Move Uploaded File
              $destinationPath = public_path().'/customerprofile';
              $file->move($destinationPath,$file->getClientOriginalName());

            $input = $request->all();
			$input['image'] = "public/customerprofile/".$file->getClientOriginalName();
			
            if($request->input('status') == "on"){
                $input['status'] = 1;
            }else{
                $input['status'] = 0;
            }
 
            $area = CustomerArea::find($id);
            $area->dob = $input['dob'];
            $area->email = $input['email'];
            $area->address = $input['address'];
            $area->phone = $input['phone'];
            $area->shipping_address = $input['shipping_address'];
            $area->billing_address = $input['billing_address'];
            $area->status = $input['status'];
            $area->image = 'public/customerprofile/' . time() . '_' . $_FILES['image']['name'];
            $area->save();
        }
                
        return redirect()->back()->with('status' , 'Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
  // trantor^45

