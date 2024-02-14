<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Image;
use App\Models\Testimonail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTestimonnailsController extends Controller
{
    //
    public function index(Request $request){
          // $data = BlogImage::paginate(15);
          $query = Testimonail::query();
          // if have search value
          if(@$request->search){
              $queryString = $request->search;
              $query->where('name', 'LIKE', "%$queryString%");
          }
          $data = $query->orderBy('id','desc')->paginate(15);
        //   dd($data);
        return view("admin.testimonail.index", compact("data"));
    }

    public function create(){
        return view("admin.testimonail.create");
    }

    public function store(Request $request){

        $dataObj = new Testimonail;
        $dataObj->name = @$request->name;
        $dataObj->rate = @$request->rate;
        $dataObj->position = @$request->position;
        $dataObj->dec = @$request->dec;
        $dataObj->status = 1;
        $dataObj->created_by = Auth::id();
 
        if($request->file('image')){
            $get_image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$get_image->getClientOriginalExtension(); // 1221343.jpg

            Image::make($get_image)->resize(400,400)->save('upload/testimonail/'.$name_gen);
            $save_url = 'upload/testimonail/'.$name_gen;
            $dataObj->image = $save_url;
        }

        $dataObj->save();
        // dd($dataObj);
          // message 
        $notification = array(
            'message' => 'Data has been save!',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.testimonail.create')->with($notification);

    }

    public function edittestimonail($id){
        $data = Testimonail::find($id);
        // dd($data);
        return view('admin.testimonail.edit', compact("data"));
    }

    public function updatetestimonail(Request $request){
        $id_test = $request->id;

        $data = Testimonail::find($id_test);

        $data->name = @$request->name;
        $data->rate = @$request->rate;
        $data->position = @$request->position;
        $data->dec = @$request->dec;
        
        // Have been image
        if($request->file('image')){
            
            $file = $request->file('image');

            $get_image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$get_image->getClientOriginalExtension(); // 1221343.jpg

            Image::make($get_image)->resize(400,400)->save('upload/testimonail/'.$name_gen);
            $save_url = 'upload/testimonail/'.$name_gen;
            $data['image'] = $save_url;
        }
        $data->save();

        $notification = array(
            'message' => 'Data has been update!',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.testimonail.index')->with($notification);

    }


     // Inactive
     public function testimonailInactive($id){
        Testimonail::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification = array(
            'message' => 'Data has been disabled!',
            'alert-type' => 'warning'
        );
        return redirect()->route('admin.testimonail.index')->with($notification);
    }
     // Active
     public function testimonailactive($id){
        Testimonail::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification = array(
            'message' => 'Data has been Active!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.testimonail.index')->with($notification);
    }


}
