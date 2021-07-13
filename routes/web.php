<?php

use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Users\{UsersController, SessionsController};
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

    Route::resource('trainers', UsersController::class)->parameters(['trainers' => 'user']);
    Route::get('trainers/{trainer}/sessions', [SessionsController::class, 'index'])->name('trainers.sessions.index');
    Route::patch('trainers/{trainer}/sessions', [SessionsController::class, 'update'])->name('trainers.sessions.update');
    Route::get('trainers/{trainer}/sessions/create', [SessionsController::class, 'create'])->name('trainers.sessions.create');
    Route::post('trainers/{trainer}/sessions', [SessionsController::class, 'store'])->name('trainers.sessions.store');

    Route::resource('doctors', UsersController::class)->parameters(['doctors' => 'user']);
    Route::resource('vendors', UsersController::class)->parameters(['vendors' => 'user']);
    Route::resource('admins', UsersController::class)->parameters(['admins' => 'user']);
});

Route::prefix('invoices')->name('invoices.')->group(function () {
    Route::resource('sales',\App\Http\Controllers\Invoices\SalesInvoiceController::class);
    Route::resource('return_sales',\App\Http\Controllers\Invoices\ReturnSalesInvoiceController::class);
    Route::resource('purchases',\App\Http\Controllers\Invoices\PurchasesInvoiceController::class);
    Route::resource('return_purchases', \App\Http\Controllers\Settings\AppSettingsController::class);
});

Route::resource('activities', \App\Http\Controllers\Activities\ActivitiesController::class);

Route::resource('vaccines', \App\Http\Controllers\Vaccines\VaccinesController::class);

Route::resource('dogs', \App\Http\Controllers\Dogs\DogsController::class);
Route::resource('dogs.vaccines', \App\Http\Controllers\Dogs\VaccinesController::class);
Route::resource('dogs.activities', \App\Http\Controllers\Dogs\ActivitiesController::class);

Route::resource('hospitalities', \App\Http\Controllers\Hospitality\HospitalityController::class);

Route::resource('expenses', \App\Http\Controllers\Expenses\ExpensesController::class);

Route::resource('services', \App\Http\Controllers\Services\ServicesController::class);

Route::resource('factions',\App\Http\Controllers\Factions\FactionsController::class);

Route::resource('salaries',\App\Http\Controllers\Salaries\SalariesController::class);

Route::prefix('settings')->name('settings.')->group(function () {
    Route::resource('accounts', \App\Http\Controllers\Settings\AppSettingsController::class);
});



//Route::get('activity/session',[\App\Http\Controllers\ActivitySession\ActivitySessionController::class,'activitySessions'])->name('activity.sessions');

//Route::get('dog/{id}',[\App\Http\Controllers\Dogs\DogsController::class,'profile'])->name('dogs.profile');


require __DIR__ . '/auth.php';
