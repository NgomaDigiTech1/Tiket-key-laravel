<?php

use App\Http\Controllers\Admins\CompanyDashboardController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\DriverDashboardController;
use App\Http\Controllers\Admins\UserDashboardController;
use App\Http\Controllers\Companies\DashboardCompanyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['super.admin']], function(){
    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UserDashboardController::class);
    Route::resource('company', CompanyDashboardController::class);
    Route::resource('drivers', DriverDashboardController::class);
});


Route::group(['prefix' => 'company', 'as' => 'company.', 'middleware' => ['admin']], function () {
    Route::resource('dashboard', DashboardCompanyController::class);
});

