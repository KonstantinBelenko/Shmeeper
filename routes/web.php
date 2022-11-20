<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\PostController;
use \App\Http\Livewire\paginatePosts;

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

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::post('/profile/save', [ProfileController::class, 'save']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::get('/profile', [ProfileController::class, 'owner'])->middleware(['auth', 'verified'])->name('profile');
Route::get('/profile/{id}', [ProfileController::class, 'index']);

Route::get('/post/{id}', [PostController::class, 'index']);
Route::resource('post', PostController::class);

require __DIR__.'/auth.php';
