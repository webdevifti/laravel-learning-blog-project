<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/', [PagesController::class, 'index'])->name('home-page');
Route::get('/about', [PagesController::class, 'about'])->name('about-page');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact-page');
Route::get('/resource', [PagesController::class, 'resource'])->name('resource-page');

Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/admin/profile', [App\Http\Controllers\HomeController::class, 'profilePage'])->name('profile');
    Route::get('/admin/profile/edit/{id}', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('edit-profile');
    Route::put('/admin/profile/{id}', [App\Http\Controllers\HomeController::class, 'update']);
    Route::put('/admin/profile/password/{id}', [App\Http\Controllers\HomeController::class, 'updatePass']);
    // Posts Controll Routes
    Route::resource('/admin/posts', PostsController::class);
    Route::resource('/admin/posts/{id}/edit', PostsController::class);
    // Route::resource('/admin/posts/{id}', PostsController::class);


    // Category Controll Routes
    Route::resource('/admin/category', CategoryController::class); // Retrieve Route
    Route::resource('/admin/category/{id}/edit', CategoryController::class); // Edit Route
    // Route::resource('/admin/category/{id}', CategoryController::class); // Update Route

});
