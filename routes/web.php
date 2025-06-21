<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect')->middleware('auth', 'verified');



Route::get('/view_category', [AdminController::class, 'view_category'])->name('view.category');
Route::post('/add_category', [AdminController::class, 'add_category'])->name('add.category');
Route::get('/show_category', [AdminController::class, 'show_category'])->name('show.category');
Route::get('/edit_category/{id}', [AdminController::class, 'edit_category'])->name('edit.category');
Route::post('/update_category/{id}', [AdminController::class, 'update_category'])->name('update.category');
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete.category');
Route::get('/view_product', [AdminController::class, 'view_product'])->name('view.product');
Route::post('/add_product', [AdminController::class, 'add_product'])->name('add.product');
Route::get('/show_product', [AdminController::class, 'show_product'])->name('show.product');
Route::get('/edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit.product');
Route::post('/update_product/{id}', [AdminController::class, 'update_product'])->name('update.product');
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete.product');
Route::get('/order', [AdminController::class, 'order'])->name('order.product');
Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered.product');
Route::get('/search_order', [AdminController::class, 'search_order'])->name('search.order');




Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product.details');
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('product.addCart');
Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('product.showCart');
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('product.removeCart');
Route::get('/orders', [HomeController::class, 'order'])->name('order.home')->middleware('auth');
Route::get('/products', [HomeController::class, 'product'])->name('product.home');



Route::get('/cash_order', [HomeController::class, 'cash_order'])->name('product.cashOrder');
Route::get('/Card/{totalPrice}', [HomeController::class, 'card'])->name('product.Card');
Route::post('/payWithCard/{totalPrice}', [HomeController::class, 'payWithCard'])->name('product.payWithCard');
