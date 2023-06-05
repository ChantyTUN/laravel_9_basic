<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminHomeInformationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(DemoController::class)->group(function (){
    Route::get('/about','index')->name('page.about');
    Route::get('/contact','contact')->name('page.contact');
});


Route::controller(AdminController::class)->group(function (){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/view-profile','viewProfile')->name('admin.view.profile');
    Route::get('/admin/edit-profile','editProfile')->name('admin.edit.profile');
    Route::post('/admin/update-profile','updateProfile')->name('admin.update.profile');
    Route::get('/admin/change-password-profile','changePasswordProfile')->name('admin.change.password.profile');
    Route::post('/admin/update-password-profile','updatePasswordProfile')->name('admin.update.password.profile');

});

Route::controller(AdminHomeInformationController::class)->group(function (){
    Route::get('/admin/home-page-information','index')->name('admin.home.page.information');
    Route::post('/admin/store/home-page-information','store')->name('admin.store.home.page.information');
});




require __DIR__.'/auth.php';
