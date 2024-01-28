<?php

use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\LogoutController;
use App\Http\Controllers\api\auth\RegisterController;
use App\Http\Controllers\api\ChatMeController;
use App\Http\Controllers\api\FileController;
use App\Http\Controllers\api\FilmController;
use App\Http\Controllers\api\InfografisController;
use App\Http\Controllers\api\JadwalAhliController;
use App\Http\Controllers\api\JawabanAhliController;
use App\Http\Controllers\api\MeController;
use App\Http\Controllers\api\PodcastController;
use App\Http\Controllers\api\QuoteController;
use App\Http\Controllers\api\TanyaAhliController;
use App\Http\Controllers\api\TopikPertanyaanController;
use App\Http\Controllers\api\VideoEdukasiController;
use App\Models\JawabanAhli;
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
    Route::post('/podcast', [PodcastController::class, 'createPodcast']);
    Route::put('/podcast/{id}', [PodcastController::class, 'updatePodcast']);
    Route::delete('/podcast/{id}', [PodcastController::class, 'deletePodcast']);

    Route::post('/favpodcast', [PodcastController::class, 'addFavPodcast']);
    Route::get('/favpodcast', [PodcastController::class, 'getAllFavPodcast']);
    Route::delete('/favpodcast/{id}', [PodcastController::class, 'removeFavPodcast']);

    Route::post('/infografis', [InfografisController::class, 'createInfografis']);
    Route::put('/infografis/{id}', [InfografisController::class, 'updateInfografis']);
    Route::delete('/infografis/{id}', [InfografisController::class, 'deleteInfografis']);

    Route::post('/favinfografis', [InfografisController::class, 'addFavInfografis']);
    Route::get('/favinfografis', [InfografisController::class, 'getAllFavInfografis']);
    Route::delete('/favinfografis/{id}', [InfografisController::class, 'removeFavInfografis']);

    Route::post('/video-edukasi', [VideoEdukasiController::class, 'createVideoEdukasi']);
    Route::put('/video-edukasi/{id}', [VideoEdukasiController::class, 'updateVideoEdukasi']);
    Route::delete('/video-edukasi/{id}', [VideoEdukasiController::class, 'deleteVideoEdukasi']);

    Route::post('/fav-video-edukasi', [VideoEdukasiController::class, 'addFavVideoEdukasi']);
    Route::get('/fav-video-edukasi', [VideoEdukasiController::class, 'getAllFavVideoEdukasi']);
    Route::delete('/fav-video-edukasi/{id}', [VideoEdukasiController::class, 'removeFavVideoEdukasi']);

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
    
    Route::post('jadwalahli',[JadwalAhliController::class, 'addJadwal']);
    Route::put('jadwalahli/{id}',[JadwalAhliController::class, 'updateJadwal']);
    Route::delete('jadwalahli/{id}',[JadwalAhliController::class, 'deleteJadwal']);

    Route::post('tanyaahli',[TanyaAhliController::class, 'addPertanyaan']);
    Route::delete('tanyaahli/{id}',[TanyaAhliController::class, 'deletePertanyaan']);

    Route::post('topikpertanyaan',[TopikPertanyaanController::class, 'addTopik']);
    Route::delete('topikpertanyaan/{id}',[TopikPertanyaanController::class, 'deleteTopik']);

    Route::post('jawabanahli/{id}',[JawabanAhliController::class, 'addJawaban']);
    Route::delete('jawabanahli/{id}',[JawabanAhliController::class, 'deleteJawaban']);

    Route::post('chatme/{id}', [ChatMeController::class, 'createChat']);
    Route::get('me', [MeController::class, 'getMe']);
});

Route::get('/podcast', [PodcastController::class, 'getAllPodcast']);
Route::get('/podcast/{id}', [PodcastController::class, 'getPodcastById']);

Route::get('/infografis', [InfografisController::class, 'getAllInfografis']);
Route::get('/infografis/{id}', [InfografisController::class, 'getInfografisById']);

Route::get('/videoedukasi', [VideoEdukasiController::class, 'getAllVideoEdukasi']);
Route::get('/videoedukasi/{id}', [VideoEdukasiController::class, 'getVideoEdukasiById']);

Route::get('/quote', [QuoteController::class, 'getAllQuote']);
Route::get('/quote/{id}', [QuoteController::class, 'getQuoteById']);

Route::get('/film', [FilmController::class, 'getAllFilm']);
Route::get('/film/{id}', [FilmController::class, 'getFilmById']);

Route::get('/jadwalahli',[JadwalAhliController::class, 'getAllJadwal']);
Route::get('/jadwalahli/{id}',[JadwalAhliController::class, 'getJadwalById']);

Route::get('/tanyaahli',[TanyaAhliController::class, 'getAllPertanyaan']);
Route::get('/tanyaahli/{id}',[TanyaAhliController::class, 'getPertanyaanById']);

Route::get('/topikpertanyaan',[TopikPertanyaanController::class, 'getAllTopik']);
Route::get('/topikpertanyaan/{id}',[TopikPertanyaanController::class, 'getTopikById']);

Route::get('/jawabanahli',[JawabanAhliController::class, 'getAllJawaban']);
Route::get('/jawabanahli/{id}',[JawabanAhliController::class, 'getJawabanById']);

Route::get('/chatme',[ChatMeController::class, 'getAllChat']);
Route::get('/chatme/{id}',[ChatMeController::class, 'getChatById']);


