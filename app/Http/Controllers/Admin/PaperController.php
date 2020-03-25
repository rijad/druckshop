<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\DeliveryService;
use App\LettesOfSpine;
use App\PaperWeight;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $delivery = DeliveryService::where('status', '1')->get();
        return view('/pages/admin/delivery', compact('delivery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.parameter.paperweight-create');
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

            'name' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->input('active') == "on") {

            $active_status = 1;
        } else {

            $active_status = 0;
        }


        $insert = PaperWeight::create([

            'paper_weight' => $request->name,
            'name_english' => $request->name_in_en,
            'name_german' => $request->name_in_dh,
            'weight_per_sheet' => $request->weight_per_sheet,
            'min_sheets_for_spine' => $request->min_sheets_for_spine,
            'status' => $active_status
        ]);

        if ($insert) {

            if (!empty($request->sheet_start) && !empty($request->sheet_end) && !empty($request->latters)) {

                foreach ($request->sheet_start as $key => $value) {

                    if (!empty($request['sheet_start'][$key]) && !empty($request['sheet_end'][$key])) {

                        $attr_data = [

                            'paper_weight_id' => $insert->id,
                            'sheets_range_start' => $request['sheet_start'][$key],
                            'sheets_range_end' => $request['sheet_end'][$key],
                            'letters' => $request['latters'][$key],
                        ];

                        $store_attributes = LettesOfSpine::create($attr_data);
                    }
                }
            }
        }
        return redirect()->back()->with('status', 'Created');
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
        $data = PaperWeight::find($id);
        $attributes = LettesOfSpine::where('paper_weight_id', $id)->get();
        return view('pages.admin.parameter.paperweight-edit', compact('data', 'attributes'));
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

            'name' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->input('active') == "on") {

            $active_status = 1;
        } else {

            $active_status = 0;
        }

        $paper = PaperWeight::find($id);

        if (!empty($paper)) {

            $paper->paper_weight = $request->name;
            $paper->name_english = $request->name_in_en;
            $paper->name_german = $request->name_in_dh;
            $paper->weight_per_sheet = $request->weight_per_sheet;
            $paper->min_sheets_for_spine = $request->min_sheets_for_spine;
            $paper->status = $active_status;

            $paper->save();


            foreach ($request->sheet_start as $key => $value) {

                    $check_already = LettesOfSpine::find($request['id'][$key]);

                    if (!empty($check_already)) {

                        $check_already->sheets_range_start =  $request['sheet_start'][$key];
                        $check_already->sheets_range_end =  $request['sheet_end'][$key];
                        $check_already->letters =  $request['latters'][$key];

                        $check_already->save();
                    } else {

                        $attr_data = [

                            'paper_weight_id' => $id,
                            'sheets_range_start' => $request['sheet_start'][$key],
                            'sheets_range_end' => $request['sheet_end'][$key],
                            'letters' => $request['latters'][$key],
                        ];

                        $store_attributes = LettesOfSpine::create($attr_data);
                    }
            }
        }

        return redirect()->back()->with('status', 'Created');
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
