<?php

use App\Http\Controllers\web\AuthController;
use Illuminate\Support\Facades\Http;
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


Route::prefix('admin')->middleware(['auth:sanctum'])->group(function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    });
    Route::get('/podcast', function(){
        return view('contents.podcast');
    });
    Route::get('/film-edukasi', function(){
        return view('contents.film');
    });
    Route::get('/video-edukasi', function(){
        return view('contents.video');
    });
    Route::get('/quote', function(){
        return view('contents.quote');
    });
    Route::get('/infografis', function(){
        return view('contents.infografis');
    });
});

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');