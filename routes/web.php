<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;







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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('dashboard', DashboardController::class, [
        'names' => [
            'index' => 'dashboard',
            // etc...
        ]
    ]);
    Route::resource('kegiatan', KegiatanController::class, [
        'names' => [
            'index' => 'kegiatan',
            // etc...
        ]
    ]);
    Route::resource('pekerjaan', PekerjaanController::class, [
        'names' => [
            'index' => 'pekerjaan',
            'create' => 'pekerjaan.tambah',
            'store' => 'pekerjaan.store',
            'edit' => 'pekerjaan.edit',
            'update' => 'pekerjaan.update',
            'show' => 'pekerjaan.detail'
            // etc...
        ]
    ]);
    Route::get('/pekerjaan/tahun/{tahun}', [PekerjaanController::class, 'pekerjaan']);

    Route::resource('kontrak', KontrakController::class, [
        'names' => [
            'index' => 'kontrak',
            'create' => 'kontrak.tambah',
            'store' => 'kontrak.store',
            'edit' => 'kontrak.edit',
            'update' => 'kontrak.update',
            'show' => 'kontrak.detail'
            // etc...
        ]
    ]);
    Route::resource('foto', FotoController::class, [
        'names' => [
            'index' => 'foto',
            'create' => 'foto.tambah',
            'store' => 'foto.store',
            'edit' => 'foto.edit',
            'update' => 'foto.update',
            'show' => 'foto.detail'
            // etc...
        ]
    ]);
    Route::resource('dokumen', DokumenController::class, [
        'names' => [
            'index' => 'dokumen',
            'create' => 'dokumen.tambah',
            'store' => 'dokumen.post',
            'edit' => 'dokumen.edit',
            'update' => 'dokumen.update',
            'show' => 'dokumen.detail'
            // etc...
        ]
    ]);
    Route::get('/pekerjaan/{pekerjaan_id}', [PekerjaanController::class, 'pekerjaan.detail']);

    Route::get('/cover/kontrak/{kontrak}', [KontrakController::class, 'cover']);

    Route::get('/foto/pekerjaan/{pekerjaan}', [FotoController::class, 'progress']);
    Route::post('/foto/pekerjaan/post', [FotoController::class, 'storeFoto']);


    Route::get('/desa/{kec_id}', [DesaController::class, 'getdesa']);
    Route::get('/pekerjaan/kegiatan/{keg_id}', [PekerjaanController::class, 'getPekerjaan']);


});


require __DIR__.'/auth.php';
