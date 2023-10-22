<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ResultController;
use App\Models\Examination;
use App\Models\Registration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\RegistrationController;

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
Route::post('/student/registration', [RegistrationController::class, 'store'])->name('registration');

Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/admin', [HomeController::class, 'adminindex'])->name('admin'); 

    Route::get('/admin/examination/index', [ExaminationController::class, 'index'])->name('admin.exams.index'); 
    Route::get('/admin/examination/{examination}', [ExaminationController::class, 'show'])->name('admin.exam.show'); 

    Route::get('/admin/scores', [ResultController::class, 'index'])->name('admin.scores.index'); 

    Route::get('/admin/accounts', [AccountController::class, 'index'])->name('admin.accounts.index'); 

    Route::get('/admin/registration/index', [RegistrationController::class, 'index'])->name('admin.registration.index'); 
    
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