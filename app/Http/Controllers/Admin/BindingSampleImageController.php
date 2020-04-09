<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\BindingSampleImage;
use App\Product;
use App\PageFormat;
use App\CoverColor;

class BindingSampleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $binding = BindingSampleImage::all();
        return view('pages.admin.bindingsampleimage.index', compact('binding'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::where('status', '1')->get();
        $pageformat = PageFormat::where('status', '1')->get();
        $covercolor = CoverColor::where('status', '1')->get();
        return view('pages.admin.bindingsampleimage.create' , compact('product', 'pageformat', 'covercolor'));
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
            'product_id' => 'required',
            'pageformat_id' => 'required',
            'covercolor_id' => 'required',
            'status' => 'nullable',
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
              $destinationPath = public_path().'/bindingsampleimage';
              $file->move($destinationPath,$file->getClientOriginalName());


            $input = $request->all();
            $input['image'] = "public/bindingsampleimage/".$file->getClientOriginalName();

            if($request->input('status') == "on"){
                $input['status'] = 1;
            }else{
                $input['status'] = 0;
            }
            $binding = BindingSampleImage::create($input);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $binding1 = BindingSampleImage::find($id);
        //dd($binding_path->image);
        unlink(base_path()."/".$binding1->image);
        $binding = BindingSampleImage::destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
