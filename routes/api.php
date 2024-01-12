<?php

use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\LogoutController;
use App\Http\Controllers\api\auth\RegisterController;
use App\Http\Controllers\api\FilmController;
use App\Http\Controllers\api\InfografisController;
use App\Http\Controllers\api\PodcastController;
use App\Http\Controllers\api\QuoteController;
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
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LogoutController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('podcast', [PodcastController::class, 'addPodcast']);
    Route::put('podcast/{id}', [PodcastController::class, 'updatePodcast']);
    Route::delete('podcast/{id}', [PodcastController::class, 'deletePodcast']);

    Route::post('infografis', [InfografisController::class, 'createInfografis']);
    Route::put('infografis/{id}', [InfografisController::class, 'updateInfografis']);
    Route::delete('infografis/{id}', [InfografisController::class, 'deleteInfografis']);

    Route::post('favinfografis', [InfografisController::class, 'addFavInfografis']);
    Route::get('favinfografis', [InfografisController::class, 'getAllFavInfografis']);
    Route::delete('favinfografis/{id}', [InfografisController::class, 'removeFavInfografis']);

    Route::post('quote', [QuoteController::class, 'createQuote']);
    Route::put('quote/{id}',[QuoteController::class, 'updateQuote']);
    Route::delete('quote/{id}',[QuoteController::class, 'deleteQuote']);

    Route::post('favquote/{id}', [QuoteController::class, 'addFavQuote']);
    Route::get('favquote',[QuoteController::class, 'getAllFavQuote']);
    Route::delete('favquote/{id}',[QuoteController::class, 'removeFavQuote']);  

    Route::post('film', [FilmController::class, 'createFilm']);
    Route::put('film/{id}', [FilmController::class, 'updateFilm']);
    Route::delete('film/{id}', [FilmController::class, 'deleteFilm']);

    Route::post('favfilm', [FilmController::class, 'addFavFilm']);
    Route::get('favfilm', [FilmController::class, 'getAllFavFilm']);
    Route::delete('favfilm/{id}', [FilmController::class, 'removeFavFilm']);
});

Route::get('podcast', [PodcastController::class, 'getAllPodcast']);
Route::get('podcast/{id}', [PodcastController::class, 'getPodcastById']);

Route::get('/infografis', [InfografisController::class, 'getAllInfografis']);
Route::get('infografis/{id}', [InfografisController::class, 'getInfografisById']);

Route::get('/quote', [QuoteController::class, 'getAllQuote']);
Route::get('quote/{id}', [QuoteController::class, 'getQuoteById']);

Route::get('/film', [FilmController::class, 'getAllFilm']);
Route::get('/film/{id}', [FilmController::class, 'getFilmById']);

