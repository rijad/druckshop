<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FrequentlyAskedQuestion;
use Illuminate\Support\Facades\Validator;

class FAQController extends Controller
{
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
            'title_english' => $request->title_english,
            'title_german' => $request->title_german,
            'text_english' => $request->text_english,
            'text_german' => $request->text_german,
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
        $faq->title_english = $request->title_english;
        $faq->title_german = $request->title_german;
        $faq->text_english = $request->text_english;
        $faq->text_german = $request->text_german;

        $faq->save();

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
        $faq = FrequentlyAskedQuestion::destroy($id);
        return redirect()->back()->with('status' , 'Deleted');
    }
}
