<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| CONTROLLER ADMIN
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\Admin\ItemController as AdminItem;
use App\Http\Controllers\Admin\TransactionController as AdminTransaction;
use App\Http\Controllers\Admin\ReportController as AdminReport;

/*
|--------------------------------------------------------------------------
| CONTROLLER USER
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\CategoryController as UserCategory;
use App\Http\Controllers\User\ItemController as UserItem;
use App\Http\Controllers\User\TransactionController as UserTransaction;

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN, REGISTER, LOGOUT)
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL (PUBLIC)
|--------------------------------------------------------------------------
| Bisa diakses TANPA LOGIN
*/
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| ROUTE SETELAH LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN AREA
    | prefix : /admin
    | role   : admin
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::get('/dashboard', [AdminDashboard::class, 'index'])
                ->name('dashboard');

            Route::resource('/categories', AdminCategory::class);

            Route::resource('/items', AdminItem::class);

            Route::resource('/transactions', AdminTransaction::class)
                ->only(['index', 'show', 'update']);

            Route::get('/reports', [AdminReport::class, 'index'])
                ->name('reports');
        });

    /*
    |--------------------------------------------------------------------------
    | USER AREA
    | role : user
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:user')->group(function () {

        Route::get('/kategori/{slug}', [UserCategory::class, 'show'])
            ->name('user.category.show');

        Route::get('/item/{id}', [UserItem::class, 'show'])
            ->name('user.item.show');

        Route::post('/sewa', [UserTransaction::class, 'store'])
            ->name('user.sewa');

        Route::get('/riwayat-transaksi', [UserTransaction::class, 'index'])
            ->name('user.riwayat');
    });
});

/*
|--------------------------------------------------------------------------
| REDIRECT SETELAH LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/home', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('home');
});
