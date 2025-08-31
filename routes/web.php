<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusnessController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Livewire\AddUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\UserLogin;
Route::get('/',UserLogin::class)->name('login');
Route::get('logout',[AdminController::class , 'destroy'])->name('logout');
route::middleware(['auth:users'])->group(function(){
    route::get('dashboard',[AdminController::class, 'index'])->name('dashboard');
    route::get('sale',[SaleController::class ,'index'])->name('salepage');
    route::put('sales/{id}',[SaleController::class , 'update'])->name('updatesale');
    route::get('salesinvoice',[SaleController::class , 'invoice'])->name('salesinvoice');
    route::post('addsale',[SaleController::class , 'store'])->name('sale_submit');
    route::get('report',[ReportController::class ,'index'])->name('report');
    route::get('users',[UserController::class , 'index'])->name('users');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    route::post('adduser',[UserController::class , 'store'])->name('adduser_submit');
    route::get('busness',[BusnessController::class , 'index'])->name('busness');
    route::put('busness/{id}' ,[BusnessController::class , 'update'])->name('busnessupdate');
    Route::delete('/business/{id}', [BusnessController::class, 'destroy'])->name('business.destroy');
    route::get('usersbusness',[BusnessController::class , 'usersbusness'])->name('usersbusness');
    route::put('edit/user/busness/{id}', [BusnessController::class , 'updateUserBusness'])->name('userbusnessupdate');
    route::post('assignuser',[BusnessController::class ,'assign'])->name('assignbussness_submit');
    route::post('addbusness', [BusnessController::class, 'store'])->name('busness_submit');
    route::post('edit',[BusnessController::class , 'edit'])->name('busness_update');
});

