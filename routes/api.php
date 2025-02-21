<?php

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

    
});
// Grouping routes related to students
Route::prefix('students')->group(function () {
    Route::post('/register', [StudentController::class, 'store']);  // Register a student
    Route::get('/getall', [StudentController::class, 'getall']);           // Fetch all students
    Route::get('/{id}', [StudentController::class, 'show']);        // Fetch a single student by ID
});

Route::prefix('tests')->group(function () {
    Route::post('start/{student_id}', [TestController::class, 'start']);      // Start a test
    Route::post('responses/{test_id}', [TestController::class, 'storeResponse']); // Store responses
    Route::get('show/{test_id}', [TestController::class, 'show']);           // Show test results
});
Route::get('/tests/score-distribution', [TestController::class, 'getScoreDistribution']);
Route::get('/tests/score-details', [TestController::class, 'getScoreDetails']);

