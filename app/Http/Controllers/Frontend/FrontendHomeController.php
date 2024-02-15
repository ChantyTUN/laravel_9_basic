<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Message;
use App\Models\Service;
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
        $services = Service::where('status',1)->get();
        // dd($dataHome);
        return view('frontend.service.index', compact("services"));
    }

    public function contact(){
        return view("frontend.contact.index");
    }

    public function contactStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',

            // 'name' => @$request->name,
            // 'email' => @$request->email,
            // 'subject' => @$request->subject,
            // 'message' => @$request->message,
        ]);

        Message::create([
            'name'      => @$request->name,
            'email'     => @$request->email,
            'subject'   => @$request->subject,
            'message'   => @$request->message,
            'status'    => 0,
        ]);
        return redirect()->route('frontend.contact')->with("success", "Message send successfully!");
    }
}
