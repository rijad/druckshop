<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Validator;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $slider = Slider::all();
        return view('pages.admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$data['slider'] = Slider::where('is_active', '1')->get();
        return view('pages.admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {  //dd($request->file('image_path')->getClientOriginalName());

        $validator = Validator::make($request->all(), [
            'image_path' => 'required|image:jpeg,png,jpg,gif',
            'title_english' => 'required',
            'title_german' => 'required',
            'title_color' => 'required',
            'title_size' => 'required|integer',
            'content_english' => 'required',
            'content_german' => 'required',
            'redirect_url' => 'nullable',
            'is_active' => 'nullable',
            'is_slide' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } 

        if ($validator->passes()){
              // upload file
              $file = $request->file('image_path'); 
              //Move Uploaded File
              $destinationPath = public_path().'/images';
              $file->move($destinationPath,$file->getClientOriginalName());


            $input = $request->all();
            $input['image_path'] = "public/images/".$file->getClientOriginalName();
           // dd($input);
            if($request->input('is_active') == "on"){
                $input['is_active'] = 1;
            }else{
                $input['is_active'] = 0;
            }

            if($request->input('is_slide') == "on"){
                $input['is_slide'] = 1;
            }else{
                $input['is_slide'] = 0;
            }
            $slider = Slider::create($input);
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
        
        $slider = Slider::find($id);
        return view('pages.admin.slider.edit', compact('slider'));
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
        //dd($request->input());
        

        $validator = Validator::make($request->all(), [
            'image_path' => 'required|image:jpeg,png,jpg,gif',
            'title_english' => 'required',
            'title_german' => 'required',
            'title_color' => 'required',
            'title_size' => 'required|integer',
            'content_english' => 'required',
            'content_german' => 'required',
            'redirect_url' => 'nullable',
            'is_active' => 'nullable',
            'is_slide' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($validator->passes()){
              // upload file
              $file = $request->file('image_path'); 
              //Move Uploaded File
              $destinationPath = public_path().'/images';
              $file->move($destinationPath,$file->getClientOriginalName());

            $input = $request->all();
            $input['image_path'] = "public/images/".$file->getClientOriginalName();
           // dd($input);
            if($request->input('is_active') == "on"){
                $input['is_active'] = 1;
            }else{
                $input['is_active'] = 0;
            }

            if($request->input('is_slide') == "on"){
                $input['is_slide'] = 1;
            }else{
                $input['is_slide'] = 0;
            }
 
            $slider = Slider::find($id);
            $slider->title_english = $input['title_english'];
            $slider->title_german = $input['title_german'];
            $slider->title_color = $input['title_color'];
            $slider->title_size = $input['title_size'];
            $slider->content_english = $input['content_english'];
            $slider->content_german = $input['content_german'];
            $slider->is_active = $input['is_active'];
            $slider->is_slide = $input['is_slide'];
            $slider->image_path = $input['image_path'];
            $slider->save();
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
    {   $slider_path = Slider::find($id);
        //dd($slider_path->image_path);
        unlink(base_path()."/".$slider_path->image_path);
        $slider = Slider::destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
