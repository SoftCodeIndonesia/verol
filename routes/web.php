<?php

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index'])->middleware('permission:view transaksi')->name('transaction');
    Route::get('/transaction/add', [App\Http\Controllers\TransactionController::class, 'create'])->middleware('permission:create transaksi')->name('transaction.add');
    Route::post('/transaction/store', [App\Http\Controllers\TransactionController::class, 'store'])->middleware('permission:create transaksi')->name('transaction.store');
    Route::get('/transaction/edit/{id}', [App\Http\Controllers\TransactionController::class, 'edit'])->middleware('permission:edit transaksi')->name('transaction.edit');
    Route::put('/transaction/update/{id}', [App\Http\Controllers\TransactionController::class, 'update'])->middleware('permission:edit transaksi')->name('transaction.update');
    Route::delete('/transaction/destory/{id}', [App\Http\Controllers\TransactionController::class, 'destroy'])->middleware('permission:delete transaksi')->name('transaction.destroy');

    Route::get('/material', [App\Http\Controllers\MaterialController::class, 'index'])->middleware('permission:view material')->name('material');
    Route::get('/material/add', [App\Http\Controllers\MaterialController::class, 'create'])->middleware('permission:create material')->name('material.add');
    Route::post('/material/store', [App\Http\Controllers\MaterialController::class, 'store'])->middleware('permission:create material')->name('material.store');
    Route::get('/material/edit/{id}', [App\Http\Controllers\MaterialController::class, 'edit'])->middleware('permission:edit material')->name('material.edit');
    Route::put('/material/update/{id}', [App\Http\Controllers\MaterialController::class, 'update'])->middleware('permission:edit material')->name('material.update');
    Route::delete('/material/destory/{id}', [App\Http\Controllers\MaterialController::class, 'destroy'])->middleware('permission:delete material')->name('material.destroy');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->middleware('permission:view users')->name('users');
    Route::get('/user/add', [App\Http\Controllers\UserController::class, 'create'])->middleware('permission:view users')->name('user.add');
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->middleware('permission:view users')->name('user.update');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->middleware('permission:view users')->name('user.store');
    Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware('permission:view users')->name('user.edit');
    Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware('permission:view users')->name('user.destroy');

    Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->middleware('permission:view hak akses')->name('permission');
    Route::get('/permissions/add', [App\Http\Controllers\PermissionController::class, 'create'])->middleware('permission:create hak akses')->name('permission.create');
    Route::post('/permissions/store', [App\Http\Controllers\PermissionController::class, 'store'])->middleware('permission:create hak akses')->name('permission.store');
    Route::delete('/permissions/{id}', [App\Http\Controllers\PermissionController::class, 'destroy'])->middleware('permission:edit hak akses')->name('permission.destroy');
    Route::delete('/permissions/edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->middleware('permission:edit hak akses')->name('permission.edit');


    Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->middleware('permission:view jabatan')->name('roles');
    Route::get('/role/add', [App\Http\Controllers\RoleController::class, 'create'])->middleware('permission:create jabatan')->name('role.add');
    Route::post('/role/store', [App\Http\Controllers\RoleController::class, 'store'])->middleware('permission:create jabatan')->name('role.store');
});