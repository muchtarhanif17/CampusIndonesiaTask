<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PagesController::class, 'home']);
// Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/edit/{data}', [DashboardController::class, 'edit']);
Route::patch('/dashboard/{data}', [DashboardController::class, 'update']);
Route::get('/dashboard/changepassword', [DashboardController::class, 'editpassword']);
Route::patch('/dashboard/changepassword/{data}', [DashboardController::class, 'changepassword']);
Route::get('/dashboard/logout', [DashboardController::class, 'logout']);



Route::get('/campus', [PagesController::class, 'campus']);

// Routes User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::delete('/user/{user}', [UserController::class, 'destroy']);
Route::get('/user/{user}/edit', [UserController::class, 'edit']);




// Routes Kampus
Route::get('/campus', [CampusController::class, 'index']);
Route::get('/campus/create', [CampusController::class, 'create']);
Route::post('/campus', [CampusController::class, 'store']);
Route::delete('/campus/{institute_major}', [CampusController::class, 'destroy']);
Route::get('/campus/{institute_major}/edit', [CampusController::class, 'edit']);
Route::patch('/campus/{institute_major}', [CampusController::class, 'update']);

Route::get('/campus/institute', [InstituteController::class, 'index']);
Route::get('/campus/institute/create', [InstituteController::class, 'create']);
Route::post('/campus/institute', [InstituteController::class, 'store']);
Route::delete('/campus/institute/{institute}', [InstituteController::class, 'destroy']);
Route::get('/campus/institute/{institute}/edit', [InstituteController::class, 'edit']);
Route::patch('/campus/institute/{institute}', [InstituteController::class, 'update']);

Route::get('/campus/major', [MajorController::class, 'index']);
Route::get('/campus/major/create', [MajorController::class, 'create']);
Route::post('/campus/major', [MajorController::class, 'store']);
Route::delete('/campus/major/{major}', [MajorController::class, 'destroy']);
Route::get('/campus/major/{major}/edit', [MajorController::class, 'edit']);
Route::patch('/campus/major/{major}', [MajorController::class, 'update']);

//Route Article
Route::get('/artikel', [ArticleController::class, 'index']);
Route::get('/artikel/create', [ArticleController::class, 'create']);
Route::post('/artikel', [ArticleController::class, 'store']);
Route::delete('/artikel/{article}', [ArticleController::class, 'destroy']);
Route::get('/artikel/{article}/edit', [ArticleController::class, 'edit']);
Route::patch('/artikel/{article}', [ArticleController::class, 'update']);

//Route Login
Route::get('/login', [LoginController::class, 'index']);
// Route Login Google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
