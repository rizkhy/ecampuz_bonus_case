<?php

use App\Livewire\Agency\AgencyPage;
use App\Livewire\Agency\CreateAgencyPage;
use App\Livewire\Agency\EditAgencyPage;
use App\Livewire\Login\LoginPage;
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

Route::get('/', LoginPage::class)->name('login');

Route::get('/logout', function () {
    session()->forget('user');
    return redirect()->route('login');
})->name('logout');

Route::group(['middleware'], function () {
    Route::prefix('agency')->name('agency.')->group(function () {
        Route::get('/', AgencyPage::class)->name('index');
        Route::get('/create', CreateAgencyPage::class)->name('create');
        Route::get('/edit/{id}', EditAgencyPage::class)->name('edit');
    });
});
