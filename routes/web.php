<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CKPRController;
use App\Http\Controllers\CKPTController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SKPTahunanController;
use App\Http\Controllers\PenilaianSKPController;
use App\Http\Controllers\MonitoringCKPController;
use App\Http\Controllers\PenilaianCKPRController;
use App\Http\Controllers\MonitoringUserController;
use App\Http\Controllers\RencanaKinerjaController;
use App\Http\Controllers\ListAngkaKreditController;
use App\Http\Controllers\EntriAngkaKreditController;
use App\Http\Controllers\ListUraianKegiatanController;
use App\Http\Controllers\MonitoringPresensiController;

// routes/web.php
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Admin
Route::middleware(['checkRole:1'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/admin-profil', [DashboardController::class, 'profil']);

    //SKP Tahunan
    Route::get('/admin-perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('admin_skptahunan');
    Route::get('/admin-perencanaankerja/skptahunan/search', [SKPTahunanController::class, 'search']);
    Route::get('/admin-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create']);
    Route::post('/admin-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'store']);
    Route::get('/admin-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'edit'])->name('spktahunan.edit');
    Route::put('/admin-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'update']);
    Route::get('/admin-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'destroy'])->name('spktahunan.delete');

    //Rencana Kinerja
    Route::get('/admin-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('admin_rencanakinerja');
    Route::get('/admin-perencanaankerja/rencanakinerja/search', [RencanaKinerjaController::class, 'search']);
    Route::get('/admin-perencanaankerja/rencanakinerja/create/index', [RencanaKinerjaController::class, 'create_index']);
    Route::get('/admin-perencanaankerja/rencanakinerja/create/{id}', [RencanaKinerjaController::class, 'create']);
    Route::post('/admin-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit'])->name('rencanakinerja.edit');
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}/kuantitas-edit', [RencanaKinerjaController::class, 'edit_kuantitas'])->name('kuantitas.edit');
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}/kualitas-edit', [RencanaKinerjaController::class, 'edit_kualitas'])->name('kualitas.edit');
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}/waktu-edit', [RencanaKinerjaController::class, 'edit_waktu'])->name('waktu.edit');
    Route::put('/admin-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy'])->name('rencanakinerja.delete');

    //Penilaian SKP
    Route::get('/admin-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('admin_penilaianskp');
    Route::get('/admin-perencanaankerja/penilaianskp/print', [PenilaianSKPController::class, 'print']);
    Route::get('/admin-perencanaankerja/penilaianskp/search', [PenilaianSKPController::class, 'search']);
    Route::get('/admin-perencanaankerja/penilaianskp/create/index', [PenilaianSKPController::class, 'create_index']);
    Route::get('/admin-perencanaankerja/penilaianskp/create/search', [PenilaianSKPController::class, 'create_search']);
    Route::get('/admin-perencanaankerja/penilaianskp/create/{id}/kuantitas', [PenilaianSKPController::class, 'create_kuantitas'])->name('kuantitas.create');
    Route::get('/admin-perencanaankerja/penilaianskp/create/{id}/kualitas', [PenilaianSKPController::class, 'create_kualitas'])->name('kualitas.create');
    Route::get('/admin-perencanaankerja/penilaianskp/create/{id}/waktu', [PenilaianSKPController::class, 'create_waktu'])->name('waktu.create');
    Route::post('/admin-perencanaankerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/admin-perencanaankerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit'])->name('penilaianskp.edit');
    Route::put('/admin-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::get('/admin-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy'])->name('penilaianskp.delete');

    //List Angka Kredit
    Route::get('/admin-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('admin_listangkakredit');
    Route::get('/admin-masterangkakredit/listangkakredit/search', [ListAngkaKreditController::class, 'search']);
    Route::get('/admin-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit'])->name('listangkakredit.edit');
    Route::put('/admin-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::get('/admin-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy'])->name('listangkakredit.delete');

    //Entri Angka Kredit
    Route::get('/admin-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('admin_entriangkakredit');
    Route::post('/admin-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);

    //List Uraian Kredit
    Route::get('/admin-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('admin_uraiankegiatan');
    Route::get('/admin-masterutaiankegiatan/uraiankegiatan/search', [ListUraianKegiatanController::class, 'search']);
    Route::get('/admin-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/admin-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/admin-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit'])->name('listuraiankredit.edit');
    Route::put('/admin-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::get('/admin-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy'])->name('listuraiankredit.delete');

    //CKP-T
    Route::get('/admin-ckp/ckpt', [CKPTController::class, 'index'])->name('admin_ckpt');
    Route::get('/admin-ckp/ckpt/print', [CKPTController::class, 'print']);
    Route::get('/admin-ckp/ckpt/search', [CKPTController::class, 'search']);
    Route::get('/admin-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/admin-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/admin-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit'])->name('ckpt.edit');
    Route::put('/admin-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::get('/admin-ckp/ckpt/{id}', [CKPTController::class, 'destroy'])->name('ckpt.delete');

    //CKP-R
    Route::get('/admin-ckp/ckpr', [CKPRController::class, 'index'])->name('admin_ckpr');
    Route::get('/admin-ckp/ckpr/print', [CKPRController::class, 'print']);
    Route::get('/admin-ckp/ckpr/search', [CKPRController::class, 'search']);
    Route::get('/admin-ckp/ckpr/create/index', [CKPRController::class, 'create_index']);
    Route::get('/admin-ckp/ckpr/create/search', [CKPRController::class, 'create_search']);
    Route::get('/admin-ckp/ckpr/create/{id}', [CKPRController::class, 'create'])->name('ckpr.create');
    Route::post('/admin-ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/admin-ckp/ckpr/{id}/edit', [CKPRController::class, 'edit'])->name('ckpr.edit');
    Route::put('/admin-ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::get('/admin-ckp/ckpr/{id}', [CKPRController::class, 'destroy'])->name('ckpr.delete');

    //Penilaian CKPR
    Route::get('/admin-ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('admin_penilaianckpr');
    Route::get('/admin-ckp/penilaianckpr/saerch', [PenilaianCKPRController::class, 'search']);
    Route::get('/admin-ckp/penilaianckpr/search-create', [PenilaianCKPRController::class, 'search_create']);
    Route::get('/admin-ckp/penilaianckpr/create-index', [PenilaianCKPRController::class, 'create_index']);
    Route::get('/admin-ckp/penilaianckpr/create/{id}', [PenilaianCKPRController::class, 'create'])->name('penilaianckpr.create');
    Route::post('/admin-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/admin-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit'])->name('penilaianckpr.edit');
    Route::put('/admin-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::get('/admin-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy'])->name('penilaianckpr.delete');

    //Monitoring CKP
    Route::get('/admin-monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('admin_monitoringckp');
    Route::get('/admin-monitoring/monitoringckp/search', [MonitoringCKPController::class, 'search']);
    Route::get('/admin-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/admin-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/admin-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit'])->name('monitoringckp.edit');
    Route::put('/admin-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::get('/admin-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy'])->name('monitoringckp.delete');

    //Monitoring Presensi
    Route::get('/admin-monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('admin_monitoringpre');
    Route::get('/admin-monitoring/monitorinpre/search', [MonitoringPresensiController::class, 'search']);
    Route::get('/admin-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/admin-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/admin-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit'])->name('monitoringpresensi.edit');
    Route::put('/admin-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::get('/admin-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy'])->name('monitoringpresensi.delete');

    //Monitoring User
    Route::get('/admin-monitoring/monitoringuser', [MonitoringUserController::class, 'index'])->name('admin_monitoringuser');
    Route::get('/admin-monitoring/monitoringuser/search', [MonitoringUserController::class, 'search']);
    Route::get('/admin-monitoring/monitoringuser/create', [MonitoringUserController::class, 'create']);
    Route::post('/admin-monitoring/monitoringuser/store', [MonitoringUserController::class, 'store']);
    Route::get('/admin-monitoring/monitoringuser/{id}/edit', [MonitoringUserController::class, 'edit'])->name('monitoringuser.edit');
    Route::put('/admin-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'update']);
    Route::get('/admin-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'destroy'])->name('monitoringuser.delete');

    
});

//Kepala Bps
Route::middleware(['checkRole:2'])->group(function () {
    Route::get('/kepalabps-dashboard', [DashboardController::class, 'dashboard'])->name('kepalabps_dashboard');
    Route::get('/kepalabps-profil', [DashboardController::class, 'profil']);

    //SKP Tahunan
    Route::get('/kepalabps-perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('kepalabps_skptahunan');
    Route::get('/kepalabps-perencanaankerja/skptahunan/search', [SKPTahunanController::class, 'search']);
    Route::get('/kepalabps-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create']);
    Route::post('/kepalabps-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'store']);
    Route::get('/kepalabps-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'edit'])->name('kepalabps.spktahunan.edit');
    Route::put('/kepalabps-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'update']);
    Route::get('/kepalabps-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'destroy'])->name('kepalabps.spktahunan.delete');

    //Rencana Kinerja
    Route::get('/kepalabps-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('kepalabps_rencanakinerja');
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/search', [RencanaKinerjaController::class, 'search']);
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/create/index', [RencanaKinerjaController::class, 'create_index']);
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/create/{id}', [RencanaKinerjaController::class, 'create']);
    Route::post('/kepalabps-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit'])->name('kepalabps.rencanakinerja.edit');
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/{id}/kuantitas-edit', [RencanaKinerjaController::class, 'edit_kuantitas'])->name('kepalabps.kuantitas.edit');
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/{id}/kualitas-edit', [RencanaKinerjaController::class, 'edit_kualitas'])->name('kepalabps.kualitas.edit');
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/{id}/waktu-edit', [RencanaKinerjaController::class, 'edit_waktu'])->name('kepalabps.waktu.edit');
    Route::put('/kepalabps-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy'])->name('kepalabps.rencanakinerja.delete');

    //Penilaian SKP
    Route::get('/kepalabps-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('kepalabps_penilaianskp');
    Route::get('/kepalabps-perencanaankerja/penilaianskp/print', [PenilaianSKPController::class, 'print']);
    Route::get('/kepalabps-perencanaankerja/penilaianskp/search', [PenilaianSKPController::class, 'search']);
    Route::get('/kepalabps-perencanaankerja/penilaianskp/create/index', [PenilaianSKPController::class, 'create_index']);
    Route::get('/kepalabps-perencanaankerja/penilaianskp/create/search', [PenilaianSKPController::class, 'create_search']);
    Route::get('/kepalabps-perencanaankerja/penilaianskp/create/{id}/kuantitas', [PenilaianSKPController::class, 'create_kuantitas'])->name('kepalabps.kuantitas.create');
    Route::get('/kepalabps-perencanaankerja/penilaianskp/create/{id}/kualitas', [PenilaianSKPController::class, 'create_kualitas'])->name('kepalabps.kualitas.create');
    Route::get('/kepalabps-perencanaankerja/penilaianskp/create/{id}/waktu', [PenilaianSKPController::class, 'create_waktu'])->name('kepalabps.waktu.create');
    Route::post('/kepalabps-perencanaankerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/kepalabps-perencanaankerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit'])->name('kepalabps.penilaianskp.edit');
    Route::put('/kepalabps-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::get('/kepalabps-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy'])->name('kepalabps.penilaianskp.delete');

    //List Angka Kredit
    Route::get('/kepalabps-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('kepalabps_listangkakredit');
    Route::get('/kepalabps-masterangkakredit/listangkakredit/search', [ListAngkaKreditController::class, 'search']);
    Route::get('/kepalabps-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit'])->name('kepalabps.listangkakredit.edit');
    Route::put('/kepalabps-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::get('/kepalabps-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy'])->name('kepalabps.listangkakredit.delete');

    //Entri Angka Kredit
    Route::get('/kepalabps-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('kepalabps_entriangkakredit');
    Route::post('/kepalabps-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);

    //List Uraian Kredit
    Route::get('/kepalabps-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('kepalabps_uraiankegiatan');
    Route::get('/kepalabps-masterutaiankegiatan/uraiankegiatan/search', [ListUraianKegiatanController::class, 'search']);
    Route::get('/kepalabps-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/kepalabps-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/kepalabps-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit'])->name('kepalabps.listuraiankredit.edit');
    Route::put('/kepalabps-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::get('/kepalabps-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy'])->name('kepalabps.listuraiankredit.delete');

    //CKP-T
    Route::get('/kepalabps-ckp/ckpt', [CKPTController::class, 'index'])->name('kepalabps_ckpt');
    Route::get('/kepalabps-ckp/ckpt/print', [CKPTController::class, 'print']);
    Route::get('/kepalabps-ckp/ckpt/search', [CKPTController::class, 'search']);
    Route::get('/kepalabps-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/kepalabps-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/kepalabps-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit'])->name('kepalabps.ckpt.edit');
    Route::put('/kepalabps-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::get('/kepalabps-ckp/ckpt/{id}', [CKPTController::class, 'destroy'])->name('kepalabps.ckpt.delete');

    //CKP-R
    Route::get('/kepalabps-ckp/ckpr', [CKPRController::class, 'index'])->name('kepalabps_ckpr');
    Route::get('/kepalabps-ckp/ckpr/print', [CKPRController::class, 'print']);
    Route::get('/kepalabps-ckp/ckpr/search', [CKPRController::class, 'search']);
    Route::get('/kepalabps-ckp/ckpr/create/index', [CKPRController::class, 'create_index']);
    Route::get('/kepalabps-ckp/ckpr/create/search', [CKPRController::class, 'create_search']);
    Route::get('/kepalabps-ckp/ckpr/create/{id}', [CKPRController::class, 'create'])->name('kepalabps.ckpr.create');
    Route::post('/kepalabps-ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/kepalabps-ckp/ckpr/{id}/edit', [CKPRController::class, 'edit'])->name('kepalabps.ckpr.edit');
    Route::put('/kepalabps-ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::get('/kepalabps-ckp/ckpr/{id}', [CKPRController::class, 'destroy'])->name('kepalabps.ckpr.delete');

    //Penilaian CKPR
    Route::get('/kepalabps-ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('kepalabps_penilaianckpr');
    Route::get('/kepalabps-ckp/penilaianckpr/saerch', [PenilaianCKPRController::class, 'search']);
    Route::get('/kepalabps-ckp/penilaianckpr/search-create', [PenilaianCKPRController::class, 'search_create']);
    Route::get('/kepalabps-ckp/penilaianckpr/create-index', [PenilaianCKPRController::class, 'create_index']);
    Route::get('/kepalabps-ckp/penilaianckpr/create/{id}', [PenilaianCKPRController::class, 'create'])->name('kepalabps.penilaianckpr.create');
    Route::post('/kepalabps-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/kepalabps-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit'])->name('kepalabps.penilaianckpr.edit');
    Route::put('/kepalabps-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::get('/kepalabps-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy'])->name('kepalabps.penilaianckpr.delete');

    //Monitoring CKP
    Route::get('/kepalabps-monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('kepalabps_monitoringckp');
    Route::get('/kepalabps-monitoring/monitoringckp/search', [MonitoringCKPController::class, 'search']);
    Route::get('/kepalabps-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/kepalabps-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/kepalabps-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit'])->name('kepalabps.monitoringckp.edit');
    Route::put('/kepalabps-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::get('/kepalabps-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy'])->name('kepalabps.monitoringckp.delete');

    //Monitoring Presensi
    Route::get('/kepalabps-monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('kepalabps_monitoringpre');
    Route::get('/kepalabps-monitoring/monitorinpre/search', [MonitoringPresensiController::class, 'search']);
    Route::get('/kepalabps-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/kepalabps-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/kepalabps-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit'])->name('kepalabps.monitoringpresensi.edit');
    Route::put('/kepalabps-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::get('/kepalabps-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy'])->name('kepalabps.monitoringpresensi.delete');

    //Monitoring User
    Route::get('/kepalabps-monitoring/monitoringuser', [MonitoringUserController::class, 'index'])->name('kepalabps_monitoringuser');
    Route::get('/kepalabps-monitoring/monitoringuser/search', [MonitoringUserController::class, 'search']);
    Route::get('/kepalabps-monitoring/monitoringuser/create', [MonitoringUserController::class, 'create']);
    Route::post('/kepalabps-monitoring/monitoringuser/store', [MonitoringUserController::class, 'store']);
    Route::get('/kepalabps-monitoring/monitoringuser/{id}/edit', [MonitoringUserController::class, 'edit'])->name('kepalabps.monitoringuser.edit');
    Route::put('/kepalabps-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'update']);
    Route::get('/kepalabps-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'destroy'])->name('kepalabps.monitoringuser.delete');
});

//Kepala Bu
Route::middleware(['checkRole:3'])->group(function () {
    Route::get('/kepalabu-dashboard', [DashboardController::class, 'dashboard'])->name('kepalabu_dashboard');
    Route::get('/kepalabu-profil', [DashboardController::class, 'profil']);

    //SKP Tahunan
    Route::get('/kepalabu-perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('kepalabu_skptahunan');
    Route::get('/kepalabu-perencanaankerja/skptahunan/search', [SKPTahunanController::class, 'search']);
    Route::get('/kepalabu-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create']);
    Route::post('/kepalabu-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'store']);
    Route::get('/kepalabu-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'edit'])->name('kepalabu.spktahunan.edit');
    Route::put('/kepalabu-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'update']);
    Route::get('/kepalabu-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'destroy'])->name('kepalabu.spktahunan.delete');

    //Rencana Kinerja
    Route::get('/kepalabu-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('kepalabu_rencanakinerja');
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/search', [RencanaKinerjaController::class, 'search']);
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/create/index', [RencanaKinerjaController::class, 'create_index']);
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/create/{id}', [RencanaKinerjaController::class, 'create']);
    Route::post('/kepalabu-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit'])->name('kepalabu.rencanakinerja.edit');
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/{id}/kuantitas-edit', [RencanaKinerjaController::class, 'edit_kuantitas'])->name('kepalabu.kuantitas.edit');
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/{id}/kualitas-edit', [RencanaKinerjaController::class, 'edit_kualitas'])->name('kepalabu.kualitas.edit');
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/{id}/waktu-edit', [RencanaKinerjaController::class, 'edit_waktu'])->name('kepalabu.waktu.edit');
    Route::put('/kepalabu-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy'])->name('kepalabu.rencanakinerja.delete');

    //Penilaian SKP
    Route::get('/kepalabu-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('kepalabu_penilaianskp');
    Route::get('/kepalabu-perencanaankerja/penilaianskp/print', [PenilaianSKPController::class, 'print']);
    Route::get('/kepalabu-perencanaankerja/penilaianskp/search', [PenilaianSKPController::class, 'search']);
    Route::get('/kepalabu-perencanaankerja/penilaianskp/create/index', [PenilaianSKPController::class, 'create_index']);
    Route::get('/kepalabu-perencanaankerja/penilaianskp/create/search', [PenilaianSKPController::class, 'create_search']);
    Route::get('/kepalabu-perencanaankerja/penilaianskp/create/{id}/kuantitas', [PenilaianSKPController::class, 'create_kuantitas'])->name('kepalabu.kuantitas.create');
    Route::get('/kepalabu-perencanaankerja/penilaianskp/create/{id}/kualitas', [PenilaianSKPController::class, 'create_kualitas'])->name('kepalabu.kualitas.create');
    Route::get('/kepalabu-perencanaankerja/penilaianskp/create/{id}/waktu', [PenilaianSKPController::class, 'create_waktu'])->name('kepalabu.waktu.create');
    Route::post('/kepalabu-perencanaankerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/kepalabu-perencanaankerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit'])->name('kepalabu.penilaianskp.edit');
    Route::put('/kepalabu-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::get('/kepalabu-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy'])->name('kepalabu.penilaianskp.delete');

    //List Angka Kredit
    Route::get('/kepalabu-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('kepalabu_listangkakredit');
    Route::get('/kepalabu-masterangkakredit/listangkakredit/search', [ListAngkaKreditController::class, 'search']);
    Route::get('/kepalabu-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit'])->name('kepalabu.listangkakredit.edit');
    Route::put('/kepalabu-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::get('/kepalabu-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy'])->name('kepalabu.listangkakredit.delete');

    //Entri Angka Kredit
    Route::get('/kepalabu-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('kepalabu_entriangkakredit');
    Route::post('/kepalabu-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);

    //List Uraian Kredit
    Route::get('/kepalabu-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('kepalabu_uraiankegiatan');
    Route::get('/kepalabu-masterutaiankegiatan/uraiankegiatan/search', [ListUraianKegiatanController::class, 'search']);
    Route::get('/kepalabu-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/kepalabu-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/kepalabu-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit'])->name('kepalabu.listuraiankredit.edit');
    Route::put('/kepalabu-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::get('/kepalabu-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy'])->name('kepalabu.listuraiankredit.delete');

    //CKP-T
    Route::get('/kepalabu-ckp/ckpt', [CKPTController::class, 'index'])->name('kepalabu_ckpt');
    Route::get('/kepalabu-ckp/ckpt/print', [CKPTController::class, 'print']);
    Route::get('/kepalabu-ckp/ckpt/search', [CKPTController::class, 'search']);
    Route::get('/kepalabu-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/kepalabu-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/kepalabu-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit'])->name('kepalabu.ckpt.edit');
    Route::put('/kepalabu-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::get('/kepalabu-ckp/ckpt/{id}', [CKPTController::class, 'destroy'])->name('kepalabu.ckpt.delete');

    //CKP-R
    Route::get('/kepalabu-ckp/ckpr', [CKPRController::class, 'index'])->name('kepalabu_ckpr');
    Route::get('/kepalabu-ckp/ckpr/print', [CKPRController::class, 'print']);
    Route::get('/kepalabu-ckp/ckpr/search', [CKPRController::class, 'search']);
    Route::get('/kepalabu-ckp/ckpr/create/index', [CKPRController::class, 'create_index']);
    Route::get('/kepalabu-ckp/ckpr/create/search', [CKPRController::class, 'create_search']);
    Route::get('/kepalabu-ckp/ckpr/create/{id}', [CKPRController::class, 'create'])->name('kepalabu.ckpr.create');
    Route::post('/kepalabu-ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/kepalabu-ckp/ckpr/{id}/edit', [CKPRController::class, 'edit'])->name('kepalabu.ckpr.edit');
    Route::put('/kepalabu-ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::get('/kepalabu-ckp/ckpr/{id}', [CKPRController::class, 'destroy'])->name('kepalabu.ckpr.delete');

    //Penilaian CKPR
    Route::get('/kepalabu-ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('kepalabu_penilaianckpr');
    Route::get('/kepalabu-ckp/penilaianckpr/saerch', [PenilaianCKPRController::class, 'search']);
    Route::get('/kepalabu-ckp/penilaianckpr/search-create', [PenilaianCKPRController::class, 'search_create']);
    Route::get('/kepalabu-ckp/penilaianckpr/create-index', [PenilaianCKPRController::class, 'create_index']);
    Route::get('/kepalabu-ckp/penilaianckpr/create/{id}', [PenilaianCKPRController::class, 'create'])->name('kepalabu.penilaianckpr.create');
    Route::post('/kepalabu-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/kepalabu-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit'])->name('kepalabu.penilaianckpr.edit');
    Route::put('/kepalabu-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::get('/kepalabu-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy'])->name('kepalabu.penilaianckpr.delete');

    //Monitoring CKP
    Route::get('/kepalabu-monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('kepalabu_monitoringckp');
    Route::get('/kepalabu-monitoring/monitoringckp/search', [MonitoringCKPController::class, 'search']);
    Route::get('/kepalabu-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/kepalabu-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/kepalabu-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit'])->name('kepalabu.monitoringckp.edit');
    Route::put('/kepalabu-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::get('/kepalabu-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy'])->name('kepalabu.monitoringckp.delete');

    //Monitoring Presensi
    Route::get('/kepalabu-monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('kepalabu_monitoringpre');
    Route::get('/kepalabu-monitoring/monitorinpre/search', [MonitoringPresensiController::class, 'search']);
    Route::get('/kepalabu-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/kepalabu-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/kepalabu-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit'])->name('kepalabu.monitoringpresensi.edit');
    Route::put('/kepalabu-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::get('/kepalabu-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy'])->name('kepalabu.monitoringpresensi.delete');

    //Monitoring User
    Route::get('/kepalabu-monitoring/monitoringuser', [MonitoringUserController::class, 'index'])->name('kepalabu_monitoringuser');
    Route::get('/kepalabu-monitoring/monitoringuser/search', [MonitoringUserController::class, 'search']);
    Route::get('/kepalabu-monitoring/monitoringuser/create', [MonitoringUserController::class, 'create']);
    Route::post('/kepalabu-monitoring/monitoringuser/store', [MonitoringUserController::class, 'store']);
    Route::get('/kepalabu-monitoring/monitoringuser/{id}/edit', [MonitoringUserController::class, 'edit'])->name('kepalabu.monitoringuser.edit');
    Route::put('/kepalabu-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'update']);
    Route::get('/kepalabu-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'destroy'])->name('kepalabu.monitoringuser.delete');
});

//KF
Route::middleware(['checkRole:4'])->group(function () {
    Route::get('/kf-dashboard', [DashboardController::class, 'dashboard'])->name('kf_dashboard');
    Route::get('/kf-profil', [DashboardController::class, 'profil']);

    //SKP Tahunan
    Route::get('/kf-perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('kf_skptahunan');
    Route::get('/kf-perencanaankerja/skptahunan/search', [SKPTahunanController::class, 'search']);
    Route::get('/kf-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create']);
    Route::post('/kf-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'store']);
    Route::get('/kf-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'edit'])->name('kf.spktahunan.edit');
    Route::put('/kf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'update']);
    Route::get('/kf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'destroy'])->name('kf.spktahunan.delete');

    //Rencana Kinerja
    Route::get('/kf-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('kf_rencanakinerja');
    Route::get('/kf-perencanaankerja/rencanakinerja/search', [RencanaKinerjaController::class, 'search']);
    Route::get('/kf-perencanaankerja/rencanakinerja/create/index', [RencanaKinerjaController::class, 'create_index']);
    Route::get('/kf-perencanaankerja/rencanakinerja/create/{id}', [RencanaKinerjaController::class, 'create']);
    Route::post('/kf-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/kf-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit'])->name('kf.rencanakinerja.edit');
    Route::get('/kf-perencanaankerja/rencanakinerja/{id}/kuantitas-edit', [RencanaKinerjaController::class, 'edit_kuantitas'])->name('kf.kuantitas.edit');
    Route::get('/kf-perencanaankerja/rencanakinerja/{id}/kualitas-edit', [RencanaKinerjaController::class, 'edit_kualitas'])->name('kf.kualitas.edit');
    Route::get('/kf-perencanaankerja/rencanakinerja/{id}/waktu-edit', [RencanaKinerjaController::class, 'edit_waktu'])->name('kf.waktu.edit');
    Route::put('/kf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::get('/kf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy'])->name('kf.rencanakinerja.delete');

    //Penilaian SKP
    Route::get('/kf-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('kf_penilaianskp');
    Route::get('/kf-perencanaankerja/penilaianskp/print', [PenilaianSKPController::class, 'print']);
    Route::get('/kf-perencanaankerja/penilaianskp/search', [PenilaianSKPController::class, 'search']);
    Route::get('/kf-perencanaankerja/penilaianskp/create/index', [PenilaianSKPController::class, 'create_index']);
    Route::get('/kf-perencanaankerja/penilaianskp/create/search', [PenilaianSKPController::class, 'create_search']);
    Route::get('/kf-perencanaankerja/penilaianskp/create/{id}/kuantitas', [PenilaianSKPController::class, 'create_kuantitas'])->name('kf.kuantitas.create');
    Route::get('/kf-perencanaankerja/penilaianskp/create/{id}/kualitas', [PenilaianSKPController::class, 'create_kualitas'])->name('kf.kualitas.create');
    Route::get('/kf-perencanaankerja/penilaianskp/create/{id}/waktu', [PenilaianSKPController::class, 'create_waktu'])->name('kf.waktu.create');
    Route::post('/kf-perencanaankerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/kf-perencanaankerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit'])->name('kf.penilaianskp.edit');
    Route::put('/kf-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::get('/kf-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy'])->name('kf.penilaianskp.delete');

    //List Angka Kredit
    Route::get('/kf-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('kf_listangkakredit');
    Route::get('/kf-masterangkakredit/listangkakredit/search', [ListAngkaKreditController::class, 'search']);
    Route::get('/kf-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit'])->name('kf.listangkakredit.edit');
    Route::put('/kf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::get('/kf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy'])->name('kf.listangkakredit.delete');

    //Entri Angka Kredit
    Route::get('/kf-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('kf_entriangkakredit');
    Route::post('/kf-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);

    //List Uraian Kredit
    Route::get('/kf-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('kf_uraiankegiatan');
    Route::get('/kf-masterutaiankegiatan/uraiankegiatan/search', [ListUraianKegiatanController::class, 'search']);
    Route::get('/kf-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/kf-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/kf-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit'])->name('kf.listuraiankredit.edit');
    Route::put('/kf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::get('/kf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy'])->name('kf.listuraiankredit.delete');

    //CKP-T
    Route::get('/kf-ckp/ckpt', [CKPTController::class, 'index'])->name('kf_ckpt');
    Route::get('/kf-ckp/ckpt/print', [CKPTController::class, 'print']);
    Route::get('/kf-ckp/ckpt/search', [CKPTController::class, 'search']);
    Route::get('/kf-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/kf-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/kf-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit'])->name('kf.ckpt.edit');
    Route::put('/kf-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::get('/kf-ckp/ckpt/{id}', [CKPTController::class, 'destroy'])->name('kf.ckpt.delete');

    //CKP-R
    Route::get('/kf-ckp/ckpr', [CKPRController::class, 'index'])->name('kf_ckpr');
    Route::get('/kf-ckp/ckpr/print', [CKPRController::class, 'print']);
    Route::get('/kf-ckp/ckpr/search', [CKPRController::class, 'search']);
    Route::get('/kf-ckp/ckpr/create/index', [CKPRController::class, 'create_index']);
    Route::get('/kf-ckp/ckpr/create/search', [CKPRController::class, 'create_search']);
    Route::get('/kf-ckp/ckpr/create/{id}', [CKPRController::class, 'create'])->name('kf.ckpr.create');
    Route::post('/kf-ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/kf-ckp/ckpr/{id}/edit', [CKPRController::class, 'edit'])->name('kf.ckpr.edit');
    Route::put('/kf-ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::get('/kf-ckp/ckpr/{id}', [CKPRController::class, 'destroy'])->name('kf.ckpr.delete');

    //Penilaian CKPR
    Route::get('/kf-ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('kf_penilaianckpr');
    Route::get('/kf-ckp/penilaianckpr/saerch', [PenilaianCKPRController::class, 'search']);
    Route::get('/kf-ckp/penilaianckpr/search-create', [PenilaianCKPRController::class, 'search_create']);
    Route::get('/kf-ckp/penilaianckpr/create-index', [PenilaianCKPRController::class, 'create_index']);
    Route::get('/kf-ckp/penilaianckpr/create/{id}', [PenilaianCKPRController::class, 'create'])->name('kf.penilaianckpr.create');
    Route::post('/kf-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/kf-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit'])->name('kf.penilaianckpr.edit');
    Route::put('/kf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::get('/kf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy'])->name('kf.penilaianckpr.delete');

    //Monitoring CKP
    Route::get('/kf-monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('kf_monitoringckp');
    Route::get('/kf-monitoring/monitoringckp/search', [MonitoringCKPController::class, 'search']);
    Route::get('/kf-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/kf-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/kf-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit'])->name('kf.monitoringckp.edit');
    Route::put('/kf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::get('/kf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy'])->name('kf.monitoringckp.delete');

    //Monitoring Presensi
    Route::get('/kf-monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('kf_monitoringpre');
    Route::get('/kf-monitoring/monitorinpre/search', [MonitoringPresensiController::class, 'search']);
    Route::get('/kf-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/kf-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/kf-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit'])->name('kf.monitoringpresensi.edit');
    Route::put('/kf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::get('/kf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy'])->name('kf.monitoringpresensi.delete');

    //Monitoring User
    Route::get('/kf-monitoring/monitoringuser', [MonitoringUserController::class, 'index'])->name('kf_monitoringuser');
    Route::get('/kf-monitoring/monitoringuser/search', [MonitoringUserController::class, 'search']);
    Route::get('/kf-monitoring/monitoringuser/create', [MonitoringUserController::class, 'create']);
    Route::post('/kf-monitoring/monitoringuser/store', [MonitoringUserController::class, 'store']);
    Route::get('/kf-monitoring/monitoringuser/{id}/edit', [MonitoringUserController::class, 'edit'])->name('kf.monitoringuser.edit');
    Route::put('/kf-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'update']);
    Route::get('/kf-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'destroy'])->name('kf.monitoringuser.delete');
});

//Staf
Route::middleware(['checkRole:5'])->group(function () {
    Route::get('/staf-dashboard', [DashboardController::class, 'dashboard'])->name('staf_dashboard');
    Route::get('/staf-profil', [DashboardController::class, 'profil']);

    //SKP Tahunan
    Route::get('/staf-perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('staf_skptahunan');
    Route::get('/staf-perencanaankerja/skptahunan/search', [SKPTahunanController::class, 'search']);
    Route::get('/staf-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create']);
    Route::post('/staf-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'store']);
    Route::get('/staf-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'edit'])->name('staf.spktahunan.edit');
    Route::put('/staf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'update']);
    Route::get('/staf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'destroy'])->name('staf.spktahunan.delete');

    //Rencana Kinerja
    Route::get('/staf-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('staf_rencanakinerja');
    Route::get('/staf-perencanaankerja/rencanakinerja/search', [RencanaKinerjaController::class, 'search']);
    Route::get('/staf-perencanaankerja/rencanakinerja/create/index', [RencanaKinerjaController::class, 'create_index']);
    Route::get('/staf-perencanaankerja/rencanakinerja/create/{id}', [RencanaKinerjaController::class, 'create']);
    Route::post('/staf-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/staf-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit'])->name('staf.rencanakinerja.edit');
    Route::get('/staf-perencanaankerja/rencanakinerja/{id}/kuantitas-edit', [RencanaKinerjaController::class, 'edit_kuantitas'])->name('staf.kuantitas.edit');
    Route::get('/staf-perencanaankerja/rencanakinerja/{id}/kualitas-edit', [RencanaKinerjaController::class, 'edit_kualitas'])->name('staf.kualitas.edit');
    Route::get('/staf-perencanaankerja/rencanakinerja/{id}/waktu-edit', [RencanaKinerjaController::class, 'edit_waktu'])->name('staf.waktu.edit');
    Route::put('/staf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::get('/staf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy'])->name('staf.rencanakinerja.delete');

    //Penilaian SKP
    Route::get('/staf-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('staf_penilaianskp');
    Route::get('/staf-perencanaankerja/penilaianskp/print', [PenilaianSKPController::class, 'print']);
    Route::get('/staf-perencanaankerja/penilaianskp/search', [PenilaianSKPController::class, 'search']);
    Route::get('/staf-perencanaankerja/penilaianskp/create/index', [PenilaianSKPController::class, 'create_index']);
    Route::get('/staf-perencanaankerja/penilaianskp/create/search', [PenilaianSKPController::class, 'create_search']);
    Route::get('/staf-perencanaankerja/penilaianskp/create/{id}/kuantitas', [PenilaianSKPController::class, 'create_kuantitas'])->name('staf.kuantitas.create');
    Route::get('/staf-perencanaankerja/penilaianskp/create/{id}/kualitas', [PenilaianSKPController::class, 'create_kualitas'])->name('staf.kualitas.create');
    Route::get('/staf-perencanaankerja/penilaianskp/create/{id}/waktu', [PenilaianSKPController::class, 'create_waktu'])->name('staf.waktu.create');
    Route::post('/staf-perencanaankerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/staf-perencanaankerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit'])->name('staf.penilaianskp.edit');
    Route::put('/staf-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::get('/staf-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy'])->name('staf.penilaianskp.delete');

    //List Angka Kredit
    Route::get('/staf-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('staf_listangkakredit');
    Route::get('/staf-masterangkakredit/listangkakredit/search', [ListAngkaKreditController::class, 'search']);
    Route::get('/staf-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit'])->name('staf.listangkakredit.edit');
    Route::put('/staf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::get('/staf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy'])->name('staf.listangkakredit.delete');

    //Entri Angka Kredit
    Route::get('/staf-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('staf_entriangkakredit');
    Route::post('/staf-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);

    //List Uraian Kredit
    Route::get('/staf-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('staf_uraiankegiatan');
    Route::get('/staf-masterutaiankegiatan/uraiankegiatan/search', [ListUraianKegiatanController::class, 'search']);
    Route::get('/staf-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/staf-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/staf-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit'])->name('staf.listuraiankredit.edit');
    Route::put('/staf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::get('/staf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy'])->name('staf.listuraiankredit.delete');

    //CKP-T
    Route::get('/staf-ckp/ckpt', [CKPTController::class, 'index'])->name('staf_ckpt');
    Route::get('/staf-ckp/ckpt/print', [CKPTController::class, 'print']);
    Route::get('/staf-ckp/ckpt/search', [CKPTController::class, 'search']);
    Route::get('/staf-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/staf-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/staf-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit'])->name('staf.ckpt.edit');
    Route::put('/staf-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::get('/staf-ckp/ckpt/{id}', [CKPTController::class, 'destroy'])->name('staf.ckpt.delete');

    //CKP-R
    Route::get('/staf-ckp/ckpr', [CKPRController::class, 'index'])->name('staf_ckpr');
    Route::get('/staf-ckp/ckpr/print', [CKPRController::class, 'print']);
    Route::get('/staf-ckp/ckpr/search', [CKPRController::class, 'search']);
    Route::get('/staf-ckp/ckpr/create/index', [CKPRController::class, 'create_index']);
    Route::get('/staf-ckp/ckpr/create/search', [CKPRController::class, 'create_search']);
    Route::get('/staf-ckp/ckpr/create/{id}', [CKPRController::class, 'create'])->name('staf.ckpr.create');
    Route::post('/staf-ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/staf-ckp/ckpr/{id}/edit', [CKPRController::class, 'edit'])->name('staf.ckpr.edit');
    Route::put('/staf-ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::get('/staf-ckp/ckpr/{id}', [CKPRController::class, 'destroy'])->name('staf.ckpr.delete');

    //Penilaian CKPR
    Route::get('/staf-ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('staf_penilaianckpr');
    Route::get('/staf-ckp/penilaianckpr/saerch', [PenilaianCKPRController::class, 'search']);
    Route::get('/staf-ckp/penilaianckpr/search-create', [PenilaianCKPRController::class, 'search_create']);
    Route::get('/staf-ckp/penilaianckpr/create-index', [PenilaianCKPRController::class, 'create_index']);
    Route::get('/staf-ckp/penilaianckpr/create/{id}', [PenilaianCKPRController::class, 'create'])->name('staf.penilaianckpr.create');
    Route::post('/staf-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/staf-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit'])->name('staf.penilaianckpr.edit');
    Route::put('/staf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::get('/staf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy'])->name('staf.penilaianckpr.delete');

    //Monitoring CKP
    Route::get('/staf-monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('staf_monitoringckp');
    Route::get('/staf-monitoring/monitoringckp/search', [MonitoringCKPController::class, 'search']);
    Route::get('/staf-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/staf-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/staf-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit'])->name('staf.monitoringckp.edit');
    Route::put('/staf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::get('/staf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy'])->name('staf.monitoringckp.delete');

    //Monitoring Presensi
    Route::get('/staf-monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('staf_monitoringpre');
    Route::get('/staf-monitoring/monitorinpre/search', [MonitoringPresensiController::class, 'search']);
    Route::get('/staf-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/staf-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/staf-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit'])->name('staf.monitoringpresensi.edit');
    Route::put('/staf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::get('/staf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy'])->name('staf.monitoringpresensi.delete');

    //Monitoring User
    Route::get('/staf-monitoring/monitoringuser', [MonitoringUserController::class, 'index'])->name('staf_monitoringuser');
    Route::get('/staf-monitoring/monitoringuser/search', [MonitoringUserController::class, 'search']);
    Route::get('/staf-monitoring/monitoringuser/create', [MonitoringUserController::class, 'create']);
    Route::post('/staf-monitoring/monitoringuser/store', [MonitoringUserController::class, 'store']);
    Route::get('/staf-monitoring/monitoringuser/{id}/edit', [MonitoringUserController::class, 'edit'])->name('staf.monitoringuser.edit');
    Route::put('/staf-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'update']);
    Route::get('/staf-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'destroy'])->name('staf.monitoringuser.delete');
});