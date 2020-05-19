<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\FreeSample;
use App\OrderState;
use App\PaperWeight;
use App\PageOptions;

class FreeSampleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    public function __construct() {

       $this->middleware('auth:admin', ['except' => ['create', 'store', 'update']]);
    }

    
    /**FreeSample
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {   //$this->middleware('auth:admin');
        try{
            $freesample = FreeSample::all();
        }catch (Exception $e) {
            $freesample = [];
        }
        return view('pages.admin.freesample', compact('freesample'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        try{
            $paper_weight = PaperWeight::where('status' , '1')->get();
        }catch (Exception $e) {
            $paper_weight = [];
        }
        try{
            $page_options = PageOptions::where('status' , '1')->get();
        }catch (Exception $e) {
            $page_options = [];
        }
        return view('pages.front-end.freesample', compact('paper_weight','page_options'));
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
            'side_option' => 'required',
            'paper_weight' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'company' => 'sometimes',
            'street' => 'required',
            'house_number' => 'required',
            'addition_to_address' => 'sometimes',
            'zip_code' => 'required',
            'city' => 'required',
            'selectfile_free_sample' => 'required',
            'sample_status' => 'nullable',
            'status' => 'nullable',
            ], [
            'selectfile_free_sample.required' => 'Upload document to be printed as sample',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        if ($validator->passes()){
     

            if (!file_exists(public_path().'/uploads')) {
            mkdir(public_path().'/uploads', 0777);
            }

            $input = $request->all();
            $input['order_id'] = "free_".time();
            $input['sample_status'] = 'New';
            $input['document'] = 'public/uploads/'.$request->input('selectfile_free_sample');
            $input['status'] = 1;

            $freesample = FreeSample::create($input);
          

          $freesample = FreeSample::create($input);
        }

        return redirect()->back()->with('status' , 'Requested');
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
    public function edit(Request $request, $id)
    { 
        // dd($id);
        //$this->middleware('auth:admin');
        try{
            $freesample = FreeSample::where(['id' => $request->id ])->get();
        }catch (Exception $e) {
            $freesample = [];
        }
        try{
            $orderstate = OrderState::where('status', '1')->get();
        }catch (Exception $e) {
            $orderstate = [];
        }

        try{
            $order = FreeSample::where('id', $id)->first();
        }catch (Exception $e) {
            $order = [];
        }
        return view('/pages/admin/freesampledetails',compact('freesample', 'orderstate', 'id', 'order'));
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
        $freesample = FreeSample::find($id);
        // dd($freesample);
        $validator = Validator::make($request->all(), [
            'sample_status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->passes()) {
 
            $sample = $freesample;
            $sample->sample_status = $request->sample_status;
            $sample->save();
            
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
        //
    }
}
