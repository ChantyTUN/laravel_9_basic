<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTestimonnailsController extends Controller
{
    //
    public function index(Request $request){
          // $data = BlogImage::paginate(15);
          $query = Testimonail::query();
          // if have search value
          if(@$request->search){
              $queryString = $request->search;
              $query->where('name', 'LIKE', "%$queryString%");
          }
          $data = $query->orderBy('id','desc')->paginate(15);
        //   dd($data);
        return view("admin.testimonail.index", compact("data"));
    }
}
