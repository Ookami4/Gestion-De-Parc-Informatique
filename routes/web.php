<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\AccessoireController;
use App\Http\Controllers\LogicielController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MachineController;
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
    return view('auth.login');
})->name('login');

Auth::routes();

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/userProfil', function (){
    return view('userProfil');
})->name('userProfil')->middleware('auth');;


Route::resource('machines', MachineController::class)->middleware('is_admin');

Route::resource('users', UserController::class)->middleware('is_admin');

Route::resource('maintenances', MaintenanceController::class)->middleware('auth');
Route::get('admin/index', [MaintenanceController::class, 'indexadmin'])->name('maintenances.indexadmin')->middleware('is_admin');

Route::resource('logiciels', LogicielController::class)->middleware('auth');

Route::resource('factures', FactureController::class)->middleware('auth');

Route::resource('fournisseurs', FournisseurController::class)->middleware('auth');;

Route::resource('accessoires', AccessoireController::class)->middleware('auth');

Route::resource('materiels', MaterielController::class)->middleware('auth');
