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
}
