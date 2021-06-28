<?php

use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\PagesController;
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
    return redirect('index');
});

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }
    }
});

//// Documentations pages
//Route::prefix('documentation')->group(function () {
//    Route::get('getting-started/references', [ReferencesController::class, 'index']);
//    Route::get('getting-started/changelog', [PagesController::class, 'index']);
//});

// Logs pages
Route::prefix('log')->name('log.')->group(function () {
    Route::resource('system', \App\Http\Controllers\Logs\SystemLogsController::class);
});

Route::prefix('accounts')->name('accounts.')->group(function () {
    Route::resource('users', UsersController::class);
    Route::resource('trainers', UsersController::class);
    Route::resource('admins', UsersController::class);
});


require __DIR__.'/auth.php';
