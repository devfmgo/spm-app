<?php

use App\Http\Middleware\User;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\SuperUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(TypeController::class)->group(function () {
    Route::get('type', 'index')->name('index-type');
});

//View Document Only
Route::get('document', [DocumentController::class, 'index'])->name('index-document');

// Admin
Route::middleware([IsAdmin::class])->group(function () {
    // Router User Controller
    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('users');
        Route::get('/users/{id}', 'edit')->name('users.edit');
        Route::put('/users/{id}', 'update')->name('users.update');
        Route::delete('/users/{id}', 'destroy')->name('users.destroy');
        Route::get('/restore/{id}', 'restore')->name('users.restore');
        Route::get('user/trash', 'trash')->name('users.trash');
        Route::get('/user/{id}', 'empty')->name('users.empty');
        Route::get('/importpage', 'ImportUser')->name('user.importpage');
        Route::post('/importdata', 'ImportUserProccess');
        Route::get('/downloadformat', 'downloadFormatExcel')->name('user.formatimport');
    });

    //Document Controller
    Route::controller(DocumentController::class)->group(function () {

        Route::get('data-document/{id}', 'document_data')->name('data-document');
        Route::get('data-document/filter/{id}', 'filter')->name('filter');
        Route::get('search', 'search_document')->name('search-document');
        Route::get('add-document', 'create')->name('add-document');
        Route::get('act/{act}/{id}', 'restoreDelete')->name('resdel');
        Route::get('act/{id}', 'deleteAll')->name('permanent-delete');
        Route::post('save-document', 'store')->name('save-document');
        Route::get('download-admin/{slug}', 'downloadDocument')->name('download-admin');
        Route::get('admin-view/{slug}', 'show')->name('admin-view');
        Route::get(
            'document/{id}',
            'edit'
        )->name('edit-document');
        Route::put(
            'document/{id}',
            'update'
        )->name('update-document');
        Route::get('confirm-delete/{slug}', 'confirmDelete')->name('confirm-delete');
        Route::delete('delete/{id}', 'destroy')->name('delete');
        Route::get('deleteAll/{id}', 'deleteAll')->name('deleteAll');
    });

    Route::controller(UnitController::class)->group(function () {
        Route::get('unit', 'index')->name('index-unit');
        Route::get('create-unit', 'create')->name('create-unit');
        Route::post('save-unit', 'store')->name('save-unit');
        Route::get('unit/{id}', 'edit')->name('edit-unit');
        Route::put('edit/{id}', 'update')->name('update-unit');
        Route::delete('unit/{id}', 'destroy')->name('delete-unit');
    });
});

// SuperUser
Route::middleware([SuperUser::class])->group(function () {
    //Document Controller
    Route::controller(DocumentController::class)->group(function () {
        Route::get('super-view/{slug}', 'show')->name('super-view');
        Route::get('download-document/{slug}', 'downloadDocument')->name('download-document');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
// User
Route::middleware([User::class])->group(function () {
    //Document Controller
    Route::controller(DocumentController::class)->group(function () {
        Route::get('user-view/{slug}', 'show')->name('user-view');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});

Route::get('/reset', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage Link';
});
require __DIR__ . '/auth.php';
