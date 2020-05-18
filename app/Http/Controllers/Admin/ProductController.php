<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\UrlGenerator;
use App\Product;
use App\ArtList;
use App\PageFormat;
use App\CoverColor; 
use App\CoverSheet; 
use App\BackCovers;
use App\PaperWeight;
use App\CoverSetting;
use App\PrintFinishing;
use App\ProductPageFormat;
use App\ProductCoverColor;
use App\ProductCoverSheet;
use App\ProductBackSheet;
use App\ProductPaperWeight;
use App\ProductPrintFinishing;
use App\PrintFinishingArtList;
use App\ProductPrice;
use App\ProductPrintFinishingArtList;
use App\ProductCoverSetting;
use App\ProductImage;


use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $url;

    public function __construct(UrlGenerator $url) {

        $this->middleware('auth:admin');
        $this->url = $url;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $product = Product::where('status', '1')->get();
        }catch (Exception $e) {
            $product = [];
        }
        return view('pages.admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageFormat = PageFormat::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get();
        $coverSetting = CoverSetting::where('status', 1)->orderBy('id', 'DESC')->limit(20)->get();

        $coverColor = CoverColor::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get();
        $coverSheet = CoverSheet::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get();
        $backCover = BackCovers::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get();

        $paperWeight = PaperWeight::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get(); 
        $printFinishing = PrintFinishing::where('status', 1)->orderBy('id', 'DESC')->limit(20)->get();

        $artList = ArtList::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get();

        return view('pages.admin.parameter.binding-create', compact('pageFormat', 'coverSetting', 'coverColor', 'coverSheet', 'backCover', 'printFinishing', 'artList', 'paperWeight'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
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

        $insert = Product::create([

            'title_english' => $request->name,
            'title_german' => $request->name_in_dh,
            //'cover_weight' => $request->cover_weight,
            'status' => $active_status,
            'short_description_english' => @$request->short_description_english,
            'short_description_german' => @$request->short_description_german,
            'description_english' => @$request->long_description_english,
            'description_german' => @$request->long_description_german,
            'product_page_url' => 'check-out',
        ]);

        if ($insert) {

            //insert file
            if($request->hasFile('product_file')) { 

                $this->validate($request, [

                    'product_file' => 'required|image|mimes:jpeg,png,jpg|max:2048',

                ]);

                $image = $request->file('product_file');
                //$input['imagename'] = time().@$insert->id.'_'.@$image->getClientOriginalName().'.'.@$image->getClientOriginalExtension();
                $input['imagename'] = time().@$insert->id.'_'.@$image->getClientOriginalName();

                $destinationPath = public_path('/images');

                $image->move($destinationPath, $input['imagename']);

                $update = Product::where('id', @$insert->id)->update(['image_path' => @$input['imagename']]);

                 //dd($request->file('product_file'));
            }

            //insert file
            if($request->file('otherImages')) {  
               // dd($request->input());

                 $array_image = explode(',',$request->removed_files[0]);

                foreach ($request->file('otherImages') as $key => $value) { 

                    if(! in_array($value->getClientOriginalName(), $array_image)){

                    $other_image = $request->file('otherImages')[$key]; 
                    //$inputImage['imagename'] = time().@$insert->id.'_'.$value->getClientOriginalName().'.'.$value->getClientOriginalExtension();
                    $inputImage['imagename'] = time().@$insert->id.'_'.$value->getClientOriginalName();

                    $destinationPathImg = public_path('/images');

                    $other_image->move($destinationPathImg, $inputImage['imagename']);

                    $update = ProductImage::create(['product_id'=>$insert->id, 'image_path' => @$inputImage['imagename'] ]);

                   }
                }
            }
 
            //insert page format

            foreach ($request->page_format as $key_pf => $value_pf) {

                $page_format_data = [

                    'product_id' => $insert->id,
                    'paper_format' => $value_pf,
                ];

                $insert_pf = ProductPageFormat::create($page_format_data);
            }

            if (!empty($request->cover_setting)) {

                $data_ps_cover_setting = ['ps_product_id' => $insert->id, 'ps_cover_setting_id' => $request->cover_setting];
                $insert_ps_print_finishing = ProductCoverSetting::create($data_ps_cover_setting);
            }

            if ($request->cover_setting == 1) {

                foreach ($request->cover_color as $key_cc => $value_cc) {

                    $cover_color_data = [

                        'product_id' => $insert->id,
                        'color_id' => $value_cc,
                    ];

                    $insert_cc = ProductCoverColor::create($cover_color_data);

                }

            } else if ($request->cover_setting == 2) {

                foreach ($request->cover_color as $key_cc => $value_cc) {

                    $cover_color_data = [

                        'product_id' => $insert->id,
                        'color_id' => $value_cc,
                    ];

                    $insert_cc = ProductCoverColor::create($cover_color_data);

                }

                foreach ($request->cover_sheet as $key_cs => $value_cs) {

                    $cover_sheet_data = [

                        'product_id' => $insert->id,
                        'cover_sheet_id' => $value_cs,
                    ];

                    $insert_cs = ProductCoverSheet::create($cover_sheet_data);

                }

                foreach ($request->back_cover as $key_bc => $value_bc) {

                    $back_cover_data = [

                        'product_id' => $insert->id,
                        'back_cover_id' => $value_bc,
                    ];

                    $insert_bc = ProductBackSheet::create($back_cover_data);

                }
            }


            if ($request->paper_weight) {  // dd($request->paper_weight);

                foreach ($request->paper_weight as $key_pw => $value_pw) {

                    if ($value_pw) {

                        if (!empty($request['paper_weight'][$key_pw])) {

                            $paper_weight_data = [

                                'product_id' => $insert->id,
                                'paper_weight_id' => $request['paper_weight'][$key_pw],
                                'min_sheets' => $request['p_min_sheet'][$key_pw],
                                'max_sheets' => $request['p_max_sheet'][$key_pw],
                            ];
                        }
 }
                        //else if ($value_pw == 2) {

                    //     if (!empty($request['paper_weight'][1])) {

                    //         $paper_weight_data = [

                    //             'product_id' => $insert->id,
                    //             'paper_weight_id' => $request['paper_weight'][1],
                    //             'min_sheets' => $request['p_min_sheet'][1],
                    //             'max_sheets' => $request['p_max_sheet'][1],
                    //         ];
                    //     }
                    // }else if ($value_pw == 3) {

                    //     if (!empty($request['paper_weight'][2])) {

                    //         $paper_weight_data = [

                    //             'product_id' => $insert->id,
                    //             'paper_weight_id' => $request['paper_weight'][2],
                    //             'min_sheets' => $request['p_min_sheet'][2],
                    //             'max_sheets' => $request['p_max_sheet'][2],
                    //         ];
                    //     }
                    // }

                    if (!empty($paper_weight_data)) {

                        $insert_paper_weight = ProductPaperWeight::create($paper_weight_data);
                    }
                }
            }

            //print_finishing

            if (!empty($request->print_finishing)) {

                $data_ps_print_finishing = ['product_id' => $insert->id, 'print_finishing_id' => $request->print_finishing];
                $insert_ps_print_finishing = ProductPrintFinishing::create($data_ps_print_finishing);
            }

            if ($request->print_finishing == 2) {

                foreach ($request->art_list as $key_al => $value_al) {

                    $art_data = [

                        'ps_product_pf_id' => $insert_ps_print_finishing->id,
                        'ps_art_list_id' => $value_al,
                    ];

                    $insert_cc = ProductPrintFinishingArtList::create($art_data);

                }

            }


            if (!empty($request->sheet_start) && !empty($request->sheet_end) && !empty($request->product_price)) {

                foreach ($request->sheet_start as $key => $value) {

                    if ($request['product_price'][$key]) {


                        $price_data = [

                            'ps_product_id' => $insert->id,
                            'min_range' => $request['sheet_start'][$key],
                            'max_range' => $request['sheet_end'][$key],
                            'price' => $request['product_price'][$key],
                        ];

                        $store_attributes = ProductPrice::create($price_data);
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
        //

        $product = Product::find($id);

        $product_image = ProductImage::where(['product_id' => $id])->get();

        $pageFormat = PageFormat::where(['status'=> 1])->orderBy('id', 'ASC')->limit(20)->get();
        $slectedPageFormat = ProductPageFormat::where(['product_id'=> $id, 'status' => 1])->pluck('paper_format')->toArray();

        $coverSetting = CoverSetting::where('status', 1)->orderBy('id', 'DESC')->limit(20)->get();
        $coverSettingSelected = ProductCoverSetting::where(['ps_product_id'=> $id, 'status' => 1])->pluck('ps_cover_setting_id')->toArray();

        $coverColor = CoverColor::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get();
        $selectedCoverColor = ProductCoverColor::where(['product_id'=> $id, 'status'=> 1])->pluck('color_id')->toArray();

        $coverSheet = CoverSheet::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get();
        $selectedCoverSheet = ProductCoverSheet::where(['product_id'=> $id, 'status'=> 1])->pluck('cover_sheet_id')->toArray();

        $backCover = BackCovers::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get();
        $selectedBackCover = ProductBackSheet::where(['product_id'=> $id, 'status'=> 1])->pluck('back_cover_id')->toArray();

        $paperWeight = PaperWeight::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get();    //dd($paperWeight);
        $selectedPaperWeight = ProductPaperWeight::where(['product_id'=> $id, 'status'=> 1])->orderBy('paper_weight_id', 'ASC')->pluck('paper_weight_id')->toArray(); //dd($selectedPaperWeight);
        $selectedPaperWeightData = ProductPaperWeight::where(['product_id'=> $id, 'status'=> 1])->orderBy('paper_weight_id', 'ASC')->get()->toArray();

        $printFinishing = PrintFinishing::where('status', 1)->orderBy('id', 'DESC')->limit(20)->get();
        $selectedPrintFinishing = ProductPrintFinishing::where(['product_id'=> $id, 'status'=> 1])->pluck('print_finishing_id')->toArray();

 
        $artList = ArtList::where('status', 1)->orderBy('id', 'ASC')->limit(20)->get();
        if (!empty($selectedPrintFinishing[0])) {

            $selectedArtList = ProductPrintFinishingArtList::where(['ps_product_pf_id'=> $selectedPrintFinishing[0]])->pluck('ps_art_list_id')->toArray();
        }else{

            $selectedArtList = [];
        } 

        $product_price = ProductPrice::where(['ps_product_id' => $id])->get()->toArray();  //dd($product_price);

        return view('pages.admin.parameter.binding-edit', compact('id','product',  'pageFormat', 'slectedPageFormat', 'coverSetting', 'coverSettingSelected', 'coverColor', 'selectedCoverColor', 'coverSheet', 'selectedCoverSheet', 'selectedBackCover', 'backCover', 'printFinishing', 'selectedPrintFinishing', 'artList', 'selectedArtList', 'paperWeight', 'selectedPaperWeight', 'selectedPaperWeightData', 'product_price','product_image'));
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

        $product_id = $id;
        //
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

        $product = Product::find($id);

        if (!empty($product)) {

            $product->title_english = $request->name;
            $product->title_german = $request->name_in_dh;
            //$product->cover_weight = $request->cover_weight;
            $product->short_description_english = @$request->short_description_english;
            $product->short_description_german = @$request->short_description_german;
            $product->description_english = @$request->long_description_english;
            $product->description_german = @$request->long_description_german;
            $product->status = $active_status;
        }

        //update values
        $product->save();

        if ($id) {  //dd($id);  

            //update file
            if($request->hasFile('product_file')) {

                $this->validate($request, [

                    'product_file' => 'required|image|mimes:jpeg,png,jpg|max:2048',

                ]);
 
                $image = $request->file('product_file');
                // $input['imagename'] = time().@$id.'_'.@$image->getClientOriginalName().'.'.@$image->getClientOriginalExtension();
                $input['imagename'] = time().@$id.'_'.@$image->getClientOriginalName();


                $destinationPath = public_path('/images');

                $image->move($destinationPath, $input['imagename']);

                $product = Product::find($id)->image_path;  
                unlink(public_path()."\images\\".$product);

                $update = Product::where('id', @$id)->update(['image_path' => @$input['imagename']]);
            }
        
            //update more files  
            
          // dd(); 


            if($request->file('otherImages')) {   

                $array_image = explode(',',$request->removed_files[0]);

                foreach ($request->file('otherImages') as $key => $value) {   //dd($value->getClientOriginalName());

                    if(! in_array($value->getClientOriginalName(), $array_image)){

                    $other_image = $request->file('otherImages')[$key];    //dd(@$other_image->getClientOriginalName()); 
                    //$inputImage['imagename'] = time().@$id.'_'.@$value->getClientOriginalName().'.'.@$value->getClientOriginalExtension();
                    $inputImage['imagename'] = time().@$id.'_'.@$value->getClientOriginalName();



                    $destinationPathImg = public_path('/images');

                     $other_image->move($destinationPathImg, $inputImage['imagename']);

                     $update = ProductImage::create(['product_id'=>$id, 'image_path' => @$inputImage['imagename'] ]);

                    }
                }
            }

            //update page format

            $check_already_pf = ProductPageFormat::where(['product_id'=> $id])->update(['status' => 0]);


            foreach ($request->page_format as $key_pf => $value_pf) {

                $check_already_pf = ProductPageFormat::where(['product_id'=> $id, 'paper_format' => $value_pf])->first();
                if (!empty($check_already_pf)) {

                    $update = ProductPageFormat::where(['id'=> $check_already_pf->id])->update(['status'=> 1]);
                }else{

                    $page_format_data = [

                        'product_id' => $id,
                        'paper_format' => $value_pf,
                    ];

                    $insert_pf = ProductPageFormat::create($page_format_data);
                }
            }



            if (!empty($request->cover_setting)) {

                $checkPsPrint = ProductCoverSetting::where(['ps_product_id' => $id])->first();

                if (!empty($checkPsPrint)) {

                    $update_ps_print_finishing = ProductCoverSetting::where(['ps_product_id' => $id])->update(['ps_cover_setting_id' => $request->cover_setting]);
                }else{

                    $insert_ps_print_finishing = ProductCoverSetting::create(['ps_product_id' => $id, 'ps_cover_setting_id' => $request->cover_setting]);
                }

            }

            if ($request->cover_setting == 1) {

                $update = ProductCoverColor::where(['product_id'=> $id])->update(['status'=> 0]);

                foreach ($request->cover_color as $key_cc => $value_cc) {

                    $check_already_cc = ProductCoverColor::where(['product_id'=> $id, 'color_id'=>$value_cc])->first();

                    if (!empty($check_already_cc)) {

                        $update = ProductCoverColor::where(['id'=> $check_already_cc->id])->update(['status'=> 1]);
                    }else{


                        $cover_color_data = [

                            'product_id' => $id,
                            'color_id' => $value_cc,
                        ];

                        $insert_cc = ProductCoverColor::create($cover_color_data);
                    }

                }

            } else if ($request->cover_setting == 2) {

                $update = ProductCoverColor::where(['product_id'=> $id])->update(['status'=> 0]);

                foreach ($request->cover_color as $key_cc => $value_cc) {

                    $check_already_cc = ProductCoverColor::where(['product_id'=> $id, 'color_id'=>$value_cc])->first();

                    if (!empty($check_already_cc)) {

                        $update = ProductCoverColor::where(['id'=> $check_already_cc->id])->update(['status'=> 1]);
                    }else{


                        $cover_color_data = [

                            'product_id' => $insert->id,
                            'color_id' => $value_cc,
                        ];

                        $insert_cc = ProductCoverColor::create($cover_color_data);
                    }

                }


                // cover_sheet
                $update = ProductCoverSheet::where(['product_id'=> $id])->update(['status'=> 0]);

                foreach ($request->cover_sheet as $key_cs => $value_cs) {

                    $check_already_cs = ProductCoverSheet::where(['product_id'=> $id, 'cover_sheet_id'=>$value_cs])->first();

                    if (!empty($check_already_cs)) {

                        $update = ProductCoverSheet::where(['id'=> $check_already_cs->id])->update(['status'=> 1]);  
                    }else{


                        $cover_sheet_data = [

                           // 'product_id' => $insert->id,
                            'product_id' => $id,
                            'cover_sheet_id' => $value_cs,
                        ];

                        $insert_cs = ProductCoverSheet::create($cover_sheet_data);  
                    }

                }

                // back_cover
                $update = ProductBackSheet::where(['product_id'=> $id])->update(['status'=> 0]);

                foreach ($request->back_cover as $key_bc => $value_bc) {

                    $check_already_bc = ProductBackSheet::where(['product_id'=> $id, 'back_cover_id'=>$value_bc])->first();

                    if (!empty($check_already_bc)) {

                        $update = ProductBackSheet::where(['id'=> $check_already_bc->id])->update(['status'=> 1]);
                    }else{


                        $back_cover_data = [

                            //'product_id' => $insert->id,
                            'product_id' => $id,
                            'back_cover_id' => $value_bc,
                        ];

                        $insert_bc = ProductBackSheet::create($back_cover_data);
                    }

                }


            }


            $update = ProductPaperWeight::where(['product_id'=> $id])->update(['status'=> 0]);

            if ($request->paper_weight) {  

                foreach ($request->paper_weight as $key_pw => $value_pw) {  

                    $check_already_pw = ProductPaperWeight::where(['product_id'=> $id, 'paper_weight_id'=>$value_pw])->first();



                    if (!empty($check_already_pw)) {

                        //update
                        if ($value_pw) {

                            $paper_weight_data = [

                                'product_id' => $id,
                                'paper_weight_id' => $request['paper_weight'][$key_pw],
                                'min_sheets' => $request['p_min_sheet'][$key_pw],
                                'max_sheets' => $request['p_max_sheet'][$key_pw],
                                'status' => 1,
                            ];   

                        }
                        // else if ($value_pw == 2) {

                        //     $paper_weight_data = [

                        //         'product_id' => $id,
                        //         'paper_weight_id' => $request['paper_weight'][1],
                        //         'min_sheets' => $request['p_min_sheet'][1],
                        //         'max_sheets' => $request['p_max_sheet'][1],
                        //         'status' => 1,
                        //     ];
                        // }else if ($value_pw == 3) {

                        //     $paper_weight_data = [

                        //         'product_id' => $id,
                        //         'paper_weight_id' => $request['paper_weight'][2],
                        //         'min_sheets' => $request['p_min_sheet'][2],
                        //         'max_sheets' => $request['p_max_sheet'][2],
                        //         'status' => 1,
                        //     ];
                        // }

                        if (!empty($paper_weight_data)) {   

                            $update_paper_weight = ProductPaperWeight::where(['id'=> $check_already_pw->id])->update($paper_weight_data);
                        }

                    }else{

                        if ($value_pw) {

                            $paper_weight_data = [

                                'product_id' => $id,
                                'paper_weight_id' => $request['paper_weight'][$key_pw],
                                'min_sheets' => $request['p_min_sheet'][$key_pw],
                                'max_sheets' => $request['p_max_sheet'][$key_pw],
                            ];

                        }
                        // else if ($value_pw == 2) {

                        //     $paper_weight_data = [

                        //         'product_id' => $id,
                        //         'paper_weight_id' => $request['paper_weight'][1],
                        //         'min_sheets' => $request['p_min_sheet'][1],
                        //         'max_sheets' => $request['p_max_sheet'][1],
                        //     ];
                        // }else if ($value_pw == 3) {

                        //     $paper_weight_data = [

                        //         'product_id' => $id,
                        //         'paper_weight_id' => $request['paper_weight'][2],
                        //         'min_sheets' => $request['p_min_sheet'][2],
                        //         'max_sheets' => $request['p_max_sheet'][2],
                        //     ];
                        // }

                        if (!empty($paper_weight_data)) {

                            $insert_paper_weight = ProductPaperWeight::create($paper_weight_data);
                        }

                    }
                }
            }


            //print_finishing
            if (!empty($request->print_finishing)) { 

                $getId = ProductPrintFinishing::where(['product_id'=> $id])->first();   
                $update_ps_print_finishing = ProductPrintFinishing::where(['product_id'=> $id])->update(['print_finishing_id'=> $request->print_finishing]);  

                // if( $getId == null){ 

                //     $data_ps_print_finishing = ['product_id' => $id, 'print_finishing_id' => $request->print_finishing];
                //     $insert_ps_print_finishing = ProductPrintFinishing::create($data_ps_print_finishing);

                // }
            }

            if (!empty($getId)) {    

                $update = ProductPrintFinishingArtList::where(['ps_product_pf_id'=> $getId->id])->update(['status'=> 0]);

            }else if($getId == null){

                $data_ps_print_finishing = ['product_id' => $id, 'print_finishing_id' => $request->print_finishing];
                $insert_ps_print_finishing = ProductPrintFinishing::create($data_ps_print_finishing);

                if ($request->print_finishing == 2) {  //dd($insert_ps_print_finishing->id);

                    foreach ($request->art_list as $key_al => $value_al) {   

                        $check_already_al = ProductPrintFinishingArtList::where(['ps_product_pf_id'=> $insert_ps_print_finishing->id, 'ps_art_list_id'=>$value_al])->first();

                        if (!empty($check_already_al)) {

                            $update = ProductPrintFinishingArtList::where(['id'=> $check_already_al->id])->update(['status'=> 1]);
                        }else{

                            $art_data = [

                        //'ps_product_pf_id' => $getId->id,
                                'ps_product_pf_id' => $id,
                                'ps_art_list_id' => $value_al,
                            ];

                            $insert_cc = ProductPrintFinishingArtList::create($art_data);
                        }

                    }

                }

            } 


            
         


            if (!empty($request->sheet_start) && !empty($request->sheet_end) && !empty($request->product_price)) {

                foreach ($request->sheet_start as $key => $value) {

                    if( !empty($request['sheet_start'][$key]) && !empty($request['product_price'][$key]) ) {

                        if (!empty($request['product_price_id'][$key])) {

                            $check_already_price = ProductPrice::find($request['product_price_id'][$key]);
                            
                        }else{

                            $check_already_price = [];
                        }

                        if(!empty($check_already_price)){   //dd("1:".$product_id );

                            $check_already_price->ps_product_id =  $product_id;   //$request['product_price_id'][$key]
                            $check_already_price->min_range =  $request['sheet_start'][$key];
                            $check_already_price->max_range =  $request['sheet_end'][$key];
                            $check_already_price->price =  $request['product_price'][$key];

                            $check_already_price->save();
                        }else{   //dd("2:".$product_id );

                            $attr_data = [

                                'ps_product_id' => $product_id, 
                                'min_range' => $request['sheet_start'][$key],
                                'max_range' => $request['sheet_end'][$key],
                                'price' => $request['product_price'][$key],
                            ];
                            
                            $store_attributes = ProductPrice::create($attr_data);
                        }
                    }
                    
                }

            }
        }
        return redirect()->back()->with('status', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $product = Product::where(['id' => $id])->update(['status' => 0]);   // using soft delete
       // $Product = Product::destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }


    public function removeProductImage(Request $request){

       ProductImage::find($request->rid)->delete();

       unlink(public_path()."/images/".$request->path);

       echo "success";

    } 
}
  