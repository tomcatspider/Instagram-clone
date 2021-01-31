<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use app\Models\User;
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
    return view('welcome');
});

require __DIR__.'/auth.php';


Route::get('/p/create',[App\Http\Controllers\PostsController::class, 'create']);
Route::post('/p',[App\Http\Controllers\PostsController::class, 'store']);
Route::get('/p/{post}',[App\Http\Controllers\PostsController::class, 'show']);

Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/{user}/edite', [ProfileController::class, 'edite'])->name('profile.edite');




