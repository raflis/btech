<?php

use Illuminate\Support\Facades\Route;

Route::post('loginpost', [App\Http\Controllers\Admin\LoginController::class,'indexPost'])->name('login.post');
Route::get('logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('login.logout');
Route::get('loginall', [App\Http\Controllers\Admin\LoginController::class,'indexall'])->name('login.all');
Route::resource('login', App\Http\Controllers\Admin\LoginController::class);
Route::prefix('/admin')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin');
    Route::resource('home', App\Http\Controllers\Admin\HomeController::class);
    Route::get('home/aboutus/index', [App\Http\Controllers\Admin\HomeController::class,'aboutus'])->name('home.aboutus');
    Route::resource('footer', App\Http\Controllers\Admin\FooterController::class);
    Route::resource('aboutus', App\Http\Controllers\Admin\AboutusController::class);
    Route::resource('partners', App\Http\Controllers\Admin\PartnerController::class);
    Route::resource('solutions', App\Http\Controllers\Admin\SolutionController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('tags', App\Http\Controllers\Admin\TagController::class);
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('records', App\Http\Controllers\Admin\RecordController::class)->only(['index']);
    Route::get('records/excel', [App\Http\Controllers\Admin\RecordController::class, 'excel'])->name('records.excel');
});
