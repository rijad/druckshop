<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\PageFormat;

class PageFormatController extends Controller
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
        return view('pages.admin.parameter.pageformat-create');
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
            'page_format' => 'required',
            'name_english' => 'required',
            'name_german' => 'required',
            'can_add_din_A2' => 'nullable',
            'max_pages_A2' =>'required_if:can_add_din_A2,on',
            'can_add_din_A3' => 'nullable',
            'max_pages_A3' =>'required_if:can_add_din_A3,on',
            'status' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $input = $request->all();
        // dd($input);

        if($request->input('status') == "on"){
            $input['status'] = 1;
        }else{
            $input['status'] = 0;
        }

        if($request->input('can_add_din_A2') == "on"){
            $input['can_add_din_A2'] = 1;
            $input['max_pages_A2'] = $request->max_pages_A2;
        }else{
            $input['can_add_din_A2'] = 0;
            $input['max_pages_A2'] = 0;
        }

        if($request->input('can_add_din_A3') == "on"){
            $input['can_add_din_A3'] = 1;
            $input['max_pages_A3'] = $request->max_pages_A3;
        }else{
            $input['can_add_din_A3'] = 0;
            $input['max_pages_A3'] = 0;
        }

        
        $format = PageFormat::create($input);

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
        $format = PageFormat::find($id);
        return view('pages.admin.parameter.pageformat-edit', compact('format'));
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
            'page_format' => 'required',
            'name_english' => 'required',
            'name_german' => 'required',
            'can_add_din_A2' => 'nullable',
            'max_pages_A2' =>'required_if:can_add_din_A2,on',
            'can_add_din_A3' => 'nullable',
            'max_pages_A3' =>'required_if:can_add_din_A3,on',
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

            if($request->input('can_add_din_A2') == "on"){
                $input['can_add_din_A2'] = 1;
            }else{
                $input['can_add_din_A2'] = 0;
            }
    
            if($request->input('can_add_din_A3') == "on"){
                $input['can_add_din_A3'] = 1;
            }else{
                $input['can_add_din_A3'] = 0;
            }

            $format = PageFormat::find($id);
            $format->page_format = $input['page_format'];
            $format->name_english = $input['name_english'];
            $format->name_german = $input['name_german'];
            $format->status = $input['status'];

            if($request->input('can_add_din_A2') == "on"){
                $format->can_add_din_A2 = $input['can_add_din_A2'];
                $format->max_pages_A2 = $input['max_pages_A2'];
            }else{
                $format->can_add_din_A2 = 0;
                $format->max_pages_A2 = 0;
            }

            if($request->input('can_add_din_A3') == "on"){
                $format->can_add_din_A3 = $input['can_add_din_A3'];
                $format->max_pages_A3 = $input['max_pages_A3'];
            }else{
                $format->can_add_din_A3 = 0;
                $format->max_pages_A3 = 0;
            }
            $format->save();
            
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
        // $status = PageFormat::find($id);

        // if ($request->status == '1') {
        //     $status->status = 0;
        // } else {
        //     $status->status = 1;
        // }
        // $status->update();
        
        $format = PageFormat::where(['id' => $id])->update(['status' => 0]);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
