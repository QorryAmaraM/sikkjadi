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
    Route::get('/admin-perencanaankerja/skptahunan', [SKPTahunanController::class, 'admin_index'])->name('admin_skptahunan');
    Route::get('/admin-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'admin_create']);
    Route::post('/admin-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'admin_store']);
    Route::get('/admin-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'admin_edit']);
    Route::put('/admin-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'admin_update']);
    Route::delete('/admin-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'admin_destroy']);

    //Rencana Kinerja
    Route::get('/admin-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'admin_index'])->name('admin_rencanakinerja');
    Route::get('/admin-perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'admin_create']);
    Route::post('/admin-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'admin_store']);
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'admin_edit']);
    Route::put('/admin-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'admin_update']);
    Route::delete('/admin-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'admin_destroy']);

    //Penilaian SKP
    Route::get('/admin-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'admin_index'])->name('admin_penilaianskp');
    Route::get('/admin-perencanaanlerja/penilaianskp/create', [PenilaianSKPController::class, 'admin_create']);
    Route::post('/admin-perencanaanlerja/penilaianskp/store', [PenilaianSKPController::class, 'admin_store']);
    Route::get('/admin-perencanaanlerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'admin_edit']);
    Route::put('/admin-perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'admin_update']);
    Route::delete('/admin-perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'admin_destroy']);

    //List Angka Kredit
    Route::get('/admin-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'admin_index'])->name('admin_listangkakredit');
    Route::get('/admin-masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'admin_create']);
    Route::post('/admin-masterangkakredit/listangkakredit/store', [ListAngkaKreditController::class, 'admin_post']);
    Route::get('/admin-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'admin_edit']);
    Route::put('/admin-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'admin_update']);
    Route::delete('/admin-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'admin_destroy']);

    //Entri Angka Kredit
    Route::get('/admin-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'admin_index'])->name('admin_entriangkakredit');
    Route::get('/admin-masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'admin_create']);
    Route::post('/admin-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'admin_store']);
    Route::get('/admin-masterangkakredit/entriangkakredit/{id}/edit', [EntriAngkaKreditController::class, 'admin_edit']);
    Route::put('/admin-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'admin_update']);
    Route::delete('/admin-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'admin_destroy']);

    //List Uraian Kredit
    Route::get('/admin-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'admin_index'])->name('admin_uraiankegiatan');
    Route::get('/admin-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'admin_create']);
    Route::post('/admin-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'admin_store']);
    Route::get('/admin-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'admin_edit']);
    Route::put('/admin-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'admin_update']);
    Route::delete('/admin-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'admin_destroy']);

    //CKP-T
    Route::get('/admin-ckp/ckpt', [CKPTController::class, 'admin_depan'])->name('admin_ckpt');
    Route::get('/admin-ckp/ckpt/{nama}/index', [CKPTController::class, 'admin_index']);
    Route::get('/admin-ckp/ckpt/create', [CKPTController::class, 'admin_create']);
    Route::post('/admin-ckp/ckpt/store', [CKPTController::class, 'admin_store']);
    Route::get('/admin-ckp/ckpt/{id}/edit', [CKPTController::class, 'admin_edit']);
    Route::put('/admin-ckp/ckpt/{id}', [CKPTController::class, 'admin_update']);
    Route::delete('/admin-ckp/ckpt/{id}', [CKPTController::class, 'admin_destroy']);

    //CKP-R
    Route::get('/admin-ckp/ckpr', [CKPRController::class, 'admin_index'])->name('admin_ckpr');
    Route::get('/admin-ckp/ckpr/create', [CKPRController::class, 'admin_create']);
    Route::post('/admin-ckp/ckpr/store', [CKPRController::class, 'admin_store']);
    Route::get('/admin-ckp/ckpr/{id}/edit', [CKPRController::class, 'admin_edit']);
    Route::put('/admin-ckp/ckpr/{id}', [CKPRController::class, 'admin_update']);
    Route::delete('/admin-ckp/ckpr/{id}', [CKPRController::class, 'admin_destroy']);

    //Penilaian CKPR
    Route::get('/admin-ckp/penilaianckpr', [PenilaianCKPRController::class, 'admin_index'])->name('admin_penilaianckpr');
    Route::get('/admin-ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'admin_create']);
    Route::post('/admin-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'admin_store']);
    Route::get('/admin-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'admin_edit']);
    Route::put('/admin-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'admin_update']);
    Route::delete('/admin-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'admin_destroy']);

    //Monitoring CKP
    Route::get('/admin-monitoring/monitoringckp', [MonitoringCKPController::class, 'admin_index'])->name('admin_monitoringckp');
    Route::get('/admin-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'admin_create']);
    Route::post('/admin-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'admin_store']);
    Route::get('/admin-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'admin_edit']);
    Route::put('/admin-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'admin_update']);
    Route::delete('/admin-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'admin_destroy']);

    //Monitoring Presensi
    Route::get('/admin-monitoring/monitoringpre', [MonitoringPresensiController::class, 'admin_index'])->name('admin_monitoringpre');
    Route::get('/admin-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'admin_create']);
    Route::post('/admin-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'admin_store']);
    Route::get('/admin-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'admin_edit']);
    Route::put('/admin-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'admin_update']);
    Route::delete('/admin-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'admin_destroy']);
});

//Kepala Bps
Route::middleware(['checkRole:2'])->group(function () {
    Route::get('/kepalabps-dashboard', [DashboardController::class, 'kepalabps_dashboard'])->name('kepalabps_dashboard');

    //SKP Tahunan
    Route::get('/kepalabps-perencanaankerja/skptahunan', [SKPTahunanController::class, 'kepalabps_index'])->name('kepalabps_skptahunan');
    Route::get('/kepalabps-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'kepalabps_create']);
    Route::post('/kepalabps-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'kepalabps_store']);
    Route::get('/kepalabps-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'kepalabps_destroy']);

    //Rencana Kinerja
    Route::get('/kepalabps-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'kepalabps_index'])->name('kepalabps_rencanakinerja');
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'kepalabps_create']);
    Route::post('/kepalabps-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'kepalabps_store']);
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'kepalabps_destroy']);

    //Penilaian SKP
    Route::get('/kepalabps-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'kepalabps_index'])->name('kepalabps_penilaianskp');
    Route::get('/kepalabps-perencanaanlerja/penilaianskp/create', [PenilaianSKPController::class, 'kepalabps_create']);
    Route::post('/kepalabps-perencanaanlerja/penilaianskp/store', [PenilaianSKPController::class, 'kepalabps_store']);
    Route::get('/kepalabps-perencanaanlerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'kepalabps_destroy']);

    //List Angka Kredit
    Route::get('/kepalabps-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'kepalabps_index'])->name('kepalabps_listangkakredit');
    Route::get('/kepalabps-masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'kepalabps_create']);
    Route::post('/kepalabps-masterangkakredit/listangkakredit/store', [ListAngkaKreditController::class, 'kepalabps_post']);
    Route::get('/kepalabps-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'kepalabps_destroy']);

    //Entri Angka Kredit
    Route::get('/kepalabps-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'kepalabps_index'])->name('kepalabps_entriangkakredit');
    Route::get('/kepalabps-masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'kepalabps_create']);
    Route::post('/kepalabps-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'kepalabps_store']);
    Route::get('/kepalabps-masterangkakredit/entriangkakredit/{id}/edit', [EntriAngkaKreditController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'kepalabps_destroy']);

    //List Uraian Kredit
    Route::get('/kepalabps-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'kepalabps_index'])->name('kepalabps_uraiankegiatan');
    Route::get('/kepalabps-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'kepalabps_create']);
    Route::post('/kepalabps-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'kepalabps_store']);
    Route::get('/kepalabps-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'kepalabps_destroy']);

    //CKP-T
    Route::get('/kepalabps-ckp/ckpt', [CKPTController::class, 'kepalabps_depan'])->name('kepalabps_ckpt');
    Route::get('/kepalabps-ckp/ckpt/{nama}/index', [CKPTController::class, 'kepalabps_index']);
    Route::get('/kepalabps-ckp/ckpt/create', [CKPTController::class, 'kepalabps_create']);
    Route::post('/kepalabps-ckp/ckpt/store', [CKPTController::class, 'kepalabps_store']);
    Route::get('/kepalabps-ckp/ckpt/{id}/edit', [CKPTController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-ckp/ckpt/{id}', [CKPTController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-ckp/ckpt/{id}', [CKPTController::class, 'kepalabps_destroy']);

    //CKP-R
    Route::get('/kepalabps-ckp/ckpr', [CKPRController::class, 'kepalabps_index'])->name('kepalabps_ckpr');
    Route::get('/kepalabps-ckp/ckpr/create', [CKPRController::class, 'kepalabps_create']);
    Route::post('/kepalabps-ckp/ckpr/store', [CKPRController::class, 'kepalabps_store']);
    Route::get('/kepalabps-ckp/ckpr/{id}/edit', [CKPRController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-ckp/ckpr/{id}', [CKPRController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-ckp/ckpr/{id}', [CKPRController::class, 'kepalabps_destroy']);

    //Penilaian CKPR
    Route::get('/kepalabps-ckp/penilaianckpr', [PenilaianCKPRController::class, 'kepalabps_index'])->name('kepalabps_penilaianckpr');
    Route::get('/kepalabps-ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'kepalabps_create']);
    Route::post('/kepalabps-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'kepalabps_store']);
    Route::get('/kepalabps-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'kepalabps_destroy']);

    //Monitoring CKP
    Route::get('/kepalabps-monitoring/monitoringckp', [MonitoringCKPController::class, 'kepalabps_index'])->name('kepalabps_monitoringckp');
    Route::get('/kepalabps-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'kepalabps_create']);
    Route::post('/kepalabps-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'kepalabps_store']);
    Route::get('/kepalabps-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'kepalabps_destroy']);

    //Monitoring Presensi
    Route::get('/kepalabps-monitoring/monitoringpre', [MonitoringPresensiController::class, 'kepalabps_index'])->name('kepalabps_monitoringpre');
    Route::get('/kepalabps-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'kepalabps_create']);
    Route::post('/kepalabps-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'kepalabps_store']);
    Route::get('/kepalabps-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'kepalabps_edit']);
    Route::put('/kepalabps-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'kepalabps_update']);
    Route::delete('/kepalabps-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'kepalabps_destroy']);
});

//Kepala Bu
Route::middleware(['checkRole:3'])->group(function () {
    Route::get('/kepalabu-dashboard', [DashboardController::class, 'kepalabu_dashboard'])->name('kepalabu_dashboard');

    //SKP Tahunan
    Route::get('/kepalabu-perencanaankerja/skptahunan', [SKPTahunanController::class, 'kepalabu_index'])->name('kepalabu_skptahunan');
    Route::get('/kepalabu-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'kepalabu_create']);
    Route::post('/kepalabu-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'kepalabu_store']);
    Route::get('/kepalabu-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'kepalabu_destroy']);

    //Rencana Kinerja
    Route::get('/kepalabu-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'kepalabu_index'])->name('kepalabu_rencanakinerja');
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'kepalabu_create']);
    Route::post('/kepalabu-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'kepalabu_store']);
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'kepalabu_destroy']);

    //Penilaian SKP
    Route::get('/kepalabu-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'kepalabu_index'])->name('kepalabu_penilaianskp');
    Route::get('/kepalabu-perencanaanlerja/penilaianskp/create', [PenilaianSKPController::class, 'kepalabu_create']);
    Route::post('/kepalabu-perencanaanlerja/penilaianskp/store', [PenilaianSKPController::class, 'kepalabu_store']);
    Route::get('/kepalabu-perencanaanlerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'kepalabu_destroy']);

    //List Angka Kredit
    Route::get('/kepalabu-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'kepalabu_index'])->name('kepalabu_listangkakredit');
    Route::get('/kepalabu-masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'kepalabu_create']);
    Route::post('/kepalabu-masterangkakredit/listangkakredit/store', [ListAngkaKreditController::class, 'kepalabu_post']);
    Route::get('/kepalabu-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'kepalabu_destroy']);

    //Entri Angka Kredit
    Route::get('/kepalabu-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'kepalabu_index'])->name('kepalabu_entriangkakredit');
    Route::get('/kepalabu-masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'kepalabu_create']);
    Route::post('/kepalabu-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'kepalabu_store']);
    Route::get('/kepalabu-masterangkakredit/entriangkakredit/{id}/edit', [EntriAngkaKreditController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'kepalabu_destroy']);

    //List Uraian Kredit
    Route::get('/kepalabu-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'kepalabu_index'])->name('kepalabu_uraiankegiatan');
    Route::get('/kepalabu-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'kepalabu_create']);
    Route::post('/kepalabu-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'kepalabu_store']);
    Route::get('/kepalabu-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'kepalabu_destroy']);

    //CKP-T
    Route::get('/kepalabu-ckp/ckpt', [CKPTController::class, 'kepalabu_depan'])->name('kepalabu_ckpt');
    Route::get('/kepalabu-ckp/ckpt/{nama}/index', [CKPTController::class, 'kepalabu_index']);
    Route::get('/kepalabu-ckp/ckpt/create', [CKPTController::class, 'kepalabu_create']);
    Route::post('/kepalabu-ckp/ckpt/store', [CKPTController::class, 'kepalabu_store']);
    Route::get('/kepalabu-ckp/ckpt/{id}/edit', [CKPTController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-ckp/ckpt/{id}', [CKPTController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-ckp/ckpt/{id}', [CKPTController::class, 'kepalabu_destroy']);

    //CKP-R
    Route::get('/kepalabu-ckp/ckpr', [CKPRController::class, 'kepalabu_index'])->name('kepalabu_ckpr');
    Route::get('/kepalabu-ckp/ckpr/create', [CKPRController::class, 'kepalabu_create']);
    Route::post('/kepalabu-ckp/ckpr/store', [CKPRController::class, 'kepalabu_store']);
    Route::get('/kepalabu-ckp/ckpr/{id}/edit', [CKPRController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-ckp/ckpr/{id}', [CKPRController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-ckp/ckpr/{id}', [CKPRController::class, 'kepalabu_destroy']);

    //Penilaian CKPR
    Route::get('/kepalabu-ckp/penilaianckpr', [PenilaianCKPRController::class, 'kepalabu_index'])->name('kepalabu_penilaianckpr');
    Route::get('/kepalabu-ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'kepalabu_create']);
    Route::post('/kepalabu-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'kepalabu_store']);
    Route::get('/kepalabu-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'kepalabu_destroy']);

    //Monitoring CKP
    Route::get('/kepalabu-monitoring/monitoringckp', [MonitoringCKPController::class, 'kepalabu_index'])->name('kepalabu_monitoringckp');
    Route::get('/kepalabu-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'kepalabu_create']);
    Route::post('/kepalabu-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'kepalabu_store']);
    Route::get('/kepalabu-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'kepalabu_destroy']);

    //Monitoring Presensi
    Route::get('/kepalabu-monitoring/monitoringpre', [MonitoringPresensiController::class, 'kepalabu_index'])->name('kepalabu_monitoringpre');
    Route::get('/kepalabu-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'kepalabu_create']);
    Route::post('/kepalabu-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'kepalabu_store']);
    Route::get('/kepalabu-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'kepalabu_edit']);
    Route::put('/kepalabu-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'kepalabu_update']);
    Route::delete('/kepalabu-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'kepalabu_destroy']);
});

//KF
Route::middleware(['checkRole:4'])->group(function () {
    Route::get('/kf-dashboard', [DashboardController::class, 'kf_dashboard'])->name('kf_dashboard');

    //SKP Tahunan
    Route::get('/kf-perencanaankerja/skptahunan', [SKPTahunanController::class, 'kf_index'])->name('kf_skptahunan');
    Route::get('/kf-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'kf_create']);
    Route::post('/kf-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'kf_store']);
    Route::get('/kf-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'kf_edit']);
    Route::put('/kf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'kf_update']);
    Route::delete('/kf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'kf_destroy']);

    //Rencana Kinerja
    Route::get('/kf-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'kf_index'])->name('kf_rencanakinerja');
    Route::get('/kf-perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'kf_create']);
    Route::post('/kf-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'kf_store']);
    Route::get('/kf-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'kf_edit']);
    Route::put('/kf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'kf_update']);
    Route::delete('/kf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'kf_destroy']);

    //Penilaian SKP
    Route::get('/kf-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'kf_index'])->name('kf_penilaianskp');
    Route::get('/kf-perencanaanlerja/penilaianskp/create', [PenilaianSKPController::class, 'kf_create']);
    Route::post('/kf-perencanaanlerja/penilaianskp/store', [PenilaianSKPController::class, 'kf_store']);
    Route::get('/kf-perencanaanlerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'kf_edit']);
    Route::put('/kf-perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'kf_update']);
    Route::delete('/kf-perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'kf_destroy']);

    //List Angka Kredit
    Route::get('/kf-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'kf_index'])->name('kf_listangkakredit');
    Route::get('/kf-masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'kf_create']);
    Route::post('/kf-masterangkakredit/listangkakredit/store', [ListAngkaKreditController::class, 'kf_post']);
    Route::get('/kf-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'kf_edit']);
    Route::put('/kf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'kf_update']);
    Route::delete('/kf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'kf_destroy']);

    //Entri Angka Kredit
    Route::get('/kf-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'kf_index'])->name('kf_entriangkakredit');
    Route::get('/kf-masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'kf_create']);
    Route::post('/kf-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'kf_store']);
    Route::get('/kf-masterangkakredit/entriangkakredit/{id}/edit', [EntriAngkaKreditController::class, 'kf_edit']);
    Route::put('/kf-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'kf_update']);
    Route::delete('/kf-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'kf_destroy']);

    //List Uraian Kredit
    Route::get('/kf-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'kf_index'])->name('kf_uraiankegiatan');
    Route::get('/kf-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'kf_create']);
    Route::post('/kf-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'kf_store']);
    Route::get('/kf-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'kf_edit']);
    Route::put('/kf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'kf_update']);
    Route::delete('/kf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'kf_destroy']);

    //CKP-T
    Route::get('/kf-ckp/ckpt', [CKPTController::class, 'kf_depan'])->name('kf_ckpt');
    Route::get('/kf-ckp/ckpt/{nama}/index', [CKPTController::class, 'kf_index']);
    Route::get('/kf-ckp/ckpt/create', [CKPTController::class, 'kf_create']);
    Route::post('/kf-ckp/ckpt/store', [CKPTController::class, 'kf_store']);
    Route::get('/kf-ckp/ckpt/{id}/edit', [CKPTController::class, 'kf_edit']);
    Route::put('/kf-ckp/ckpt/{id}', [CKPTController::class, 'kf_update']);
    Route::delete('/kf-ckp/ckpt/{id}', [CKPTController::class, 'kf_destroy']);

    //CKP-R
    Route::get('/kf-ckp/ckpr', [CKPRController::class, 'kf_index'])->name('kf_ckpr');
    Route::get('/kf-ckp/ckpr/create', [CKPRController::class, 'kf_create']);
    Route::post('/kf-ckp/ckpr/store', [CKPRController::class, 'kf_store']);
    Route::get('/kf-ckp/ckpr/{id}/edit', [CKPRController::class, 'kf_edit']);
    Route::put('/kf-ckp/ckpr/{id}', [CKPRController::class, 'kf_update']);
    Route::delete('/kf-ckp/ckpr/{id}', [CKPRController::class, 'kf_destroy']);

    //Penilaian CKPR
    Route::get('/kf-ckp/penilaianckpr', [PenilaianCKPRController::class, 'kf_index'])->name('kf_penilaianckpr');
    Route::get('/kf-ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'kf_create']);
    Route::post('/kf-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'kf_store']);
    Route::get('/kf-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'kf_edit']);
    Route::put('/kf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'kf_update']);
    Route::delete('/kf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'kf_destroy']);

    //Monitoring CKP
    Route::get('/kf-monitoring/monitoringckp', [MonitoringCKPController::class, 'kf_index'])->name('kf_monitoringckp');
    Route::get('/kf-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'kf_create']);
    Route::post('/kf-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'kf_store']);
    Route::get('/kf-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'kf_edit']);
    Route::put('/kf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'kf_update']);
    Route::delete('/kf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'kf_destroy']);

    //Monitoring Presensi
    Route::get('/kf-monitoring/monitoringpre', [MonitoringPresensiController::class, 'kf_index'])->name('kf_monitoringpre');
    Route::get('/kf-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'kf_create']);
    Route::post('/kf-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'kf_store']);
    Route::get('/kf-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'kf_edit']);
    Route::put('/kf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'kf_update']);
    Route::delete('/kf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'kf_destroy']);
});

Route::middleware(['checkRole:5'])->group(function () {
    Route::get('/staff-dashboard', [DashboardController::class, 'staff_dashboard'])->name('staff_dashboard');

    //SKP Tahunan
    Route::get('/staf-perencanaankerja/skptahunan', [SKPTahunanController::class, 'staf_index'])->name('staf_skptahunan');
    Route::get('/staf-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'staf_create']);
    Route::post('/staf-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'staf_store']);
    Route::get('/staf-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'staf_edit']);
    Route::put('/staf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'staf_update']);
    Route::delete('/staf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'staf_destroy']);

    //Rencana Kinerja
    Route::get('/staf-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'staf_index'])->name('staf_rencanakinerja');
    Route::get('/staf-perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'staf_create']);
    Route::post('/staf-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'staf_store']);
    Route::get('/staf-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'staf_edit']);
    Route::put('/staf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'staf_update']);
    Route::delete('/staf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'staf_destroy']);

    //Penilaian SKP
    Route::get('/staf-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'staf_index'])->name('staf_penilaianskp');
    Route::get('/staf-perencanaanlerja/penilaianskp/create', [PenilaianSKPController::class, 'staf_create']);
    Route::post('/staf-perencanaanlerja/penilaianskp/store', [PenilaianSKPController::class, 'staf_store']);
    Route::get('/staf-perencanaanlerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'staf_edit']);
    Route::put('/staf-perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'staf_update']);
    Route::delete('/staf-perencanaanlerja/penilaianskp/{id}', [PenilaianSKPController::class, 'staf_destroy']);

    //List Angka Kredit
    Route::get('/staf-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'staf_index'])->name('staf_listangkakredit');
    Route::get('/staf-masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'staf_create']);
    Route::post('/staf-masterangkakredit/listangkakredit/store', [ListAngkaKreditController::class, 'staf_post']);
    Route::get('/staf-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'staf_edit']);
    Route::put('/staf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'staf_update']);
    Route::delete('/staf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'staf_destroy']);

    //Entri Angka Kredit
    Route::get('/staf-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'staf_index'])->name('staf_entriangkakredit');
    Route::get('/staf-masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'staf_create']);
    Route::post('/staf-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'staf_store']);
    Route::get('/staf-masterangkakredit/entriangkakredit/{id}/edit', [EntriAngkaKreditController::class, 'staf_edit']);
    Route::put('/staf-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'staf_update']);
    Route::delete('/staf-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'staf_destroy']);

    //List Uraian Kredit
    Route::get('/staf-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'staf_index'])->name('staf_uraiankegiatan');
    Route::get('/staf-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'staf_create']);
    Route::post('/staf-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'staf_store']);
    Route::get('/staf-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'staf_edit']);
    Route::put('/staf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'staf_update']);
    Route::delete('/staf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'staf_destroy']);

    //CKP-T
    Route::get('/staf-ckp/ckpt', [CKPTController::class, 'staf_depan'])->name('staf_ckpt');
    Route::get('/staf-ckp/ckpt/{nama}/index', [CKPTController::class, 'staf_index']);
    Route::get('/staf-ckp/ckpt/create', [CKPTController::class, 'staf_create']);
    Route::post('/staf-ckp/ckpt/store', [CKPTController::class, 'staf_store']);
    Route::get('/staf-ckp/ckpt/{id}/edit', [CKPTController::class, 'staf_edit']);
    Route::put('/staf-ckp/ckpt/{id}', [CKPTController::class, 'staf_update']);
    Route::delete('/staf-ckp/ckpt/{id}', [CKPTController::class, 'staf_destroy']);

    //CKP-R
    Route::get('/staf-ckp/ckpr', [CKPRController::class, 'staf_index'])->name('staf_ckpr');
    Route::get('/staf-ckp/ckpr/create', [CKPRController::class, 'staf_create']);
    Route::post('/staf-ckp/ckpr/store', [CKPRController::class, 'staf_store']);
    Route::get('/staf-ckp/ckpr/{id}/edit', [CKPRController::class, 'staf_edit']);
    Route::put('/staf-ckp/ckpr/{id}', [CKPRController::class, 'staf_update']);
    Route::delete('/staf-ckp/ckpr/{id}', [CKPRController::class, 'staf_destroy']);

    //Penilaian CKPR
    Route::get('/staf-ckp/penilaianckpr', [PenilaianCKPRController::class, 'staf_index'])->name('staf_penilaianckpr');
    Route::get('/staf-ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'staf_create']);
    Route::post('/staf-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'staf_store']);
    Route::get('/staf-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'staf_edit']);
    Route::put('/staf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'staf_update']);
    Route::delete('/staf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'staf_destroy']);

    //Monitoring CKP
    Route::get('/staf-monitoring/monitoringckp', [MonitoringCKPController::class, 'staf_index'])->name('staf_monitoringckp');
    Route::get('/staf-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'staf_create']);
    Route::post('/staf-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'staf_store']);
    Route::get('/staf-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'staf_edit']);
    Route::put('/staf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'staf_update']);
    Route::delete('/staf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'staf_destroy']);

    //Monitoring Presensi
    Route::get('/staf-monitoring/monitoringpre', [MonitoringPresensiController::class, 'staf_index'])->name('staf_monitoringpre');
    Route::get('/staf-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'staf_create']);
    Route::post('/staf-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'staf_store']);
    Route::get('/staf-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'staf_edit']);
    Route::put('/staf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'staf_update']);
    Route::delete('/staf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'staf_destroy']);
});
