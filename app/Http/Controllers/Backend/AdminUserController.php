<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(Request $request){
          // $data = BlogImage::paginate(15);
          $query = User::query();
          // if have search value
          if(@$request->search){
              $queryString = $request->search;
              $query->where('name', 'LIKE', "%$queryString%");
          }
          $data = $query->orderBy('id','desc')->paginate(15);
        //   dd($data);
        return view("admin.users.index", compact("data"));
    }

    public function create(){
        return view("admin.users.create");
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users|max:255',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation as needed
            'password' => 'required|string|min:8|confirmed', // Ensure password confirmation field is named password_confirmation
        ]);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/upload/admin_images'), $imageName);
            $profileImagePath = 'backend/upload/admin_images/' . $imageName;
        } else {
            $profileImagePath = null;
        }

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->profile_image = $profileImagePath;
        $user->password = Hash::make($request->password);
        $user->save();
        
        $notification = array(
            'message' => 'Data has been save!',
            'alert-type' => 'info'
        );
    
        return redirect()->route('admin.user')->with($notification);
    }

    public function edit($id){
        $data = User::find($id);
        // dd($data);
        return view('admin.users.edit', compact("data"));
    }

    public function update(Request $request){
        $id_user = $request->id;

        $data = User::find($id_user);

        $data->name = @$request->name;
        $data->username = @$request->username;
        $data->email = @$request->email;
        
        // Have been image
        if($request->file('profile_image')){
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/upload/admin_images'), $imageName);
            $profileImagePath = 'backend/upload/admin_images/' . $imageName;
            $data['profile_image'] = $profileImagePath;
        }

        if($request->password){
            $data['password'] = Hash::make($request->password);;
        }
        $data->save();

        $notification = array(
            'message' => 'Data has been update!',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.user')->with($notification);

    }
}
