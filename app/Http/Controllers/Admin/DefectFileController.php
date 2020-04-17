<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\OrderHistory;

class DefectFileController extends Controller
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
    {  dd("hhj");
        return view('pages.front-end.defectfile');
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
        //
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

        $validator = Validator::make($request->all(), [
            'file' => 'required',
        ]); 


        if ($validator->fails()) {  
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();  
        } 

        if ($validator->passes()){ 

                    //$old_file_name = $request->input('oldfile');
            $old_file_name = '1586179191_sample.pdf';

            //$user_id = $request->input('user_id');
           // $user_id = 1;

            //$order_id = $request->input('order_id'); 
            $order_id = '1_1584966747';

              // upload file 
              $file = $request->file('file'); 
              $new_file = time().'_'.$file->getClientOriginalName();
              if (!file_exists(public_path().'/uploads')) {
                    mkdir(public_path().'/uploads', 0777); 
             }
              //Move Uploaded File
              $destinationPath = public_path().'/uploads';
              $file->move($destinationPath,$new_file);

              // Remove old file
              unlink($destinationPath."/".$old_file_name);

              $data = OrderHistory::where(['order_id' => $order_id])->first();

              $data_array = json_decode($data->attribute);
              $data_array->selectfile_content = $new_file;
            
              $updated_array = json_encode($data_array);
              dd($updated_array);

              // update new array in table
              $defect = $data;
              $defect->attribute = $updated_array;
              $defect->save();
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
