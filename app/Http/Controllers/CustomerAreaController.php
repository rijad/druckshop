<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetailsFinal; 
use Illuminate\Support\Facades\Validator;
use App\CustomerArea;
use Auth;
use \Exception;

class CustomerAreaController extends Controller
{
	public function index(){ 

		if(!Auth::check()){
			return redirect()->route('index');       
		}
		$OrderHistory = OrderDetailsFinal::where(['user_id'=>Auth::user()->id])->with('orderProductHistory')->get();

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
    public function update(Request $request)
    {

     // print_r($request->input()); exit;


        $validator = Validator::make($request->all(), [
            'image' => 'nullable',
            'dob' => 'nullable',
            'email' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable',
            'shipping_address' => 'nullable',
            'billing_address' => 'nullable',
            'status' => 'nullable',
        ]);

           if(!Auth::check()){
              return redirect()->route('index');       
            }else{
              $user_id = Auth::user()->id;
            }
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->passes()){
            $input = $request->all();

              if ($request->hasFile('image')) {
                  $file = $request->file('image'); 
                  if (!file_exists(public_path().'/customerprofile')) {
                    mkdir(public_path().'/customerprofile', 0777); 
                   }  

                  $destinationPath = public_path().'/customerprofile';
                  $file->move($destinationPath,time() . '_' . $file->getClientOriginalName());
                  $input['image'] = "public/customerprofile/".time() . '_' . $file->getClientOriginalName(); 
              }else{
                   $input['image'] = "";
              }
              

              try{

                $area = CustomerArea::where(['user_id' => $user_id])->first();
                $area->dob = $input['dob'];
                $area->email = $input['email'];
                $area->address = $input['address'];
                $area->phone = $input['phone'];
                $area->shipping_address = $input['shipping_address'];
                $area->billing_address = $input['billing_address'];
                $area->status = 1;
                $area->image =  $input['image'];
                $area->save();

              }catch(\Exception $e){

                $area = new CustomerArea;
                $area->user_id = $user_id;
                $area->dob = $input['dob'];
                $area->email = $input['email'];
                $area->address = $input['address'];
                $area->phone = $input['phone'];
                $area->shipping_address = $input['shipping_address'];
                $area->billing_address = $input['billing_address'];
                $area->status = 1;
                $area->image = 'public/customerprofile/' . time() . '_' . $_FILES['image']['name'];
                $area->save();

              }

        }
                
        return redirect()->back()->with('status' , 'Updated');

    }

   public function fetchData(Request $request){

    if(!Auth::check()){
      return redirect()->route('index');       
    }else{
      $user_id = Auth::user()->id;
    }

    try{
      $details = CustomerArea::where(['user_id' => $user_id])->first();
      $details_data = ['user_id'=>$user_id, 'dob'=>$details->dob, 'email'=>$details->email, 'address' => $details->address, 'phone' => $details->phone, 'image' => $details->image, 'shipping_address' => $details->shipping_address, 'billing_address' => $details->billing_address];

    }catch(\Exception $e){

      $details_initial = ['user_id'=>$user_id, 'dob'=>'DOB', 'email'=>'Email', 'address' => 'Address', 'phone' => 'Phone', 'image' => 'public/customerprofile/1.jpg', 'shipping_address' => 'Shipping Address', 'billing_address' => 'Billing Address'];

      print_r(json_encode($details_initial));  exit;
          
    }
    if(! empty($details)){

      print_r(json_encode($details_data));  exit;

    }else{

      $details_initial = ['user_id'=>$user_id, 'dob'=>'DOB', 'email'=>'Email', 'address' => 'Address', 'phone' => 'Phone', 'image' => 'public/customerprofile/1.jpg', 'shipping_address' => 'Shipping Address', 'billing_address' => 'Billing Address'];
      print_r(json_encode($details_initial));  exit;

    }

   }
}
  // trantor^45

