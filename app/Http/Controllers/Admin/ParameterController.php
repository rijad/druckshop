<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\PageFormat;
use App\CoverColor;
use App\CoverSheet;
use App\BackCovers;
use App\PaperWeight;
use App\CdBag;
use App\DataCheck;
use App\ArtList;
use App\Discount;
use App\DeliveryService;
use App\Parameter_list;

class ParameterController extends Controller
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
        $parameter = Parameter_list::where('status' , '1')->get();
        }catch (Exception $e) {
            $parameter = [];
        }
        return view('pages.admin.parameter.parameter',compact('parameter'));
    }

    public function details(Request $request)
    {
        if($request->model == 'Product'){
            $binding = Product::where('status' , '1')->get();
            return view('pages.admin.parameter.binding',compact('binding'));
        }
        if($request->model == 'PageFormat'){
            $pageformat = PageFormat::where('status' , '1')->get();
            return view('pages.admin.parameter.pageformat',compact('pageformat'));
        }
        if($request->model == 'CoverColor'){
            $covercolor = CoverColor::where('status' , '1')->get();
            return view('pages.admin.parameter.covercolor',compact('covercolor'));
        }
        if($request->model == 'CoverSheet'){
            $coversheet = CoverSheet::where('status' , '1')->get();
            return view('pages.admin.parameter.coversheet',compact('coversheet'));
        }
        if($request->model == 'BackCovers'){
            $backcover = BackCovers::where('status' , '1')->get();
            return view('pages.admin.parameter.backcover',compact('backcover'));
        }
        if($request->model == 'PaperWeight'){
            $paperweight = PaperWeight::where('status' , '1')->get();
            return view('pages.admin.parameter.paperweight',compact('paperweight'));
        }
        if($request->model == 'CdBag'){
            $cdbag = CdBag::where('status' , '1')->get();
            return view('pages.admin.parameter.cdbag',compact('cdbag'));
        }
        if($request->model == 'DataCheck'){
            $datacheck = DataCheck::where('status' , '1')->get();
            return view('pages.admin.parameter.datacheck',compact('datacheck'));
        }
        if($request->model == 'ArtList'){
            $art = ArtList::where('status' , '1')->get();
            return view('pages.admin.parameter.art',compact('art'));
        }
        if($request->model == 'Discount'){
            $discount = Discount::where('status' , '1')->get();
            return view('pages.admin.parameter.discount',compact('discount'));
        }
        if($request->model == 'DeliveryService'){
            $deliveryservice = DeliveryService::where('status' , '1')->get();
            return view('pages.admin.parameter.deliveryservice',compact('deliveryservice'));
        }
        // return view('pages.admin.parameter.parameter',compact('binding','pageformat','covercolor',
        // 'coversheet','backcover','paperweight','cdbag','datacheck','art','discount','deliveryservice'));
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
        //
    }
}
