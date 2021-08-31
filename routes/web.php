<?php

use App\Users\Companies\Controllers\CompanyController;
use App\Users\CompanyUsers\Controllers\CompanyUserController;
use App\Users\Menus\Controllers\MenuController;
use App\Users\Menus\Controllers\PublicMenuController;
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

    /**
     * Company
     */
    Route
        ::get('/company', [CompanyController::class, 'show'])
        ->name('users.companies.show');

    /**
     * Menus
     */
    Route
        ::get('/menus', [MenuController::class, 'index'])
        ->name('users.menus.index');
    Route
        ::get('/menus/{menu}/details', [MenuController::class, 'show'])
        ->name('users.menus.show');
    Route
        ::get('/menus/new', [MenuController::class, 'createOrEdit'])
        ->middleware('can:manage menus')
        ->name('users.menus.create');
    Route
        ::get('/menus/{menu}', [MenuController::class, 'createOrEdit'])
        ->middleware('can:manage menus')
        ->name('users.menus.edit');
    Route
        ::post('/menus/{menu?}', [MenuController::class, 'save'])
        ->middleware('can:manage menus')
        ->name('users.menus.save');
});

/**
 * Public Menus
 */
Route
    ::get('/m/{company}/{menu}', [PublicMenuController::class, 'show'])
    ->name('guests.menus.show');
