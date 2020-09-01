<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\NewsLetter;

class NewsLetterController extends Controller
{
    public function sendData(Request $request){   
 
    	$newsLetter = new NewsLetter;
        $newsLetter->email = $request->email;
        $newsLetter->status = 1;
        $newsLetter->save();

        return redirect()->back()->with('success', 'Thank You For Subscription'); 

    }
}
