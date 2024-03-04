<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
