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

    public function storeDetail(Request $request){

        $validatedData = $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust validation rules as per your needs
        ]);
    
        $cate_id = @$request->category_id;
        // dd($cate_id);
        foreach ($request->file('images') as $image) {
            $imageName = Str::uuid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
    
            CategoryDetail::create([
                'category_id' => @$cate_id,
                'image' => 'images/' . $imageName, // Assuming 'images' is a folder within the public directory
            ]);
        }

        $notification = array(
            'message' => 'Data has been save!',
            'alert-type' => 'info'
        );
    
        return redirect()->route('admin.category.index')->with($notification);
    }
}
