<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\KecamatanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('instansi', InstansiController::class);
Route::get('/trash/instansi', [InstansiController::class, 'trash'])->name('instansi.trash');
Route::put('/instansi/restore/{id}', [InstansiController::class, 'restoreFromTrash'])->name('instansi.restore');
Route::delete('/instansi/permanent-delete/{id}', [InstansiController::class, 'deletePermanently'])->name('instansi.permanent-delete');

Route::apiResource('data-kecamatan', KecamatanController::class);
Route::get('/trash/data-kecamatan', [KecamatanController::class, 'trash'])->name('data-kecamatan.trash');
Route::put('/data-kecamatan/restore/{id}', [KecamatanController::class, 'restoreFromTrash'])->name('data-kecamatan.restore');
Route::delete('/data-kecamatan/permanent-delete/{id}', [KecamatanController::class, 'deletePermanently'])->name('data-kecamatan.permanent-delete');
