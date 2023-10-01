<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [LandingController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');
});
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/examiners', function () {
        return view('admin.index');
    })->name('examiners');
});
Route::group(['middleware' => ['auth', 'checkrole:3']], function () {
    Route::get('/examinee', function () {
        return view('admin.index');
    })->name('examinee');
});