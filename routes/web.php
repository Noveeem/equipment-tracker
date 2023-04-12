<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\EquipmentController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Directory Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('signup', [HomeController::class, 'newuser']);
Route::get('dashboard', [EquipmentController::class, 'viewRecords'], [HomeController::class, 'dashboard']);
Route::get('new-tracking', [HomeController::class, 'newtrack']);
Route::get('dashboard/history', [AuthenticateController::class, 'viewHistory'], [HomeController::class, 'history']);

//Not Allowed Routes
Route::get('auth', [HomeController::class, 'restricted']); 
Route::get('create', [HomeController::class, 'restricted']);


//Post Routes
Route::post('auth', [AuthenticateController::class, 'authenticate'])->name('auth');
Route::post('create', [AuthenticateController::class, 'register'])->name('create');
Route::post('track/equipment', [AuthenticateController::class, 'equipment'])->name('track');

//Logout Routes
Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');

//Search Routes
Route::get('dashboad/search', [AuthenticateController::class, 'search'])->name('search');