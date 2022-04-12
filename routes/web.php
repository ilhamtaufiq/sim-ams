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
Route::get('/home', function () {
    return view('home');
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

    Route::resource('pekerjaan', PekerjaanController::class, [
        'names' => [
            'index' => 'pekerjaan',
            'create' => 'pekerjaan.tambah',
            'store' => 'pekerjaan.store',
            'edit' => 'pekerjaan.edit',
            'update' => 'pekerjaan.update',
            'show' => 'pekerjaan.detail',
            // etc...
        ]
    ]);

    Route::resource('kontrak', KontrakController::class, [
        'names' => [
            'index' => 'kontrak',
            'create' => 'kontrak.tambah',
            'store' => 'kontrak.store',
            'edit' => 'kontrak.edit',
            'update' => 'kontrak.update',
            'show' => 'kontrak.detail',
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

    Route::resource('penyedia', PenyediaController::class, [
        'names' => [
            'index' => 'penyedia',
            'create' => 'penyedia.tambah',
            'store' => 'penyedia.store',
            'edit' => 'penyedia.edit',
            'update' => 'penyedia.update',
            'show' => 'penyedia.detail'
            // etc...
        ]
    ]);

    // Route::get('/pekerjaan/{pekerjaan_id}', [PekerjaanController::class, 'pekerjaan.detail']);
    // Single
    Route::get('/cover/kontrak/{kontrak}', [App\Http\Controllers\KontrakController::class, 'cover']);

    Route::get('/foto/pekerjaan/{pekerjaan}', [App\Http\Controllers\FotoController::class, 'progress']);
    Route::post('/foto/pekerjaan/post', [App\Http\Controllers\FotoController::class, 'storeFoto']);


    Route::get('/desa/{kec_id}', [App\Http\Controllers\DesaController::class, 'getdesa']);
    Route::get('/pekerjaan/kegiatan/{keg_id}', [App\Http\Controllers\PekerjaanController::class, 'getPekerjaan']);

    Route::get('/pekerjaan/tahun/{tahun}', [App\Http\Controllers\PekerjaanController::class, 'pekerjaan']);
    //TFL
    Route::get('/tfl', [App\Http\Controllers\PekerjaanController::class, 'tfl_index']);
    //Air Minum
    Route::get('/kegiatan', [App\Http\Controllers\KegiatanController::class, 'index']);
    Route::get('/kegiatan/{id}', [App\Http\Controllers\PekerjaanController::class, 'kegiatan'])->name('kegiatan');

    Route::get('/dok/tambah', [App\Http\Controllers\DokumenController::class, 'create']);
    Route::post('/dok/post', [App\Http\Controllers\DokumenController::class, 'store'])->name('dokumen.post');
});


require __DIR__.'/auth.php';
