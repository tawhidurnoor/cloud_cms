<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/services', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('service.index');

Route::get('/hardware-products', [App\Http\Controllers\HomeController::class, 'hardwareProducts'])->name('hardware_products');

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('/blogs', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.index');

Route::get('/blog/{blog_slug}', [App\Http\Controllers\Frontend\BlogController::class, 'details'])->name('blog.details');

Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'slugDetails'])->name('slug.details');
