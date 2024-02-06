<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Image;
use App\Models\BlogImage;
use Illuminate\Support\Str;
use App\Models\BlogImageDes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBlogImageController extends Controller
{
    public function index(Request $request){

        // $data = BlogImage::paginate(15);
        $query = BlogImage::query();
        // if have search value
        if($request->search){
            $queryString = $request->search;
            $query->where('title', 'LIKE', "%$queryString%");
        }
        $data = $query->orderBy('id','desc')->paginate(15);
        // dd($data);
        return view('admin.blog.index',compact('data'));
    }

    public function create(){
        return view('admin.blog.create');
    }

    public function store(Request $request){

        $dataObj = new BlogImage;
        $dataObj->title = @$request->title;
        $dataObj->slug = Str::slug(@$request->title, "-");
        $dataObj->status = 1;
        $dataObj->created_by = Auth::id();
 
        if($request->file('image')){
            $get_image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$get_image->getClientOriginalExtension(); // 1221343.jpg

            Image::make($get_image)->resize(1440,1290)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
            $dataObj->image = $save_url;
        }

        $dataObj->save();
          // message 
        $notification = array(
            'message' => 'Data has been save!',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.blog.image.create')->with($notification);
    }

    public function editBlogImage($id){
        // $id = Auth::user()->id;
        // $viewAdminData = User::find($id);
        $data = BlogImage::find($id);
        // dd($data);
        return view('admin.blog.edit', compact("data"));
    }

    public function updateBlogImage(Request $request){

        $id_blog = $request->id;

        $data = BlogImage::find($id_blog);


        $data->title = $request->title;

        
        // Have been image
        if($request->file('image')){
            
            $file = $request->file('image');

            $get_image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$get_image->getClientOriginalExtension(); // 1221343.jpg

            Image::make($get_image)->resize(1440,1290)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
            $data['image'] = $save_url;
        }
        $data->save();
        $notification = array(
            'message' => 'Data has been update!',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.blog.image')->with($notification);

    }

    public function editBlogImageDetail($id){
        $data = BlogImageDes::where('bloge_image_id',$id)->first();
        // dd($data);
        if($data != null){
            // view data
        }else{
            $dataObj = new BlogImageDes;
            $dataObj->bloge_image_id = @$id;
            $dataObj->created_by = Auth::id();
            $dataObj->save();
        }

        return view('admin.blog.detail.edit', compact("data"));
    }

    public function updateBlogImageDetail(Request $request){

        $id_blog_des = $request->bloge_image_id;

        $data = BlogImageDes::find($id_blog_des);


        $data->title = $request->title;
        $data->dec = $request->dec;

        
        // Have been image
        if($request->file('image')){
            
            $file = $request->file('image');

            $get_image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$get_image->getClientOriginalExtension(); // 1221343.jpg

            Image::make($get_image)->resize(1440,1290)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
            $data['image'] = $save_url;
        }
        $data->save();
        $notification = array(
            'message' => 'Data has been update!',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.blog.image')->with($notification);

    }

    // Inactive
    public function blogInactive($id){
        BlogImage::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification = array(
            'message' => 'Data has been disabled!',
            'alert-type' => 'warning'
        );
        return redirect()->route('admin.blog.image')->with($notification);
    }
     // Active
     public function blogactive($id){
        BlogImage::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification = array(
            'message' => 'Data has been Active!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.image')->with($notification);
    }
}
