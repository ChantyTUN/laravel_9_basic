<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\HomeInformation;
use App\Http\Controllers\Controller;

class AdminHomeInformationController extends Controller
{
    public function index(){
        $homepage = HomeInformation::find(1);
        // dd($homepage);
        return view('admin.homepage.index', compact('homepage'));
    }
    public function store(Request $request){
        $homePageId = $request->id;
        if($homePageId){
            HomeInformation::findOrFail($homePageId)->update([
                'short_title' => $request->short_title,
                'long_title' => $request->long_title,
                'url' => $request->url,
            ]);
    
            // message 
            $notification = array(
                'message' => 'Data has been save!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }else{
             // message 
         $notification = array(
            'message' => 'Please try again!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
        }

    }
}
