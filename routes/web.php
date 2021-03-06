<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::resources([
        'port' => PortContorllr::class,
        'company' => CompanyController::class,
        'company.company-email' => \Company\CompanyEmailController::class,
        'company.company-freight' => \Company\CompanyFreightController::class,
        'user' => UserController::class,
    ]);
});
