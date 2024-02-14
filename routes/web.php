<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\AdminServiceController;
use App\Http\Controllers\Frontend\FrontendHomeController;
use App\Http\Controllers\Backend\AdminBlogImageController;
use App\Http\Controllers\Backend\AdminTestimonnailsController;
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
// frontend 
// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/', [FrontendHomeController::class, 'homepage'])->name('frontend.homepage');
Route::get('/frontend/blog-detail/{id}-{slug}', [FrontendHomeController::class, 'blogdetail']);
Route::get('/frontend/services', [FrontendHomeController::class, 'service'])->name('frontend.service');


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
// Backend Home Page
Route::controller(AdminHomeInformationController::class)->group(function (){
    Route::get('/admin/home-page-information','index')->name('admin.home.page.information');
    Route::post('/admin/store/home-page-information','store')->name('admin.store.home.page.information');
});

// Backend Blog Page
Route::controller(AdminBlogImageController::class)->group(function (){
    Route::get('/admin/blog-images','index')->name('admin.blog.image');
    Route::get('/admin/blog-images-create','create')->name('admin.blog.image.create');
    Route::post('/admin/blog-images-store','store')->name('admin.blog.image.store');

    Route::get('/admin/blog-images-edit/{id}','editBlogImage')->name('admin.blog.edit');
    Route::post('/admin/blog-images-update','updateBlogImage')->name('admin.update.blog.image');

    Route::get('/admin/blog-images-inactive/{id}','blogInactive')->name('admin.blog.image.inactive');
    Route::get('/admin/blog-images-active/{id}','blogactive')->name('admin.blog.image.active');

    
    Route::get('/admin/blog-images-detail-edit/{id}','editBlogImageDetail')->name('admin.blog.detail');
    Route::post('/admin/blog-images--detail-update','updateBlogImageDetail')->name('admin.update.blog.detail');

   
    // Route::post('/admin/store/home-page-information','store')->name('admin.store.home.page.information');
});

// Backend Service Page
Route::controller(AdminServiceController::class)->group(function (){
    Route::get('/admin/service','index')->name('admin.service.index');
    Route::get('/admin/service-create','create')->name('admin.service.create');
    Route::post('/admin/service-store','store')->name('admin.service.store');

    Route::get('/admin/service-edit/{id}','editService')->name('admin.service.edit');
    Route::post('/admin/service-update','updateService')->name('admin.service.update');

    Route::get('/admin/service-inactive/{id}','serviceInactive')->name('admin.service.inactive');
    Route::get('/admin/service-active/{id}','serviceActive')->name('admin.service.active');

    
    // Route::get('/admin/blog-images-detail-edit/{id}','editBlogImageDetail')->name('admin.blog.detail');
    // Route::post('/admin/blog-images--detail-update','updateBlogImageDetail')->name('admin.update.blog.detail');

   
    // Route::post('/admin/store/home-page-information','store')->name('admin.store.home.page.information');
});

// Backend Testimonail Page
Route::controller(AdminTestimonnailsController::class)->group(function (){
    Route::get('/admin/testimonail','index')->name('admin.testimonail.index');
    Route::get('/admin/testimonail-create','create')->name('admin.testimonail.create');
    Route::post('/admin/testimonail-store','store')->name('admin.testimonail.store');

    Route::get('/admin/testimonail-edit/{id}','edittestimonail')->name('admin.testimonail.edit');
    Route::post('/admin/testimonail-update','updatetestimonail')->name('admin.update.testimonail');

    Route::get('/admin/testimonail-inactive/{id}','testimonailInactive')->name('admin.testimonail.inactive');
    Route::get('/admin/testimonail-active/{id}','testimonailactive')->name('admin.testimonail.active');
});




// Backend Footer 
Route::controller(FooterController::class)->group(function (){
    Route::get('/admin/footer','index')->name('admin.footer');
    Route::post('/admin/store/footer','store')->name('admin.store.footer');
});




require __DIR__.'/auth.php';
