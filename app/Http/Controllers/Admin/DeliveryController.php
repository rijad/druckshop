<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\DeliveryService;
use App\LettesOfSpine;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery = DeliveryService::where('status', '1')->get();
        return view('/pages/admin/delivery', compact('delivery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.parameter.deleveryservice-create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        
        $validator = Validator::make($request->all(), [
            
            'name' => 'required',
            ]);
            
            if ($validator->fails()) {
                
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
            
            if($request->input('active') == "on"){
                
                $active_status = 1;
            }else{
                
                $active_status = 0;
            }
            
            
            $insert = DeliveryService::create(['delivery_service' => $request->name, 'active_status'=>$active_status]);
            
            if($insert){

                if(!empty($request->from) && !empty($request->to) && !empty($request->price)){

                    foreach ($request->from as $key => $value) {
                        
                        if(!empty($request['to'][$key]) && !empty($request['price'][$key])){

                            $attr_data = [
                                
                                'delivery_service_id' => $insert->id,
                                'ds_from' => $request['from'][$key],
                                'ds_to' => $request['to'][$key],
                                'ds_price' => $request['price'][$key],
                            ];
                            
                            $store_attributes = LettesOfSpine::create($attr_data);
                        }
                        
                        }
                    }
                               
            }
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
        $data = DeliveryService::find($id);
        $attributes = LettesOfSpine::where('delivery_service_id', $id)->get();
        return view('pages.admin.parameter.deliveryservice-edit', compact('data', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            
            'name' => 'required',
            ]);
            
            if ($validator->fails()) {
                
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
            
            if($request->input('active') == "on"){
                
                $active_status = 1;
            }else{
                
                $active_status = 0;
            }
            
            $delivery = DeliveryService::find($id);

            if(!empty($delivery)){

                $delivery->delivery_service = $request->name;
                $delivery->active_status = $active_status;

                $delivery->save();

                if(!empty($request->from) && !empty($request->to) && !empty($request->price)){

                    foreach ($request->from as $key => $value) {
                        
                        if( !empty($request['to'][$key]) && !empty($request['price'][$key]) ) {

                            
                            $check_already = LettesOfSpine::find($request['id'][$key]);

                            if(!empty($check_already)){

                                $check_already->ds_from =  $request['from'][$key];
                                $check_already->ds_to =  $request['to'][$key];
                                $check_already->ds_price =  $request['price'][$key];

                                $check_already->save();
                            }else{

                                $attr_data = [
                                    
                                    'delivery_service_id' => $id,
                                    'ds_from' => $request['from'][$key],
                                    'ds_to' => $request['to'][$key],
                                    'ds_price' => $request['price'][$key],
                                ];
                                
                                $store_attributes = LettesOfSpine::create($attr_data);
                            }
                        }
                        
                        }
                    }

                }
                               
                return redirect()->back()->with('status' , 'Created');

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
