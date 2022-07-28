<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LevelsController;
use App\Http\Controllers\API\ArticlesController;
use App\Http\Controllers\API\CommentsController;
use App\Http\Controllers\API\StudentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/user', function (Request $request) {
    return $request->user();
  });
  
  Route::apiResource('comments', CommentsController::class);
});

Route::apiResource('articles', ArticlesController::class)->only('index', 'show');

Route::prefix('auth')->controller(AuthController::class)->group(function () {
  Route::post('register', 'register');
  Route::post('login', 'login');
});

Route::prefix('v1')->group(function () {
  Route::apiResource('levels', LevelsController::class);
  Route::apiResource('students', StudentsController::class);
});
