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
        $data['slider'] = Slider::where('is_active', '1')->get();
        return view('pages.admin.slider.create');
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
            'image_path' => 'required|image:jpeg,png,jpg,gif',
            'title_english' => 'required',
            'title_german' => 'required',
            'title_color' => 'required',
            'title_size' => 'required',
            'content_english' => 'required',
            'content_german' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $slider = Slider::create([
            'image_path' => $request->file('image_path')->store('images'),
            'title_english' => $request->title_english,
            'title_german' => $request->title_german,
            'title_color' => $request->title_color,
            'title_size' => $request->title_size,
            'content_english' => $request->content_english,
            'content_german' => $request->content_german,
            'is_active' => $request->is_active,
            'is_slide' => $request->is_slide,
        ]);

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
        
        $slider = Slider::find($id);

        $validator = Validator::make($request->all(), [
            'title_english' => 'required',
            'title_german' => 'required',
            'title_color' => 'required',
            'title_size' => 'required',
            'content_english' => 'required',
            'content_german' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if($request->hasFile('image_path')){
            $request->validate([
                'image_path' => 'required|image:jpeg,png,jpg,gif',
            ]);
            move_uploaded_file($_FILES['file']['tmp_name'], public_path().'/uploads/' . time() . '_' . $_FILES['file']['name']);
            $slider->image_path = $request->file('image_path')->store('images');
        }

        $slider->title_english = $request->title_english;
        $slider->title_german = $request->title_german;
        $slider->title_color = $request->title_color;
        $slider->title_size = $request->title_size;
        $slider->content_english = $request->content_english;
        $slider->content_german = $request->content_german;
        $slider->is_active = $request->is_active;
        $slider->save();
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
        $slider = destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
