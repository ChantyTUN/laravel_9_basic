<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\HomeInformation;
use App\Http\Controllers\Controller;

class AdminHomeInformationController extends Controller
{
    public function index(){
        $homepage = HomeInformation::find(1);
        dd($homepage);
        return view('admin.homepage.index', compact('homepage'));
    }
}
