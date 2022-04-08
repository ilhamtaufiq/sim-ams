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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('users', UsersController::class);

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
    Route::resource('realisasi', RealisasiController::class, [
        'names' => [
            'index' => 'realisasi',
            'create' => 'realisasi.tambah',
            'store' => 'realisasi.post',
            'edit' => 'dokumen.edit',
            'update' => 'realisasi.update',
            'show' => 'realisasi.detail'
            // etc...
        ]
    ]);

    // Route::get('/pekerjaan/{pekerjaan_id}', [PekerjaanController::class, 'pekerjaan.detail']);

    Route::get('/cover/kontrak/{kontrak}', [App\Http\Controllers\KontrakController::class, 'cover']);

    Route::get('/foto/pekerjaan/{pekerjaan}', [App\Http\Controllers\FotoController::class, 'progress']);
    Route::post('/foto/pekerjaan/post', [App\Http\Controllers\FotoController::class, 'storeFoto']);


    Route::get('/desa/{kec_id}', [App\Http\Controllers\DesaController::class, 'getdesa']);
    Route::get('/pekerjaan/kegiatan/{keg_id}', [App\Http\Controllers\PekerjaanController::class, 'getPekerjaan']);
});


require __DIR__.'/auth.php';
