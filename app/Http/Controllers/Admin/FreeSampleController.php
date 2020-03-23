<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\FreeSample;
use App\PaperWeight;

class FreeSampleController extends Controller
{
    /**FreeSample
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $freesample = FreeSample::where('status', '1')->get();
        return view('/pages/admin/freesample');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paper_weight = PaperWeight::where('status' , '1')->get();
        return view('pages.front-end.freesample', compact('paper_weight'));
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
            'side_option' => 'required',
            'paper_weight' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'company' => 'required',
            'street' => 'required',
            'house_number' => 'required',
            'addition_to_address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            // 'document' => 'required',
            'sample_status' => 'nullable',
            'status' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } 

        if ($validator->passes()){

            $input = $request->all();
            
            if($request->input('sample_status') == "on"){
                $input['sample_status'] = 'done';
            }else{
                $input['sample_status'] = 'in-progress';
            }

            if($request->input('status') == "on"){
                $input['status'] = 1;
            }else{
                $input['status'] = 0;
            }
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
        //
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
