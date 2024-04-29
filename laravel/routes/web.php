<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\PermissionController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin',[AuthController::class, 'index'])->name('auth.admin')->middleware(LoginMiddleware::class);
Route::post('login',[AuthController::class, 'login'])->name('auth.login');
Route::get('logout',[AuthController::class, 'logout'])->name('auth.logout');

Route::get('dashboard/index',[DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);
Route::group(['prefix'=>'user/catalogue'], function(){
    Route::get('index',[UserCatalogueController::class, 'index'])->name('user.catalogue.index')->middleware(AuthenticateMiddleware::class);
    Route::get('store',[UserCatalogueController::class, 'store'])->name('user.catalogue.store')->middleware(AuthenticateMiddleware::class);
    Route::post('create',[UserCatalogueController::class, 'create'])->name('user.catalogue.create')->middleware(AuthenticateMiddleware::class);
    Route::get('{id}/edit',[UserCatalogueController::class, 'edit'])->name('user.catalogue.edit')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
    Route::post('{id}/update',[UserCatalogueController::class, 'update'])->name('user.catalogue.update')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
    Route::get('{id}/destroy',[UserCatalogueController::class, 'destroy'])->name('user.catalogue.destroy')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
    Route::post('{id}/delete',[UserCatalogueController::class, 'delete'])->name('user.catalogue.delete')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
});
Route::post('ajax/dashboard/deleteAll',[AjaxDashboardController::class, 'deleteAll'])->name('ajax.dashboard.deleteAll')->middleware(AuthenticateMiddleware::class);
Route::group(['prefix'=>'user'], function(){
    Route::get('index',[UserController::class, 'index'])->name('user.index')->middleware(AuthenticateMiddleware::class);
    Route::get('store',[UserController::class, 'store'])->name('user.store')->middleware(AuthenticateMiddleware::class);
    Route::post('create',[UserController::class, 'create'])->name('user.create')->middleware(AuthenticateMiddleware::class);
    Route::get('{id}/edit',[UserController::class, 'edit'])->name('user.edit')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
    Route::post('{id}/update',[UserController::class, 'update'])->name('user.update')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
    Route::get('{id}/destroy',[UserController::class, 'destroy'])->name('user.destroy')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
    Route::post('{id}/delete',[UserController::class, 'delete'])->name('user.delete')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
});
Route::get('ajax/location/getLocation',[LocationController::class, 'getLocation'])->name('ajax.location.getLocation')->middleware(AuthenticateMiddleware::class);
Route::group(['prefix'=>'permission'], function(){
    Route::get('index',[PermissionController::class, 'index'])->name('permission.index')->middleware(AuthenticateMiddleware::class);
    Route::get('store',[PermissionController::class, 'store'])->name('permission.store')->middleware(AuthenticateMiddleware::class);;
    Route::post('create',[PermissionController::class, 'create'])->name('permission.create')->middleware(AuthenticateMiddleware::class);;
    Route::get('{id}/edit',[PermissionController::class, 'edit'])->name('permission.edit')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);;
    Route::post('{id}/update',[PermissionController::class, 'update'])->name('permission.update')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);;
    Route::get('{id}/destroy',[PermissionController::class, 'destroy'])->name('permission.destroy')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);;
    Route::post('{id}/delete',[PermissionController::class, 'delete'])->name('permission.delete')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);;
});