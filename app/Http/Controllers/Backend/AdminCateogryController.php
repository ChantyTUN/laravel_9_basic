<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryDetail;
use App\Http\Controllers\Controller;

class AdminCateogryController extends Controller
{
    public function index(Request $request){
         $query = Category::query();
         // if have search value
         if(@$request->search){
             $queryString = $request->search;
             $query->where('category', 'LIKE', "%$queryString%");
         }
         $categories = $query->orderBy('id','desc')->paginate(15);
       //   dd($data);
        return view("admin.category.index", compact("categories"));
    }

    public function create(){
        return view("admin.category.create");
    }

    public function store(Request $request){
        $request->validate([
            'category' => 'required|string|max:255',
            'text' => 'required|string',
            'status' => 'required|boolean',
        ]);
    
        $category = Category::create([
            'category' => @$request->category,
            'text' => @$request->text,
            'status' => @$request->status,
            'created_at' => Carbon::now(),
            'created_by' => Auth::id()
        ]);

        $notification = array(
            'message' => 'Data has been save!',
            'alert-type' => 'info'
        );
    
        return redirect()->route('admin.category.index')->with($notification);
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        $categoryDetail = CategoryDetail::where('category_id',$id)->get();
        // dd($categoryDetail);
        return view('admin.category.edit', compact('category','categoryDetail'));
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->update($request->all());
        $notification = array(
            'message' => 'Data has been updated!',
            'alert-type' => 'info'
        );
    
        return redirect()->route('admin.category.index')->with($notification);
    }

    public function storeDetail(Request $request){

        $validatedData = $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust validation rules as per your needs
        ]);
    
        $cate_id = @$request->category_id;
        if($request->has("images")){
            foreach ($request->file('images') as $image) {
                $imageName = Str::uuid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
        
                CategoryDetail::create([
                    'category_id' => @$cate_id,
                    'image' => 'images/' . $imageName, // Assuming 'images' is a folder within the public directory
                    'created_by' => Auth::id()
                ]);
            }
        }

        if($request->has("old_image_id")){
            // dd($request->all());
            foreach($request->old_image_id as $id){
                $deleted= CategoryDetail::where("id",$id)->first();
                $deleted->delete();
            }
        }

        $notification = array(
            'message' => 'Data has been save!',
            'alert-type' => 'info'
        );
    
        return redirect()->route('admin.category.index')->with($notification);
    }
}
