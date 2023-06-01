<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AdminController extends Controller
{
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // message 
        $notification = array(
            'message' => 'Logout Success!',
            'alert-type' => 'error'
        );

        return redirect('/login')->with($notification);
    }

    // view profile 
    public function viewProfile(){
        $id = Auth::user()->id;
        $viewAdminData = User::find($id);
        // dd($viewAdminData);
        return view('admin.view_profile', compact("viewAdminData"));
    }
    
    // edit profile
    public function editProfile(){
        $id = Auth::user()->id;
        $viewAdminData = User::find($id);
        // dd($viewAdminData);
        return view('admin.edit_profile', compact("viewAdminData"));
    }

    // update profile with Auth
    public function updateProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        
        // Have been image
        if($request->file('profile_image')){
            
            $file = $request->file('profile_image');

            // get name image
            $fileName = date('YmdHi').$file->getClientOriginalName();
            // move file to folder project
            $file->move(public_path('backend/upload/admin_images'),$fileName);
            // save file to table 
            $data['profile_image'] = $fileName;
        }
        // save to table
        $data->save();

        // message 
        $notification = array(
            'message' => 'Data has been save!',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.view.profile')->with($notification);
    }

    // get edit password 
    public function changePasswordProfile(){
        return view('admin.change_password_profile');
    }

    // update password
    public function updatePasswordProfile(Request $request){
        // validation data input
        $validateObjData = $request->validate(
            [
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'confirm_password' => 'required|same:newpassword',
            ]);
        // check old password
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            // update password
            $user->password = bcrypt($request->newpassword); // 12345678 // sdfahdsfa234
            $user->save();

            // message 
            $notification = array(
                'message' => 'Data has been save!',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }
    }
}
