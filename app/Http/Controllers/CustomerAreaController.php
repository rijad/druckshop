<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetailsFinal; 
use Illuminate\Support\Facades\Validator;
use App\CustomerArea;
use App\ UserAddress;
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
           // 'image' => 'nullable',
            'dob' => 'nullable',
            'email' => 'nullable',
            //'address' => 'nullable',
            'phone' => 'nullable',
            //'shipping_address' => 'nullable',
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

              // if ($request->hasFile('image')) {
              //     $file = $request->file('image'); 
              //     if (!file_exists(public_path().'/customerprofile')) {
              //       mkdir(public_path().'/customerprofile', 0777); 
              //      }  

              //     $destinationPath = public_path().'/customerprofile';
              //     $file->move($destinationPath,time() . '_' . $file->getClientOriginalName());
              //     $input['image'] = "public/customerprofile/".time() . '_' . $file->getClientOriginalName(); 
              // }else{
              //      $input['image'] = "";
              // }
              

              try{

                $area = CustomerArea::where(['user_id' => $user_id])->first();
                $area->dob = $input['dob'];
                $area->email = $input['email'];
                //$area->address = $input['address'];
                $area->phone = $input['phone'];
                // $area->shipping_address = $input['shipping_address'];
                // $area->billing_address = $input['billing_address'];
                $area->status = 1;
               // $area->image =  $input['image'];
                $area->save();
 
              }catch(\Exception $e){
 
                $area = new CustomerArea;
                $area->user_id = $user_id;
                $area->dob = $input['dob'];
                $area->email = $input['email'];
               // $area->address = $input['address'];
                $area->phone = $input['phone'];
                // $area->shipping_address = $input['shipping_address'];
                // $area->billing_address = $input['billing_address'];
                $area->status = 1;
               // $area->image = 'public/customerprofile/' . time() . '_' . $_FILES['image']['name'];
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
      // $details_data = ['user_id'=>$user_id, 'dob'=>$details->dob, 'email'=>$details->email, 'address' => $details->address, 'phone' => $details->phone, 'image' => $details->image, 'billing_address' => $details->billing_address];

       $details_data = ['user_id'=>$user_id, 'dob'=>$details->dob, 'email'=>$details->email, 'address' => $details->address, 'phone' => $details->phone, 'billing_address' => $details->billing_address];


         try{

          $address = UserAddress::where(['user_id' => $user_id, 'address_type' => 'billing','default' => '1'])->first();
          $address_data = ['user_id'=>$user_id, 'first_name'=>$address->first_name, 'last_name'=>$address->last_name, 'company_name' => $address->company_name, 'street' => $address->street, 'house_no' => $address->house_no, 'zip_code' => $address->zip_code, 'addition' => $address->addition, 'city' => $address->city, 'state' => $address->state];

         }catch(Exception $e){

           $address_data = ['user_id'=>$user_id, 'first_name'=>'', 'last_name'=>'', 'company_name' => '', 'street' => '', 'house_no' => '', 'zip_code' => '', 'addition' => '', 'city' => '', 'state' => ''];

         }


    }catch(\Exception $e){

      // $details_initial = ['user_id'=>$user_id, 'dob'=>'DOB', 'email'=>'Email', 'address' => 'Address', 'phone' => 'Phone', 'image' => 'public/customerprofile/1.jpg','billing_address' => 'Billing Address'];

      $details_initial = ['user_id'=>$user_id, 'dob'=>'DOB', 'email'=>'Email', 'address' => 'Address', 'phone' => 'Phone', 'billing_address' => 'Billing Address'];
      
      print_r(json_encode(array_merge($details_initial,$address_data))); exit;
     // print_r(json_encode($details_initial));  exit;
          
    } 
    if(! empty($details)){
  
      //print_r(json_encode($details_data));  exit;
      print_r(json_encode(array_merge($details_data,$address_data))); exit;

    }else{

      //$details_initial = ['user_id'=>$user_id, 'dob'=>'DOB', 'email'=>'Email', 'address' => 'Address', 'phone' => 'Phone', 'image' => 'public/customerprofile/1.jpg','billing_address' => 'Billing Address'];

      $details_initial = ['user_id'=>$user_id, 'dob'=>'DOB', 'email'=>'Email', 'address' => 'Address', 'phone' => 'Phone', 'billing_address' => 'Billing Address'];
     // print_r(json_encode($details_initial));  exit;
      print_r(json_encode(array_merge($details_initial,$address_data))); exit;

    }

   }
}
  

