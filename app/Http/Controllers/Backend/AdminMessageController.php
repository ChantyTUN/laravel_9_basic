<?php

namespace App\Http\Controllers\Backend;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminMessageController extends Controller
{
    public function index(Request $request){
         // $data = BlogImage::paginate(15);
         $query = Message::query();
         // if have search value
         if(@$request->search){
             $queryString = $request->search;
             $query->where('name', 'LIKE', "%$queryString%");
             $query->orwhere('email', 'LIKE', "%$queryString%");
         }
         $data = $query->orderBy('id','desc')->paginate(15);
        //  dd($data);
        return view("admin.contact.message", compact("data"));
    }
}
