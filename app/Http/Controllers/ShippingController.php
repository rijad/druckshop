<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\UserAddress;
use Auth;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()){
			return redirect()->route('index');       
		}
        $shipping = UserAddress::where('address_type','shipping')->where(['user_id'=>Auth::user()->id])->get();
        return view('/pages/front-end/shipping',compact('shipping'));
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
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'sometimes',
            'street' => 'required',
            'house_no' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'state' => 'required',
            'addition' => 'sometimes',
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
        
        $input = $request->all();
        // dd($input);

        $input['address_type'] = 'shipping';
        $input['user_id'] = $user_id;
        $input['default'] = '0';
        $users = UserAddress::create($input);

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
        $shipping = UserAddress::find($id);
        return view('/pages/front-end/shipping', compact('shipping'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'sometimes',
            'street' => 'required',
            'house_no' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'state' => 'required',
            'addition' => 'sometimes',
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

            if($id == 0){

                $shipping = new UserAddress;
                $shipping->first_name = $input['first_name'];
                $shipping->last_name = $input['last_name'];
                $shipping->company_name = $input['company_name'];
                $shipping->street = $input['street'];
                $shipping->house_no = $input['house_no'];
                $shipping->zip_code = $input['zip_code'];
                $shipping->city = $input['city'];
                $shipping->state = $input['state'];
                $shipping->addition = $input['addition'];
                $shipping->save();

            }else{

                // dd($status);
                $shipping = UserAddress::find($id);
                $shipping->first_name = $input['first_name'];
                $shipping->last_name = $input['last_name'];
                $shipping->company_name = $input['company_name'];
                $shipping->street = $input['street'];
                $shipping->house_no = $input['house_no'];
                $shipping->zip_code = $input['zip_code'];
                $shipping->city = $input['city'];
                $shipping->state = $input['state'];
                $shipping->addition = $input['addition'];
                $shipping->save();

            }
            
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
        $shipping = UserAddress::destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
