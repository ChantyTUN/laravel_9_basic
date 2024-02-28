<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CategoryDetail;
use App\Http\Controllers\Controller;

class AdminCateogryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','desc')->paginate(15);;
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
        // dd($category);
        return view('admin.category.edit', compact('category'));
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

    ///////////////// category detail /////////////////
    public function index_detail(){
        return view("admin.category.detail.index");
    }

    public function create_detail(){
        $categories = Category::all();
        return view("admin.category.detail.create", compact("categories"));
    }

    public function store_detail(Request $request){
        $request->validate([
            'category_id' => 'required|exists:categories,id', // Validate that the selected category exists in the categories table
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming 2048KB (2MB) is your maximum file size
        ]);

        $categoryDetail = new CategoryDetail();
        $categoryDetail->category_id = $request->input('category_id');
        
        $imageNames = [];
        if ($request->hasFile('images')) {
            $imageName = [] ;
            foreach ($request->file('images') as $image) {
                // Upload each image
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('upload/category'), $imageName);
                // Add image path to the array
                $imageNames[] = $imageName;
            }
        }
        // Save the array of image paths
        $categoryDetail->images = $imageNames;
        $categoryDetail->save();

        $notification = array(
            'message' => 'Data has been updated!',
            'alert-type' => 'info'
        );
    
        return redirect()->route('admin.category.index')->with($notification);
    }


}
