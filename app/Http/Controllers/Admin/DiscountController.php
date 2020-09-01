<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Discount;
use App\Product;
use DateTime;

class DiscountController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $binding = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('pages.admin.parameter.discount-create', compact('binding'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // dd($request->input());
        // $product=[];
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name_english' => 'required',
            'name_german' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date',
            'by_discount' => 'required',
            'type' => 'required|in:product_delivery,multiple',
            'discount' => 'required',
            // 'needs_code' => 'nullable',
            'status' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $input = $request->all();
        // dd($input);
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
       
        // dd($datetime1,$datetime2);
        if($from_date != '' && $to_date != ''){
            $datetime1 = new DateTime($request->input('from_date'));
            $datetime2 = new DateTime($request->input('to_date'));
            $interval = $datetime1->diff($datetime2)->days;
            $input['duration'] = $interval;
            // dd($interval);
        }elseif($from_date != '' && $to_date == ''){
            $input['duration'] = 30;
        }else{

        }

        if($request->input('by_discount') == "by_price"){
            $input['by_price'] = $request->input('discount');
        }else{
            $input['by_percent'] = $request->input('discount');
        }

        // if($request->input('needs_code') == "on"){
        //     $input['needs_code'] = 1;
        // }else{
        //     $input['needs_code'] = 0;
        // }

        if($request->input('status') == "on"){
            $input['status'] = 1;
        }else{
            $input['status'] = 0;
        }


        // dd($request->input());
        if($request->input('type') == "product_delivery"){
            $input['type'] = 0;
            $input['product_id'] = json_encode(['-1']);

        }else if($request->input('type') == "multiple"){
            $input['type'] = 2;
            $input['product_id'] = json_encode($request->input('product'));
        }

        // dd($input);
        $users = Discount::create($input);
// dd($users);
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
        $discount = Discount::find($id);
        $binding = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('pages.admin.parameter.discount-edit', compact('discount','binding'));
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
            'code' => 'required',
            'name_english' => 'required',
            'name_german' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date',
            'by_discount' => 'required',
            'discount' => 'required',
            'type' => 'required|in:product_delivery,multiple',
            // 'needs_code' => 'nullable',
            'status' => 'nullable',  
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        

        if ($validator->passes()){
            
            $input = $request->all();

        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
       
        // dd($datetime1,$datetime2);
        if($from_date != '' && $to_date != ''){
            $datetime1 = new DateTime($request->input('from_date'));
            $datetime2 = new DateTime($request->input('to_date'));
        $interval = $datetime1->diff($datetime2)->days;
        // $input['duration'] = $interval;
        // dd($interval);
        }elseif($from_date != '' && $to_date == ''){
            // $input['duration'] = 30;
            $interval = 30;
        }else{
            
        }

            if($request->input('by_discount') == "by_price"){
                $input['by_price'] = $request->input('discount');
            }else{
                $input['by_percent'] = $request->input('discount');
            }

            // if($request->input('needs_code') == "on"){
            //     $input['needs_code'] = 1;
            // }else{
            //     $input['needs_code'] = 0;
            // }

            if($request->input('status') == "on"){
                $input['status'] = 1;
            }else{
                $input['status'] = 0;
            }

            if($request->input('type') == "product_delivery"){
                $input['type'] = 0;
                $input['product_id'] = json_encode(['-1']);

            }if($request->input('type') == "multiple"){
                $input['type'] = 2;
                $input['product_id'] = json_encode($request->input('product'));
            } 

            // dd($type);
            $discount = Discount::find($id);
            $discount->code = $input['code'];
            $discount->name_english = $input['name_english'];
            $discount->name_german = $input['name_german'];
            $discount->from_date = $input['from_date'];
            $discount->to_date = $input['to_date'];
            // $discount->needs_code = $input['needs_code'];
            $discount->status = $input['status'];
            $discount->type = $input['type'];
            $discount->product_id = $input['product_id'];

            $discount->duration = $interval;

            if($request->input('by_discount') == "by_price"){
                $discount->by_price = $request->input('discount');
                $discount->by_percent = 0;
            }else{
                $discount->by_percent = $request->input('discount');
                $discount->by_price = 0;
            }
            $discount->save();
            
        }
            return redirect()->back()->with('status' , 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $status = Discount::find($id);

        // if ($request->status == '1') {
        //     $status->status = 0;
        // } else {
        //     $status->status = 1;
        // }
        // $status->update();
        
        // $discount = Discount::where(['id' => $id])->update(['status' => 0]);
        // return redirect()->back()->with('status' , 'Deleted');
    }
}
