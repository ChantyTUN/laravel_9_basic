<?php

namespace App\Http\Controllers\Frontend;

use App\Models\BlogImage;
use App\Models\BlogImageDes;
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

    public function blogdetail(Request $request){
        $blog = BlogImage::where('id',$request->id)->where('status',1)->first();
        $blogDetail = BlogImageDes::where('bloge_image_id',$request->id)->first();
        // dd($blogDetail);
        // $blog = '';
        return view('frontend.blog_detail', compact('blog','blogDetail'));
    }

    public function service(Request $request){
        return view('frontend.service.index');
    }
}
