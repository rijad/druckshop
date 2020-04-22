<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FrequentlyAskedQuestion;
use Illuminate\Support\Facades\Validator;

class FAQController extends Controller
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
        $faq = FrequentlyAskedQuestion::all();
        return view('pages.admin.faq.index', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['faq'] = FrequentlyAskedQuestion::where('status', '1')->get();
        return view('pages.admin.faq.create');
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
            'title_english' => 'required',
            'title_german' => 'required',
            'text_english' => 'required',
            'text_german' => 'required',
        ]);
        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $faq = FrequentlyAskedQuestion::create([
            'title_english' => trim(@$request->title_english),
            'title_german' => trim(@$request->title_german),
            'text_english' => trim(@$request->text_english),
            'text_german' => trim(@$request->text_german),
        ]);

        return redirect('/admin/FAQ');
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
        $faq = FrequentlyAskedQuestion::find($id);
        return view('pages.admin.faq.edit', compact('faq'));
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
        $faq = FrequentlyAskedQuestion::find($id);

        $validator = Validator::make($request->all(), [
            'title_english' => 'required',
            'title_german' => 'required',
            'text_english' => 'required',
            'text_german' => 'required',
        ]);
        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        $faq->title_english = trim($request->title_english);
        $faq->title_german = trim($request->title_german);
        $faq->text_english = trim($request->text_english);
        $faq->text_german = trim($request->text_german);

        $faq->save();

        return redirect('/admin/FAQ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = FrequentlyAskedQuestion::destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
