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
| https://www.figma.com/file/ns9AKpVfF8rvibSWbBZ9yp/Untitled?node-id=0%3A1
*/

Route::get('clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    return 'DONE';
});

Route::get('/', [App\Http\Controllers\Web\WebController::class, 'index'])->name('index');
Route::post('contacto', [App\Http\Controllers\Web\WebController::class, 'postContacto'])->name('contacto');
Route::get('post', [App\Http\Controllers\Web\WebController::class, 'postO'])->name('post');
Route::get('gracias', [App\Http\Controllers\Web\WebController::class, 'gracias'])->name('gracias');
Route::prefix('/blog')->group(function(){
    Route::get('/', [App\Http\Controllers\Web\WebController::class, 'blog'])->name('blog');
    Route::get('/post/{slug}', [App\Http\Controllers\Web\WebController::class, 'post'])->name('post');
    Route::get('/categoria/{slug}', [App\Http\Controllers\Web\WebController::class, 'category'])->name('category');
    Route::get('/tag/{slug}', [App\Http\Controllers\Web\WebController::class, 'tag'])->name('tag');
});

/****** File Manager ******/

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get("storage-link", function () {
    $targetFolder = storage_path("app/public");
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});