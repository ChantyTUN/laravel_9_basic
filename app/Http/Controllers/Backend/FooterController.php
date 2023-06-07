<?php

namespace App\Http\Controllers\Backend;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    public function index(){
        $footer = Footer::find(1);
        // dd($homepage);
        return view('admin.footer.index', compact('footer'));
    }
    public function store(Request $request){
        $footer_id = $request->id;
        if($footer_id){
            Footer::findOrFail($footer_id)->update([
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'instragram' => $request->instragram,
                'inkedin' => $request->inkedin,
                'copyright_by' => $request->copyright_by,
                'designed_by' => $request->designed_by
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
