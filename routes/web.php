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
    Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'adminindex'])->name('index'); 

    Route::get('/examination/index', [ExaminationController::class, 'index'])->name('exams.index'); 
    Route::get('/examination/{examination}', [ExaminationController::class, 'show'])->name('exam.show'); 

    Route::get('/scores', [ResultController::class, 'index'])->name('scores.index'); 

    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index'); 

    Route::get('/registration/index', [RegistrationController::class, 'index'])->name('registration.index'); 
    Route::post('/registration/store', [RegistrationController::class, 'store'])->name('registration.store'); 
    
    });
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