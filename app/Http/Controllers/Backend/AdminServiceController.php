<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminServiceController extends Controller
{
    //
    public function index(Request $request){
         // $data = BlogImage::paginate(15);
         $query = Service::query();
         // if have search value
         if(@$request->search){
             $queryString = $request->search;
             $query->where('title', 'LIKE', "%$queryString%");
         }
         $data = $query->orderBy('id','desc')->paginate(15);
        //  dd($data);
        return view('admin.service.index', compact('data'));
    }

    public function create(){
        return view('admin.service.create');
    }

    public function store(Request $request){

        $dataObj = new Service;
        $dataObj->title = @$request->title;
        $dataObj->icon = @$request->icon;
        $dataObj->des = @$request->des;
        $dataObj->status = 1;

        $dataObj->save();
          // message 
        $notification = array(
            'message' => 'Data has been save!',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.service.create')->with($notification);
    }

    public function editService($id){
        $data = Service::find($id);
        // dd($data);
        return view('admin.service.edit', compact("data"));
    }
    
    public function updateService(Request $request){
        $id_service = $request->id;
        $data = Service::find($id_service);
        $data->title = $request->title;
        $data->icon = $request->icon;
        $data->des = $request->des;
        $data->save();

        $notification = array(
            'message' => 'Data has been update!',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.service.index')->with($notification);
    }

    // Inactive
    public function serviceInactive($id){
        Service::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification = array(
            'message' => 'Data has been disabled!',
            'alert-type' => 'warning'
        );
        return redirect()->route('admin.service.index')->with($notification);
    }
     // Active
     public function serviceActive($id){
        Service::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification = array(
            'message' => 'Data has been Active!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.service.index')->with($notification);
    }
}
