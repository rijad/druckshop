<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Validator;
use App\Gallery;

class GalleryController extends Controller
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
            $gallery = Gallery::all();
        }catch (Exception $e) {
            $gallery = [];
        }
        return view('pages.admin.gallery.index', compact('gallery'));
    }

    public function gallery()
    {
        try{
            $gallery = Gallery::all();
        }catch (Exception $e) {
            $gallery = [];
        }
        return view('pages.front-end.gallery', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.gallery.create');
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
            'image' => 'required|image:jpeg,png,jpg,gif',
            'status' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } 

        if ($validator->passes()){

            if (!file_exists(public_path().'/gallery')) {
                mkdir(public_path().'/gallery', 0777);
                }
              // upload file
              $file = $request->file('image'); 
              //Move Uploaded File
              $destinationPath = public_path().'/gallery';
              $file->move($destinationPath,$file->getClientOriginalName());


            $input = $request->all();
            $input['image'] = "public/gallery/".$file->getClientOriginalName();
           // dd($input);

            if($request->input('status') == "on"){
                $input['status'] = 1;
            }else{
                $input['status'] = 0;
            }
            $gallery = Gallery::create($input);
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
        $gallery1 = Gallery::find($id);
        //dd($gallery1->image);
        unlink(base_path()."/".$gallery1->image);
        $gallery = Gallery::destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
