<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\ContactUsFormController;
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
    return view('/home');
});
//views controllers
Route::get('home', [homecontroller::class, 'home']);
Route::get('abouts', [homecontroller::class, 'about']);
Route::get('contact', [homecontroller::class, 'contact']);
//contact-form 
Route::get('contact', [ContactUsFormController::class, 'createForm'])->name('create.Form');
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');
//
Route::get('products', [homecontroller::class, 'products']);
Route::get('blog', [homecontroller::class, 'blog']);
Route::get('testimonial', [homecontroller::class, 'testimonial']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirect', [homecontroller::class, 'redirect'])->middleware('auth','verified');
Route::get('/view_category', [admincontroller::class, 'view_category']);
Route::post('/add_category', [admincontroller::class, 'add_category']);
Route::get('/delete_category/{id}', [admincontroller::class, 'delete_category']);
Route::get('/view_product', [admincontroller::class, 'view_product']);
Route::post('/add_product', [admincontroller::class, 'add_product']);
Route::get('/show_product', [admincontroller::class, 'show_product']);
Route::get('/delete_product/{id}', [admincontroller::class, 'delete_product']);
Route::get('/update_product/{id}', [admincontroller::class, 'update_product']);
Route::post('/update_product_confirm/{id}', [admincontroller::class, 'update_product_confirm']);
Route::get('/order', [admincontroller::class, 'order']);
Route::get('/delivered/{id}', [admincontroller::class, 'delivered']);
Route::get('/print_pdf/{id}', [admincontroller::class, 'print_pdf']);
Route::get('/send_email/{id}', [admincontroller::class, 'send_email']);
Route::post('/send_user_email/{id}', [admincontroller::class, 'send_user_email']);
Route::get('/search', [admincontroller::class, 'searchdata']);

Route::get('/product-details/{id}', [homecontroller::class, 'product_details']);
Route::post('/add_cart/{id}', [homecontroller::class, 'add_cart']);
Route::get('/show_cart', [homecontroller::class, 'show_cart']);
Route::get('/remove_cart/{id}', [homecontroller::class, 'remove_cart']);
Route::get('/cash_order', [homecontroller::class, 'cash_order']);
// Route::get('/stripe/{totalprice}', [homecontroller::class, 'stripe']);
// Route::post('stripe',[homecontroller::class, 'stripePost'])->name('stripe.post');
Route::get('/show_order', [homecontroller::class, 'show_order']);
Route::get('/cancel_order/{id}', [homecontroller::class, 'cancel_order']);  