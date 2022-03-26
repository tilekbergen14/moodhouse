<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, "index"])->name("login");
Route::post('/login', [LoginController::class, "store"]);

Route::get('/register', [RegisterController::class, "index"])->name("register");
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/admin', [AdminController::class, "index"])->name("admin");
Route::get('/admin/createshow', [AdminController::class, "createshowget"])->name("createshow");
Route::post('/admin/createshow', [AdminController::class, "createshowpost"])->name("createshow");

Route::get('/admin/addepisode', [EpisodeController::class, "index"])->name("addepisode");
Route::post('/admin/addepisode', [EpisodeController::class, "store"]);

Route::get('/admin/shows', [AdminController::class, "shows"])->name("admin-shows");

Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard");

Route::post('/logout', [LogoutController::class, "index"])->name("logout");

Route::get('/show/{show}', [ShowController::class, "index"])->name("show");
Route::delete('/show/{id}', [ShowController::class, "delete"]);


Route::get('/', [HomeController::class, "index"])->name("home");
// Route::post('/', [HomeController::class, "indexpost"]); About genres
