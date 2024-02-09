<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});
Route::get('index', function () {
    return view('index');
});
Route::get('blog', function () {
    return view('blog');
})->name('blog');
Route::get('contact', function () {
    return view('contact');
})->name('contact');


Auth::routes(['verify'=>true]);
// Route::get('/home', [HomeController::class, 'index'])->middleware('verified')->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
//admin routes
Route::prefix('admin')->middleware('verified')->group(function () {
        //user routes
        Route::get('addUser', [App\Http\Controllers\AdminController::class, 'addUser'])->name('addUser');
        Route::post('storeUser', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
        Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
        Route::get('editUser/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser');
        Route::put('updateUser/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser');
        //car routes
        Route::get('addCar', [App\Http\Controllers\AdminController::class, 'addCar'])->name('addCar');
        Route::get('cars', [App\Http\Controllers\AdminController::class, 'cars'])->name('cars');
        Route::get('editCar', [App\Http\Controllers\AdminController::class, 'editCar'])->name('editCar');
        //categories routes
        Route::get('addCategory', [App\Http\Controllers\AdminController::class, 'addCategory'])->name('addCategory');
        Route::get('categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('categories');
        Route::get('editCategory', [App\Http\Controllers\AdminController::class, 'editCategory'])->name('editCategory');
        //Testimonials routes
        Route::get('addTestimonials', [App\Http\Controllers\AdminController::class, 'addTestimonials'])->name('addTestimonials');
        Route::get('testimonials', [App\Http\Controllers\AdminController::class, 'testimonials'])->name('testimonials');
        Route::get('editTestimonial', [App\Http\Controllers\AdminController::class, 'editTestimonial'])->name('editTestimonial');
        //messages
        Route::get('messages', [App\Http\Controllers\AdminController::class, 'messages'])->name('messages');
        Route::get('showMessages', [App\Http\Controllers\AdminController::class, 'showMessages'])->name('showMessages');
})->name('admin');
