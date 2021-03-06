<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

// Dashboard route for different users
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
require __DIR__.'/auth.php';

// My profile for users except admin, user
Route::middleware(['auth', 'role:blogger'])->group(function(){
    Route::get('/dashboard/post/create', [DashboardController::class, 'createPost'])->name('dashboard.createPost');
    Route::post('/dashboard/post/store', [PostController::class, 'store'])->name('post.store');
});

// My profile for blogger except user, admin
Route::middleware(['auth', 'role:blogger|user'])->group(function(){
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
});
