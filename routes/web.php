<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\HomeSliderController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/auth.php';

// Route::resource('admin', AdminController::class);

//* Admin
Route::get('admin/destroy',[AdminController::class,'destroy'])->name('admin.destroy');
Route::get('profile',[AdminController::class,'create'])->name('adminProfile');
Route::get('profile/edit',[AdminController::class,'edit'])->name('profileEdit');
Route::post('profile/store',[AdminController::class,'store'])->name('profileStore');
Route::get('update',[AdminController::class,'update'])->name('update');
Route::post('password/update',[AdminController::class,'passwordUpdate'])->name('passwordUpdate');
Route::get('blog.contact',[AdminController::class,'contact'])->name('blog.contact.info');

Route::get('auth/profile',[AdminController::class,'profile']);

Route::get('homeSlider',[HomeSliderController::class,'homeSlider'])->name('slider');
Route::post('slider/update/{id}',[HomeSliderController::class,'store'])->name('slider.store');

//* Frontend
Route::get('/',[frontendController::class,'index'])->name('index');
Route::get('about/page',[frontendController::class,'aboutShow'])->name('about.page');
Route::get('blog/page',[frontendController::class,'blogShow'])->name('blog.page');
Route::get('blog/detail/{id}',[frontendController::class,'detail'])->name('blog.detail');
Route::get('blog/contact/',[frontendController::class,'contact'])->name('blog.contact');
Route::post('blog/contact/store',[frontendController::class,'store'])->name('blog.contact.store');

//* About Us
Route::get('about',[AboutController::class,'about'])->name('about');
Route::post('about/update',[AboutController::class,'update'])->name('about.update');
Route::get('multi/index',[AboutController::class,'index'])->name('index.multi.image');
Route::get('multi/image/create',[AboutController::class,'create'])->name('about.multi.image');
Route::post('about/multi/image/store',[AboutController::class,'store'])->name('multi.image.store');
Route::get('multi/image/edit/{id}',[AboutController::class,'edit'])->name('multi.image.edit');
Route::post('multi/image/update/{id}',[AboutController::class,'updateImage'])->name('multi.image.update');
Route::get('multi/image/destroy/{id}',[AboutController::class,'destroy'])->name('multi.image.destroy');

//* blog Category
Route::get('blog/category/index',[BlogCategoryController::class,'index'])->name('blog.category.index');
Route::get('blog/category/create',[BlogCategoryController::class,'create'])->name('blog.category.create');
Route::post('blog/category/store',[BlogCategoryController::class,'Store'])->name('blog.category.store');
Route::get('blog/category/edit/{id}',[BlogCategoryController::class,'edit'])->name('blog.category.edit');
Route::post('blog/category/update/{id}',[BlogCategoryController::class,'update'])->name('blog.category.update');
Route::delete('blog/category/destroy/{id}',[BlogCategoryController::class,'destroy'])->name('blog.category.destroy');

//* blog
Route::get('blog/index',[BlogController::class,'index'])->name('blog.index');
Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('blog/store',[BlogController::class,'Store'])->name('blog.store');
Route::get('blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
Route::post('blog/update/{id}',[BlogController::class,'update'])->name('blog.update');
Route::delete('blog/destroy/{id}',[BlogController::class,'destroy'])->name('blog.destroy');

// Route::resource('blogs', BlogController::class);






