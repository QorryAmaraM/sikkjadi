<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CKPRController;
use App\Http\Controllers\CKPTController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SKPTahunanController;
use App\Http\Controllers\PenilaianSKPController;
use App\Http\Controllers\MonitoringCKPController;
use App\Http\Controllers\PenilaianCKPRController;
use App\Http\Controllers\RencanaKinerjaController;
use App\Http\Controllers\ListAngkaKreditController;
use App\Http\Controllers\EntriAngkaKreditController;
use App\Http\Controllers\ListUraianKegiatanController;
use App\Http\Controllers\MonitoringPresensiController;
use App\Http\Controllers\AuthController;

// routes/web.php
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Admin
Route::middleware(['checkRole:1'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin_dashboard');

    //SKP Tahunan
    Route::get('/admin-perencanaankerja/skptahunan', [SKPTahunanController::class, 'admin_index'])->name('skptahunan');
    Route::get('/admin-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'admin_create']);
    Route::post('/admin-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'admin_store']);
    Route::get('/admin-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'admin_edit']);
    Route::put('/admin-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'admin_update']);
    Route::delete('/admin-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'admin_destroy']);

    //Rencana Kinerja
    Route::get('/perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('rencanakinerja');
    Route::get('/perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'create']);
    Route::post('/perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit']);
    Route::put('/perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::delete('/perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy']);

    //Penilaian SKP
    Route::get('/perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('penilaianskp');
    Route::get('/perencanaanlerja/penilaianskp/create', [PenilaianSKPController::class, 'create']);
    Route::post('/perencanaanlerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/perencanaanlerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit']);
    Route::put('/perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::delete('/perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy']);

    //List Angka Kredit
    Route::get('/masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('listangkakredit');
    Route::get('/masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'create']);
    Route::post('/masterangkakredit/listangkakredit/store', [ListAngkaKreditController::class, 'post']);
    Route::get('/masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit']);
    Route::put('/masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::delete('/masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy']);

    //Entri Angka Kredit
    Route::get('/masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('entriangkakredit');
    Route::get('/masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'create']);
    Route::post('/masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);
    Route::get('/masterangkakredit/entriangkakredit/{id}/edit', [EntriAngkaKreditController::class, 'edit']);
    Route::put('/masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'update']);
    Route::delete('/masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'destroy']);

    //List Uraian Kredit
    Route::get('/masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('uraiankegiatan');
    Route::get('/masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit']);
    Route::put('/masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::delete('/masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy']);

    //CKP-T
    Route::get('/ckp/ckpt', [CKPTController::class, 'depan'])->name('ckpt');
    Route::get('/ckp/ckpt/{nama}/index', [CKPTController::class, 'index']);
    Route::get('/ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/ckp/ckpt/{id}/edit', [CKPTController::class, 'edit']);
    Route::put('/ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::delete('/ckp/ckpt/{id}', [CKPTController::class, 'destroy']);

    //CKP-R
    Route::get('/ckp/ckpr', [CKPRController::class, 'index'])->name('ckpr');
    Route::get('/ckp/ckpr/create', [CKPRController::class, 'create']);
    Route::post('/ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/ckp/ckpr/{id}/edit', [CKPRController::class, 'edit']);
    Route::put('/ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::delete('/ckp/ckpr/{id}', [CKPRController::class, 'destroy']);

    //Penilaian CKPR
    Route::get('/ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('penilaianckpr');
    Route::get('/ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'create']);
    Route::post('/ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit']);
    Route::put('/ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::delete('/ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy']);

    //Monitoring CKP
    Route::get('/monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('monitoringckp');
    Route::get('/monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit']);
    Route::put('/monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::delete('/monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy']);

    //Monitoring Presensi
    Route::get('/monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('monitoringpre');
    Route::get('/monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit']);
    Route::put('/monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::delete('/monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy']);
});

Route::middleware(['checkRole:2'])->group(function () {
    Route::get('/kepalabps-dashboard', [DashboardController::class, 'kepalabps_dashboard'])->name('kepalabps_dashboard');
});

Route::middleware(['checkRole:3'])->group(function () {
    Route::get('/kepalabu-dashboard', [DashboardController::class, 'kepalabu_dashboard'])->name('kepalabu_dashboard');
});

Route::middleware(['checkRole:4'])->group(function () {
    Route::get('/kf-dashboard', [DashboardController::class, 'kf_dashboard'])->name('kf_dashboard');
});

Route::middleware(['checkRole:5'])->group(function () {
    Route::get('/staff-dashboard', [DashboardController::class, 'staff_dashboard'])->name('staff_dashboard');
});
