<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCateogryController extends Controller
{
    public function index(){
        return view("admin.category.index");
    }
}
