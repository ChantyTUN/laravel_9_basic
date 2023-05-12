<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about-us',[DemoController::class, 'index']);
// Route::get('/contact',[DemoController::class, 'contact']);

Route::controller(DemoController::class)->group(function (){
    Route::get('/about-usasdasdasd','index')->name('page.about');
    Route::get('/contact','contact')->name('page.contact');
});

// Route::get('/about-us', function () {
//    return view('about-us');
// });

// Route::get('/contact', function () {
//    return view('contact');
// });


