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
            $delivery = DeliveryService::where('status', '1')->get();
        }catch (Exception $e) {
            $delivery = [];
        }
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
        
        
        $insert = DeliveryService::create([
            'delivery_service' => $request->name,
            'shipment_tracking_link'=> @$request->shipment_tracking_link,
            'active_status'=>$active_status]);
        
        if($insert){

            if(!empty($request->from) && !empty($request->to) && !empty($request->price)){

                foreach ($request->from as $key => $value) {

                    if((!empty($request['to'][$key]) || $request['to'][$key] == '0') && (!empty($request['price'][$key]) || $request['to'][$key] == '0') ){

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
        $attributes = LettesOfSpine::where(['delivery_service_id' => $id, 'ds_del_status' => 0])->get()->toArray();
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
            $delivery->shipment_tracking_link = @$request->shipment_tracking_link;
            $delivery->active_status = $active_status;

            $delivery->save();

            if(!empty($request->from) && !empty($request->to) && !empty($request->price)){

                foreach ($request->from as $key => $value) {

                    if( !empty($request['to'][$key]) && !empty($request['price'][$key]) ) {

                        if (!empty($request['id'][$key])) {

                            $check_already = LettesOfSpine::find($request['id'][$key]);
                            
                        }else{

                            $check_already = [];
                        }

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
        $format = DeliveryService::where(['id' => $id])->update(['status' => 0]);

        return redirect()->back()->with('status' , 'Deleted successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSpine(Request $request, $id='')
    {
        $format = LettesOfSpine::where(['id' => $request->id])->update(['ds_del_status' => 1]);

        echo json_encode('true');
    }
}
 