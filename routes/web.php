<?php

use App\Models\Examination;
use App\Models\Registration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AttemptController;
use App\Http\Controllers\ChoicesController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\QuestionController;
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

Route::group(['middleware' => ['auth', 'checkrole:1', 'prevent-back']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [HomeController::class, 'adminindex'])->name('index'); 

        Route::get('/examination/index', [ExaminationController::class, 'index'])->name('exams.index');
        
        Route::post('/examination/question/create/{examination}', [QuestionController::class, 'create'])->name('exams.question.create'); 
        Route::post('/examination/question/store/{examination}', [QuestionController::class, 'store'])->name('exams.question.store'); 
        Route::put('/question/update/{question}', [QuestionController::class, 'update'])->name('question.update');
        Route::delete('/question/destroy/{question}', [QuestionController::class, 'destroy'])->name('question.destroy');
        Route::post('/examination/choice/store/{question}', [ChoicesController::class, 'store'])->name('exams.choice.store');
        
        Route::post('/examination/store', [ExaminationController::class, 'store'])->name('exam.store');
        Route::put('/examination/update/{examination}', [ExaminationController::class, 'update'])->name('exam.update');
        Route::delete('/examination/destroy/{examination}', [ExaminationController::class,'destroy'])->name('exam.destroy');
        Route::get('/examination/{examination}', [ExaminationController::class, 'show'])->name('exam.show'); 


        Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index'); 
        Route::get('/scores/review/{score}', [ScoreController::class, 'review'])->name('scores.review'); 

        Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index'); 
        Route::get('/accounts/activate/{user}', [AccountController::class, 'activate'])->name('accounts.active');
        Route::post('/accounts/store', [AccountController::class, 'store'])->name('account.store');

        // Route::post('/accounts/store', [AccountController::class, 'store'])->name('account.store');
        // Route::put('/accounts/update/{user}', [AccountController::class, 'update'])->name('account.update');
        // Route::delete('/accounts/destroy/{user}', [AccountController::class, 'destroy'])->name('accounts.destroy');

        Route::get('/registration/index', [RegistrationController::class, 'index'])->name('registration.index'); 
        Route::post('/registration/store', [RegistrationController::class, 'store'])->name('registration.store'); 
        Route::put('/registration/update/{registration}', [RegistrationController::class, 'update'])->name('registration.update');
        Route::delete('/registration/destroy/{registration}', [RegistrationController::class, 'destroy'])->name('registration.destroy');
        
        Route::get('/courses/index', [CourseController::class, 'index'])->name('course.index');
        Route::post('/courses/store', [CourseController::class, 'store'])->name('course.store');
        Route::put('/courses/update/{course}', [CourseController::class, 'update'])->name('course.update');
        Route::delete('/courses/destroy/{course}', [CourseController::class, 'destroy'])->name('course.delete');
    });
});
Route::group(['middleware' => ['auth', 'checkrole:3']], function () {
    Route::get('/examiners', function () {
        return view('admin.index');
    })->name('examiners');
    
    
});
Route::group(['middleware' => ['auth', 'checkrole:2', 'prevent-back']], function () {
    Route::prefix('examinee')->name('examinee.')->group(function () {
        Route::get('/', [HomeController::class, 'examineeIndex'])->name('index'); 
        Route::get('/examination/attempt/{examination}/{attempt}', [AttemptController::class, 'attempt'])->name('examination.attempt'); 
        Route::post('/examination/submit/{examination}/{attempt}', [AttemptController::class, 'submit'])->name('examination.submit'); 
    });
    // Route::get('/examinee', function () {
    //     return view('admin.index');
    // })->name('examinee');
});