<?php

namespace App\Http\Controllers\Frontend;

use App\Models\BlogImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendHomeController extends Controller
{
    //
    public function homepage(){
        $dataHome = BlogImage::where('status',1)->get();
        // dd($dataHome);
        return view('frontend.index', compact('dataHome'));
    }
}
