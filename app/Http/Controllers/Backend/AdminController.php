<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

        return redirect('/login');
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
        return redirect()->route('admin.view.profile');
    }
}
