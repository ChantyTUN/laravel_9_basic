<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminServiceController extends Controller
{
    //
    public function index(Request $request){
         // $data = BlogImage::paginate(15);
         $query = Service::query();
         // if have search value
         if(@$request->search){
             $queryString = $request->search;
             $query->where('title', 'LIKE', "%$queryString%");
         }
         $data = $query->orderBy('id','desc')->paginate(15);
        //  dd($data);
        return view('admin.service.index', compact('data'));
    }
}
