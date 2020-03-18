<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Discount;

class DiscountController extends Controller
{
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
        return view('pages.admin.parameter.discount-create');
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
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name_english' => 'required',
            'name_german' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date',
            'by_discount' => 'required',
            'discount' => 'required',
            'needs_code' => 'nullable',
            'status' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $input = $request->all();
        
        $datetime1 = $request->input('from_date');
        $datetime2 = $request->input('to_date');
        // dd($datetime1,$datetime2);
        if($datetime1 != '' && $datetime2 != ''){
        $interval = $datetime1->diff($datetime2)->days;
        $input['duration'] = $interval;
        // dd($interval);
        }else if($datetime1 != '' && $datetime2 == ''){
            $input['duration'] = 30;
        }

        if($request->input('by_discount') == "by_price"){
            $input['by_price'] = $request->input('discount');
        }else{
            $input['by_percent'] = $request->input('discount');
        }

        if($request->input('needs_code') == "on"){
            $input['needs_code'] = 1;
        }else{
            $input['needs_code'] = 0;
        }

        if($request->input('status') == "on"){
            $input['status'] = 1;
        }else{
            $input['status'] = 0;
        }

        // dd($input);
        $users = Discount::create($input);

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
        return view('pages.admin.parameter.discount-edit', compact('discount'));
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
            'needs_code' => 'nullable',
            'status' => 'nullable',  
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        

        if ($validator->passes()){
            
            $input = $request->all();

            $datetime1 = $request->input('from_date');
            $datetime2 = $request->input('to_date');
            dd($datetime1,$datetime2);
            if($datetime1 != '' && $datetime2 != ''){
            $interval = $datetime1->diff($datetime2)->days;
            $input['duration'] = $interval;
            }else if($datetime1 != '' && $datetime2 == ''){
                $input['duration'] = 30;
            }

            if($request->input('by_discount') == "by_price"){
                $input['by_price'] = $request->input('discount');
            }else{
                $input['by_percent'] = $request->input('discount');
            }

            if($request->input('needs_code') == "on"){
                $input['needs_code'] = 1;
            }else{
                $input['needs_code'] = 0;
            }

            if($request->input('status') == "on"){
                $input['status'] = 1;
            }else{
                $input['status'] = 0;
            }
            // dd($status);
            $discount = Discount::find($id);
            $discount->code = $input['code'];
            $discount->name_english = $input['name_english'];
            $discount->name_german = $input['name_german'];
            $discount->from_date = $input['from_date'];
            $discount->to_date = $input['to_date'];
            $discount->needs_code = $input['needs_code'];
            $discount->status = $input['status'];
            if($request->input('by_discount') == "by_price"){
                $discount->by_price = $request->input('discount');
                $discount->by_percent = "";
            }else{
                $discount->by_percent = $request->input('discount');
                $discount->by_price = "";
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
    public function destroy($id)
    {
        $discount = Discount::destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
