<?php

use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\LogoutController;
use App\Http\Controllers\api\auth\RegisterController;
use App\Http\Controllers\api\PodcastController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LogoutController::class, 'logout']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('podcast', [PodcastController::class, 'addPodcast']);
    Route::get('podcast', [PodcastController::class, 'getAllPodcast']);
    Route::get('podcast/{id}', [PodcastController::class, 'getPodcastById']);
    Route::put('podcast/{id}', [PodcastController::class, 'updatePodcastById']);
    Route::delete('podcast/{id}', [PodcastController::class, 'deletePodcastById']);
});

