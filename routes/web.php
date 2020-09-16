<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ColController;

use App\Http\Controllers\ProductsController;

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
//     $nama = 'FathanWebs';
//     return view('index',['nama' => $nama ]);
// });

// Route::get('/profile', function () {
//     return view('other/profile');
// });

// Route::get('/about', function () {
    
//     return view('other.about');
// });


Route::get('/', [ColController::class, 'index']);

Route::get('/profile', [ColController::class, 'profile']);

Route::get('/about', [ColController::class, 'about']);



Route::patch('/product/{product}',[ProductsController::class,'update']);
Route::get('/product', [ProductsController::class, 'index']);
Route::get('/product/create', [ProductsController::class, 'create']);
Route::get('/product/{product}', [ProductsController::class, 'show']);
Route::post('/product', [ProductsController::class, 'store']);
Route::delete('/product/{product}', [ProductsController::class,'destroy']);
Route::get('/product/{product}/edit',[ProductsController::class,'edit']);


