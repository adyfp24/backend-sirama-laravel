<?php

use App\Http\Controllers\api\auth\AccountController;
use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\LogoutController;
use App\Http\Controllers\api\auth\RegisterController;
use App\Http\Controllers\api\ChatMeController;
use App\Http\Controllers\api\FilmController;
use App\Http\Controllers\api\InfografisController;
use App\Http\Controllers\api\JadwalAhliController;
use App\Http\Controllers\api\JawabanAhliController;
use App\Http\Controllers\api\MeController;
use App\Http\Controllers\api\NewKontenController;
use App\Http\Controllers\api\PodcastController;
use App\Http\Controllers\api\profile\AhliController;
use App\Http\Controllers\api\profile\GuruController;
use App\Http\Controllers\api\profile\KaderController;
use App\Http\Controllers\api\profile\OrtuController;
use App\Http\Controllers\api\profile\RemajaController;
use App\Http\Controllers\api\QuoteController;
use App\Http\Controllers\api\TanyaAhliController;
use App\Http\Controllers\api\TopikPertanyaanController;
use App\Http\Controllers\api\VideoEdukasiController;
use App\Http\Controllers\SkrinningController;
use App\Http\Controllers\api\UserController;
use App\Models\JawabanAhli;
use App\Models\Skrinning;
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
Route::post('login', [LoginController::class, 'login'])->name('login-api');
Route::post('logout', [LogoutController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/podcast', [PodcastController::class, 'createPodcast']);
    Route::put('/podcast/{id}', [PodcastController::class, 'updatePodcast']);
    Route::delete('/podcast/{id}', [PodcastController::class, 'deletePodcast']);

    Route::post('/favpodcast/{id}', [PodcastController::class, 'addFavPodcast']);
    Route::get('/favpodcast', [PodcastController::class, 'getAllFavPodcast']);
    Route::delete('/favpodcast/{id}', [PodcastController::class, 'removeFavPodcast']);

    Route::post('/infografis', [InfografisController::class, 'createInfografis']);
    Route::put('/infografis/{id}', [InfografisController::class, 'updateInfografis']);
    Route::delete('/infografis/{id}', [InfografisController::class, 'deleteInfografis']);

    Route::post('/favinfografis/{id}', [InfografisController::class, 'addFavInfografis']);
    Route::get('/favinfografis', [InfografisController::class, 'getAllFavInfografis']);
    Route::delete('/favinfografis/{id}', [InfografisController::class, 'removeFavInfografis']);

    Route::post('/video-edukasi', [VideoEdukasiController::class, 'createVideoEdukasi']);
    Route::put('/video-edukasi/{id}', [VideoEdukasiController::class, 'updateVideoEdukasi']);
    Route::delete('/video-edukasi/{id}', [VideoEdukasiController::class, 'deleteVideoEdukasi']);

    Route::post('/fav-video-edukasi/{id}', [VideoEdukasiController::class, 'addFavVideoEdukasi']);
    Route::get('/fav-video-edukasi', [VideoEdukasiController::class, 'getAllFavVideoEdukasi']);
    Route::delete('/fav-video-edukasi/{id}', [VideoEdukasiController::class, 'removeFavVideoEdukasi']);

    Route::post('quote', [QuoteController::class, 'createQuote']);
    Route::put('quote/{id}', [QuoteController::class, 'updateQuote']);
    Route::delete('quote/{id}', [QuoteController::class, 'deleteQuote']);

    Route::post('favquote/{id}', [QuoteController::class, 'addFavQuote']);
    Route::get('favquote', [QuoteController::class, 'getAllFavQuote']);
    Route::delete('favquote/{id}', [QuoteController::class, 'removeFavQuote']);

    Route::post('film', [FilmController::class, 'createFilm']);
    Route::put('film/{id}', [FilmController::class, 'updateFilm']);
    Route::delete('film/{id}', [FilmController::class, 'deleteFilm']);

    Route::post('favfilm/{id}', [FilmController::class, 'addFavFilm']);
    Route::get('favfilm', [FilmController::class, 'getAllFavFilm']);
    Route::delete('favfilm/{id}', [FilmController::class, 'removeFavFilm']);

    Route::post('jadwalahli', [JadwalAhliController::class, 'addJadwal']);
    Route::put('jadwalahli/{id}', [JadwalAhliController::class, 'updateJadwal']);
    Route::delete('jadwalahli/{id}', [JadwalAhliController::class, 'deleteJadwal']);

    Route::post('tanyaahli', [TanyaAhliController::class, 'addPertanyaan']);
    Route::delete('tanyaahli/{id}', [TanyaAhliController::class, 'deletePertanyaan']);

    Route::post('topikpertanyaan', [TopikPertanyaanController::class, 'addTopik']);
    Route::delete('topikpertanyaan/{id}', [TopikPertanyaanController::class, 'deleteTopik']);

    Route::post('jawabanahli/{id}', [JawabanAhliController::class, 'addJawaban']);
    Route::delete('jawabanahli/{id}', [JawabanAhliController::class, 'deleteJawaban']);

    Route::post('chatme/{id}', [ChatMeController::class, 'createChat']);
    Route::get('me', [MeController::class, 'getMe']);

    Route::get('/skrinning', [SkrinningController::class, 'allSkrinning']);
    Route::post('/skrinning', [SkrinningController::class, 'addSkrinning']);
    Route::get('/detailskrinning/{id}', [SkrinningController::class, 'getDetailSkrinning']);
    Route::post('/submitskrinning', [SkrinningController::class, 'submitBagianSkrinningUser']);
    Route::get('/riwayatskrinning', [SkrinningController::class, 'getRiwayatSkrinning']);
    Route::get('/detailriwayatskrinning/{id}', [SkrinningController::class, 'getDetailRiwayatSkrinning']);

    Route::get('/chatme', [ChatMeController::class, 'getAllChat']);
    Route::get('/chatme/{id}', [ChatMeController::class, 'getChatById']);

    Route::post('/update-remaja', [RemajaController::class, 'updateProfile']);
    Route::put('/update-guru', [GuruController::class, 'updateProfile']);
    Route::put('/update-kader', [KaderController::class, 'updateProfile']);
    Route::put('/update-ahli', [AhliController::class, 'updateProfile']);
    Route::put('/update-orangtua', [OrtuController::class, 'updateProfile']);

    Route::put('update-password', [MeController::class, 'changePassword']);
    Route::post('/jadwalahli/{id}', [JadwalAhliController::class, 'addJadwal']);
    
    Route::post('/hapus-akun', [AccountController::class, 'deleteAkun']);
    Route::get('/list-guru', [ChatMeController::class, 'listGuru']);
    Route::get('/list-murid', [ChatMeController::class, 'listMurid']);
});

Route::get('/podcast', [PodcastController::class, 'getAllPodcast']);
Route::get('/podcast/{id}', [PodcastController::class, 'getPodcastById']);
Route::get('/likepodcast/{id}', [PodcastController::class, 'getTotalLikes']);

Route::get('/infografis', [InfografisController::class, 'getAllInfografis']);
Route::get('/infografis/{id}', [InfografisController::class, 'getInfografisById']);

Route::get('/videoedukasi', [VideoEdukasiController::class, 'getAllVideoEdukasi']);
Route::get('/videoedukasi/{id}', [VideoEdukasiController::class, 'getVideoEdukasiById']);

Route::get('/quote', [QuoteController::class, 'getAllQuote']);
Route::get('/quote/{id}', [QuoteController::class, 'getQuoteById']);

Route::get('/film', [FilmController::class, 'getAllFilm']);
Route::get('/film/{id}', [FilmController::class, 'getFilmById']);

Route::get('/jadwalahli', [JadwalAhliController::class, 'getAllJadwal']);
Route::get('/jadwalahli/{id}', [JadwalAhliController::class, 'getJadwalById']);
Route::get('/profileahli/{id}', [AhliController::class, 'getProfile']);

Route::get('/tanyaahli', [TanyaAhliController::class, 'getAllPertanyaan']);
Route::get('/tanyaahli/{id}', [TanyaAhliController::class, 'getPertanyaanById']);

Route::get('/topikpertanyaan', [TopikPertanyaanController::class, 'getAllTopik']);
Route::get('/topikpertanyaan/{id}', [TopikPertanyaanController::class, 'getTopikById']);

Route::get('/jawabanahli', [JawabanAhliController::class, 'getAllJawaban']);
Route::get('/jawabanahli/{id}', [JawabanAhliController::class, 'getJawabanById']);

Route::get('/kontenterbaru', [NewKontenController::class, 'getAllNewKonten']);
Route::get('/laporan-skrinning', [SkrinningController::class, 'getAllReport']);
Route::get('/export-skrinning', [SkrinningController::class, 'exportExcel']);

Route::get('/data-pengguna', [UserController::class, 'getAllUser']);
Route::get('/export-pengguna', [UserController::class, 'exportData']);



