<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\KecamatanController;

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

Route::get('/', function () {
    return view('pages.index');
});
Route::get('/photoss', function () {
    return view('photo');
});

Route::get('/dashboard', function () {
    return view('pages.index');
})->name('dashboard');

Route::resource('instansi', InstansiController::class);
Route::get('/trash/instansi', [InstansiController::class, 'trash'])->name('instansi.trash');
Route::put('/instansi/restore/{id}', [InstansiController::class, 'restoreFromTrash'])->name('instansi.restore');
Route::delete('/instansi/permanent-delete/{id}', [InstansiController::class, 'deletePermanently'])->name('instansi.permanent-delete');

Route::resource('data-kecamatan', KecamatanController::class);
Route::get('/trash/data-kecamatan', [KecamatanController::class, 'trash'])->name('data-kecamatan.trash');
Route::put('/data-kecamatan/restore/{id}', [KecamatanController::class, 'restoreFromTrash'])->name('data-kecamatan.restore');
Route::delete('/data-kecamatan/permanent-delete/{id}', [KecamatanController::class, 'deletePermanently'])->name('data-kecamatan.permanent-delete');
