<?php

use App\Users\CompanyUsers\Controllers\CompanyUserController;
use App\Users\Stores\Controllers\StoreController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    /**
     * Stores
     */
    Route
        ::get('/stores', [StoreController::class, 'index'])
        ->middleware('can:view stores')
        ->name('users.stores.index');

    Route
        ::get('/stores/new', [StoreController::class, 'createOrEdit'])
        ->middleware('can:manage stores')
        ->name('users.stores.create');

    Route
        ::get('/stores/{store}', [StoreController::class, 'createOrEdit'])
        ->middleware('can:manage stores')
        ->name('users.stores.edit');

    Route
        ::post('/stores/{store?}', [StoreController::class, 'save'])
        ->middleware('can:manage stores')
        ->name('users.stores.save');

    /**
     * Company users
     */
    Route
        ::get('/company/users', [CompanyUserController::class, 'index'])
        ->middleware('can:manage company users')
        ->name('users.company-users.index');
});
