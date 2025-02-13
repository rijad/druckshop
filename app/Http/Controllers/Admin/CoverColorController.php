<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\CoverColor;

class CoverColorController extends Controller
{
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
        return view('pages.admin.parameter.covercolor-create');
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
            'color' => 'required',
            'name_english' => 'required',
            'name_german' => 'required',
            'status' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $input = $request->all();

        if($request->input('status') == "on"){
            $input['status'] = 1;
        }else{
            $input['status'] = 0;
        }

        
        $users = CoverColor::create($input);

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
        $covercolor = CoverColor::find($id);
        return view('pages.admin.parameter.covercolor-edit', compact('covercolor'));
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
            'color' => 'required',
            'name_english' => 'required',
            'name_german' => 'required',
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
            // dd($status);
            $covercolor = CoverColor::find($id);
            $covercolor->color = $input['color'];
            $covercolor->name_english = $input['name_english'];
            $covercolor->name_german = $input['name_german'];
            $covercolor->status = $input['status'];
            $covercolor->save();
            
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
        $covercolor = CoverColor::where(['id' => $id])->update(['status' => 0]);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
