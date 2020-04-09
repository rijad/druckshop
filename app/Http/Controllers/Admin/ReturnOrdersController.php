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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $return = OrderReturn::all();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'admin_response' => 'required',
        //     'status' => 'nullable',
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        
        // $input = $request->all();
        // // dd($input);

        // if($request->input('status') == "on"){
        //     $input['status'] = 'Reversal Request';
        // }else{
        //     $input['status'] = 'Reversal Declined';
        // }
        
        // if(Auth::check()) 
        // {
        // $user_id = Auth::user()->id;
        // }else{
        //     return redirect()->route('index');
        // }
    
        // $response = OrderReturn::create($input);
        // $response = OrderDetailsFinal::update(['state' => $request->status ]);

        // return redirect()->back()->with('status' , 'Submitted');
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
        dd($id);
        $validator = Validator::make($request->all(), [
            'admin_response' => 'required',
            'status' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->passes()){
            
            $input = $request->all();

            if(Auth::check()) 
            {
            $user_id = Auth::user()->id;
            }else{
                return redirect()->route('index');
            }
           
            $response = OrderReturn::find($id);

            $response->admin_response = $input['admin_response'];
            $response->status = $input['status'];
            $response->save();

            $order = OrderDetailsFinal::where('order_id', $request->order_id)
                                            ->update(['state' => $request->status ]);
            
        }
            return redirect()->back()->with('status' , 'Submitted');
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
