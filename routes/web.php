<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;

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



// Route::domain(config('app.domain.interview'))->group(function () {
//     Route::get('/', [StudentController::class, 'index'])->name('interview.layouts.home');
// });
// Route::domain(config('app.domain.interview'))->group(function () {
//     Route::get('/assessment', [StudentController::class, 'assessment'])->name('interview.layouts.test');
// });

// Route::domain(config('app.domain.interview'))->group(function () {
//     Route::get('/response', [TestController::class, 'storeResponse'])->name('interview.layouts.result');
// });

// Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

// Route::post('/tests/result', [TestController::class, 'storeResponse'])->name('tests.storeResponse');
Route::domain(config('app.domain.interview'))->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('interview.layouts.home');
    Route::get('/assessment', [StudentController::class, 'assessment'])->name('interview.layouts.test');
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
    Route::post('/tests/result/{test_id}', [TestController::class, 'storeResponse'])->name('tests.storeResponse');
    Route::get('/response', [TestController::class, 'show'])->name('interview.layouts.result');
    // Route::get('/scores/details', [TestController::class, 'getScoreDistribution'])->name('tests.scores');
    Route::get('/scores/students', [TestController::class, 'getScoreDetails'])->name('tests.score');
    Route::get('/view-answers/{test_id}', [TestController::class, 'viewAnswers'])->name('view.answers');
});