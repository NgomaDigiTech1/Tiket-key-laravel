<?php

use App\Http\Controllers\Admins\BookingDashboardController;
use App\Http\Controllers\Admins\BusDashboardController;
use App\Http\Controllers\Admins\CompanyDashboardController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\DriverDashboardController;
use App\Http\Controllers\Admins\EventLogDashboardController;
use App\Http\Controllers\Admins\TownDashboardController;
use App\Http\Controllers\Admins\TrajetDashboardController;
use App\Http\Controllers\Admins\TravellerDashboardController;
use App\Http\Controllers\Admins\UserDashboardController;
use App\Http\Controllers\Admins\VerificationBackendController;
use App\Http\Controllers\App\BookingController;
use App\Http\Controllers\App\CompanyController;
use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\Companies\BookingCompanyController;
use App\Http\Controllers\Companies\BusCompanyController;
use App\Http\Controllers\Companies\DashboardCompanyController;
use App\Http\Controllers\Companies\DriverCompanyController;
use App\Http\Controllers\Companies\TrajetCompanyController;
use App\Http\Controllers\Companies\TravellerCompanyController;
use App\Http\Controllers\Companies\VerificationCompanyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['super.admin', 'auth']], function(){
    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UserDashboardController::class);
    Route::resource('company', CompanyDashboardController::class);
    Route::resource('drivers', DriverDashboardController::class);
    Route::get('chauffeurSuspendu', [DriverDashboardController::class, 'trashed'])->name('driver.trashed');
    Route::put('restoreDriver/{key}', [DriverDashboardController::class, 'restoreDriver'])->name('driver.restore');
    Route::delete('deleteDriver/{key}', [DriverDashboardController::class, 'forceDelete'])->name('driver.force');
    Route::resource('towns', TownDashboardController::class);
    Route::resource('bus', BusDashboardController::class);
    Route::resource('trajets', TrajetDashboardController::class);
    Route::resource('booking', BookingDashboardController::class);
    Route::put('confirmedBooking/{key}', [BookingDashboardController::class, 'active'])->name('booking.confirmed');
    Route::put('unconfirmedBooking/{key}', [BookingDashboardController::class, 'inactive'])->name('booking.inactive');
    Route::resource('travellers', TravellerDashboardController::class);
    Route::get('verificationTicket', [VerificationBackendController::class, 'verification'])->name('verification.index');
    Route::get('eventLog', [EventLogDashboardController::class, 'index'])->name('event.log');
});

Route::group(['prefix' => 'company', 'as' => 'company.', 'middleware' => ['admin', 'auth']], function () {
    Route::resource('dashboard', DashboardCompanyController::class);
    Route::resource('chauffeur', DriverCompanyController::class);
    Route::resource('bus', BusCompanyController::class);
    Route::resource('trajets', TrajetCompanyController::class);
    Route::resource('book', BookingCompanyController::class);
    Route::put('confirmedBooking/{key}', [BookingCompanyController::class, 'active'])->name('book.confirmed');
    Route::put('unconfirmedBooking/{key}', [BookingCompanyController::class, 'inactive'])->name('book.inactive');
    Route::resource('clients', TravellerCompanyController::class);
    Route::get('verificationTicket', [VerificationCompanyController::class, 'verification'])->name('verification.index');

    Route::get('company', [DashboardCompanyController::class, 'voir'])->name('company.profile');
    Route::put('userUpdate/{key}', [DashboardCompanyController::class, 'updateUser'])
        ->name('admin.update');

    Route::put('companyUpdate/{key}', [DashboardCompanyController::class, 'updateCompany'])
        ->name('company.update');
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('contact', [HomeController::class, 'contact'])->name('app.contact');
Route::get('company', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/{name}', [CompanyController::class, 'showCompany'])->name('company.detail');
Route::get('/booking/{key}', [CompanyController::class, 'booking'])->name('company.booking');
Route::post('reservation/', [CompanyController::class, 'book'])->name('booking.company');
Route::get('/confirmation', [CompanyController::class, 'confirmation'])->name('confirmation.index');
Route::post('contact', [HomeController::class, 'sendContact'])->name('contact.send');

Route::get('searchBooking/{search}', [BookingController::class, 'search'])->name('booking.search');


