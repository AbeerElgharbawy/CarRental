<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('password/reset', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset']);

Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


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
    return view('index');
});



Auth::routes();

Auth::routes(['verify'=>true]);
// Route::get('/home', [HomeController::class, 'index'])->middleware('verified')->name('home');


 
//admin routes
Route::prefix('admin')->middleware('verified')->group(function () {
        //user routes
        Route::get('addUser', [App\Http\Controllers\AdminController::class, 'addUser'])->name('addUser');
        Route::post('storeUser', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
        Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
        Route::get('editUser/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser');
        Route::put('updateUser/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser');
        //car routes
        Route::get('addCar', [App\Http\Controllers\CarController::class, 'create'])->name('addCar');
        Route::post('storeCar', [App\Http\Controllers\CarController::class, 'store'])->name('storeCar');
        Route::get('cars', [App\Http\Controllers\CarController::class, 'index'])->name('cars');
        Route::get('editCar/{id}', [App\Http\Controllers\CarController::class, 'edit'])->name('editCar');
        Route::put('updateCar/{id}', [App\Http\Controllers\CarController::class, 'update'])->name('updateCar');
        Route::get('deletrCar/{id}', [App\Http\Controllers\CarController::class, 'destroy'])->name('deleteCar');
        //categories routes
        Route::get('addCategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('addCategory');
        Route::post('storeCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory');
        Route::get('categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
        Route::get('editCategory/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');
        Route::put('updateCategory/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');
        Route::get('deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('deleteCategory');
        //Testimonials routes
        Route::get('addTestimonials', [App\Http\Controllers\TestimonialController::class, 'create'])->name('addTestimonials');
        Route::post('storeTestimonial', [App\Http\Controllers\TestimonialController::class, 'store'])->name('storeTestimonial');
        Route::get('testimonials', [App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonialsList');
        Route::get('editTestimonial/{id}', [App\Http\Controllers\TestimonialController::class, 'edit'])->name('editTestimonial');
        Route::put('updateTestimonial/{id}', [App\Http\Controllers\TestimonialController::class, 'update'])->name('updateTestimonial');
        Route::get('deleteTestimonial/{id}', [App\Http\Controllers\TestimonialController::class, 'destroy'])->name('deleteTestimonial');
        //messages
        Route::get('messages', [App\Http\Controllers\ContactController::class, 'index'])->name('messages');
        Route::get('deleteMessage/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('deleteMessage');
        Route::get('showMessage/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('showMessage');
})->name('admin');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('contact',[App\Http\Controllers\PageController::class,'contact'])->name('contact');
Route::get('/',[App\Http\Controllers\PageController::class,'index'])->name('index');
Route::get('blog',[App\Http\Controllers\PageController::class,'blog'])->name('blog');
Route::get('single/{id}',[App\Http\Controllers\PageController::class,'single'])->name('single');
Route::get('listing',[App\Http\Controllers\PageController::class,'listing'])->name('listing');
Route::get('about',[App\Http\Controllers\PageController::class,'about'])->name('about');
Route::get('testimonials',[App\Http\Controllers\PageController::class,'testimonials'])->name('testimonials');
Route::post('contact_mail',[App\Http\Controllers\ContactController::class,'contact_mail']);
