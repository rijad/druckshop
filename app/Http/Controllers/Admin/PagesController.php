<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\About;

class PagesController extends Controller
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
        // $about = About::find($id);
        // return view('pages.admin.about', compact('about'));
    }

    public function about()
    {
        $abouts = About::where('status' , '1')->get();
        return view('pages.admin.about', compact('abouts'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aboutupdate(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'image' => 'required|image:jpeg,png,jpg,gif',
            'title_english' => 'required',
            'title_german' => 'required',
            'text_english' => 'required',
            'text_german' => 'required',

            // 'image1' => 'required|image:jpeg,png,jpg,gif',
            // 'title_english1' => 'required',
            // 'title_german1' => 'required',
            // 'text_english1' => 'required',
            // 'text_german1' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->passes()){
              // upload file
              $file = $request->file('image'); 
              //Move Uploaded File
              $destinationPath = public_path().'/images';
              $file->move($destinationPath,$file->getClientOriginalName());

            $input = $request->all();
            $input['image'] = "public/images/".$file->getClientOriginalName();
           // dd($input);
 
            $data = About::find($request->id);
            $data->title_english = $input['title_english'];
            $data->title_german = $input['title_german'];
            $data->text_english = $input['text_english'];
            $data->text_german = $input['text_german'];
            $data->image = $input['image'];
            $data->save();
        }

        if ($validator->passes()){
            // upload file
            $file1 = $request->file('image1'); 
            //Move Uploaded File
            $destinationPath1 = public_path().'/images';
            $file1->move($destinationPath1,$file1->getClientOriginalName());

            $input1 = $request->all();
            // dd($input1);
            $input1['image1'] = "public/images/".$file1->getClientOriginalName();

            $data1 = About::find($request->id1);
            $data1->title_english = $input1['title_english1'];
            $data1->title_german = $input1['title_german1'];
            $data1->text_english = $input1['text_english1'];
            $data1->text_german = $input1['text_german1'];
            $data1->image = $input1['image1'];
            $data1->save();
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
