<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\DataCheck;

class DataCheckController extends Controller
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
        //
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
        $datacheck = DataCheck::find($id);
        return view('pages.admin.parameter.datacheck-edit', compact('datacheck'));
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
            'check_list' => 'required',
            'name_english' => 'required',
            'name_german' => 'required',
            'status' => 'nullable',   
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        

        if ($validator->passes()){
            
            $input = $request->all();

            if($request->input('status') == "on"){
                $input['status'] = 1;
            }else{
                $input['status'] = 0;
            }
            // dd($status);
            $datacheck = DataCheck::find($id);
            $datacheck->check_list = $input['check_list'];
            $datacheck->name_english = $input['name_english'];
            $datacheck->name_german = $input['name_german'];
            $datacheck->status = $input['status'];
            $datacheck->save();
            
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
        // $status = DataCheck::find($id);

        // if ($request->status == '1') {
        //     $status->status = 0;
        // } else {
        //     $status->status = 1;
        // }
        // $status->update();
        
        // $datacheck = DataCheck::where(['id' => $id])->update(['status' => 0]);
        // return redirect()->back()->with('status' , 'Deleted');
    }
}
