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






// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['namespace' => 'App\Http\Controllers','middleware' => ['auth','role:admin']], function()
{
    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('users', UsersController::class);

    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('/');

    // Route::resource('dashboard', DashboardController::class, [
    //     'names' => [
    //         'index' => 'dashboard',
    //         // etc...
    //     ]
    // ]);

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
    // Route::resource('foto', FotoController::class, [
    //     'names' => [
    //         'index' => 'foto',
    //         'create' => 'foto.tambah',
    //         'store' => 'foto.store',
    //         'edit' => 'foto.edit',
    //         'update' => 'foto.update',
    //         'show' => 'foto.detail'
    //         // etc...
    //     ]
    // ]);
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

    Route::resource('paket', PaketController::class, [
        'names' => [
            'index' => 'paket',
            'store' => 'paket.store',
            'update' => 'paket.update',
            'show' => 'paket.detail'
            // etc...
        ]
    ]);
    // Route::get('/pekerjaan/{pekerjaan_id}', [PekerjaanController::class, 'pekerjaan.detail']);
    // Single
    Route::post('/tfl/lokasi/', [App\Http\Controllers\UsersController::class, 'lokasi'])->name('tfl.lokasi');


    Route::get('/cover/kontrak/', [App\Http\Controllers\KontrakController::class, 'cover']);
    Route::get('/edit/kontrak/', [App\Http\Controllers\KontrakController::class, 'edit_kontrak']);
    Route::get('/edit/paket/', [App\Http\Controllers\PaketController::class, 'edit_paket']);



    Route::get('/foto/pekerjaan/{pekerjaan}', [App\Http\Controllers\FotoController::class, 'progress']);
    Route::post('/foto/pekerjaan/post', [App\Http\Controllers\FotoController::class, 'storeFoto']);

    Route::post('/target/output/', [App\Http\Controllers\OutputController::class, 'store']);



    Route::get('/desa/{kec_id}', [App\Http\Controllers\DesaController::class, 'getdesa']);
    Route::get('/pekerjaan/kegiatan/{keg_id}', [App\Http\Controllers\PekerjaanController::class, 'getPekerjaan']);
    Route::get('/pekerjaan/kegiatan/paket/{keg_id}', [App\Http\Controllers\PekerjaanController::class, 'getPaket']);


    Route::get('/pekerjaan/tahun/{tahun}', [App\Http\Controllers\PekerjaanController::class, 'pekerjaan']);
    Route::get('/edit/pekerjaan/', [App\Http\Controllers\PekerjaanController::class, 'ubahPekerjaan']);

    //V1.2
    //TFL
    //Air Minum
    Route::get('/kegiatan', [App\Http\Controllers\KegiatanController::class, 'index']);
    Route::get('/kegiatan/{id}', [App\Http\Controllers\PekerjaanController::class, 'kegiatan'])->name('kegiatan');

    Route::get('/dok/tambah', [App\Http\Controllers\DokumenController::class, 'create']);
});
Route::group(['middleware' => ['auth','role:admin|tfl']], function () {
    Route::get('/tfl', [App\Http\Controllers\PekerjaanController::class, 'tfl_index'])->name('tfl');
    Route::get('/sanitasi/dak/{pekerjaan}', [App\Http\Controllers\PekerjaanController::class, 'tfl_show']);
    Route::post('/realisasi/output/', [App\Http\Controllers\OutputRealisasiController::class, 'store'])->name('realisasi.output');
    Route::post('/foto/upload/', [App\Http\Controllers\FotoController::class, 'store'])->name('foto.store');
    Route::delete('foto/hapus/{foto}', [App\Http\Controllers\FotoController::class, 'destroy'])->name('foto.hapus');
    Route::post('/target/output/', [App\Http\Controllers\OutputController::class, 'store']);
    Route::post('/dok/post', [App\Http\Controllers\DokumenController::class, 'store'])->name('dokumen.post');



});


require __DIR__.'/auth.php';
