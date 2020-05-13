<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Latest;

class LatestController extends Controller
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
            $latest = Latest::where('status', '1')->orderBy('created_at','DESC')->get();  //dd($latest);
        }catch (Exception $e) {
            $latest = [];
        }
        return view('pages.admin.latest.index',compact('latest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.latest.create');
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
            // 'image' => 'required|image:jpeg,png,jpg,gif',
            'title_english' => 'required',
            'title_german' => 'required',
            'text_english' => 'required',
            'text_german' => 'required',
            'status' => 'nullable',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } 

        $data = [];
        $input = $request->all();
        
        if ($validator->passes()){

            // if ($request->file('image')) {

            //      // upload file
            //     $file = $request->file('image'); 
            //     //Move Uploaded File
            //     $destinationPath = public_path().'/latest';
            //     $file->move($destinationPath,$file->getClientOriginalName());

            //     $input['image'] = "public/latest/".$file->getClientOriginalName();
            // }

            if($request->input('status') == "on"){
                $status = 1;
            }else{
                $status = 0;
            }

            $data = [

                'title_english' => trim(@$request->title_english),
                'title_german' => trim(@$request->title_german),
                'text_english' => trim(@$request->text_english),
                'text_german' => trim(@$request->text_german),
                'status' => $status,
                // 'image' => @$input['image'],
            ];

            $latest = latest::create($data);
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
        $latest = Latest::find($id);
        return view('pages.admin.latest.edit', compact('latest'));
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

            'title_english' => 'required',
            'title_german' => 'required',
            'text_english' => 'required',
            'text_german' => 'required',
            'status' => 'nullable',
        ]);
        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $input = $request->all();
        if ($validator->passes()){

            // if ($request->file('image')) {

            //     // upload file
            //     $file = $request->file('image'); 
            //     //Move Uploaded File
            //     $destinationPath = public_path().'/latest';
            //     $file->move($destinationPath,$file->getClientOriginalName());

            //     $input['image'] = "public/latest/".$file->getClientOriginalName();
            // }

            if($request->input('status') == "on"){
                $status = 1;
            }else{
                $status = 0;
            }

            $latest = Latest::find($id);
            $latest->title_english = @$input['title_english'];
            $latest->title_german = @$input['title_german'];
            $latest->text_english = trim(@$input['text_english']);
            $latest->text_german = trim(@$input['text_german']);
            $latest->status = $status;
            $latest->save();
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
    {   $latest = Latest::find($id);
        //dd($latest_path->image);
        unlink(base_path()."/".$latest->image);
        $latest = Latest::destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
