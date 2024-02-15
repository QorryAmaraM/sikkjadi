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
Route::get('/forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/print', function () {
    return view('pages/admin/print');
});

// Admin
Route::middleware(['checkRole:1'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'dashboard'])->name('admin_dashboard');

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
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit'])->name('edit');
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}/kuantitas-edit', [RencanaKinerjaController::class, 'edit_kuantitas'])->name('kuantitas.edit');
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}/kualitas-edit', [RencanaKinerjaController::class, 'edit_kualitas'])->name('kualitas.edit');
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}/waktu-edit', [RencanaKinerjaController::class, 'edit_waktu'])->name('waktu.edit');
    Route::put('/admin-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::get('/admin-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy'])->name('rencanakinerja.delete');

    //Penilaian SKP
    Route::get('/admin-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('admin_penilaianskp');
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
    Route::get('/admin-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit'])->name('listangkakredit.edit');
    Route::put('/admin-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::get('/admin-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy'])->name('listangkakredit.delete');

    //Entri Angka Kredit
    Route::get('/admin-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('admin_entriangkakredit');
    Route::post('/admin-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);

    //List Uraian Kredit
    Route::get('/admin-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('admin_uraiankegiatan');
    Route::get('/admin-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/admin-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/admin-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit'])->name('listuraiankredit.edit');
    Route::put('/admin-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::get('/admin-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy'])->name('listuraiankredit.delete');

    //CKP-T
    Route::get('/admin-ckp/ckpt', [CKPTController::class, 'index'])->name('admin_ckpt');
    Route::get('/admin-ckp/ckpt/search', [CKPTController::class, 'search']);
    Route::get('/admin-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/admin-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/admin-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit'])->name('ckpt.edit');
    Route::put('/admin-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::get('/admin-ckp/ckpt/{id}', [CKPTController::class, 'destroy'])->name('ckpt.delete');

    //CKP-R
    Route::get('/admin-ckp/ckpr', [CKPRController::class, 'index'])->name('admin_ckpr');
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
});

//Kepala Bps
Route::middleware(['checkRole:2'])->group(function () {
    Route::get('/kepalabps-dashboard', [DashboardController::class, 'dashboard'])->name('kepalabps_dashboard');

    //SKP Tahunan
    Route::get('/kepalabps-perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('kepalabps_skptahunan');
    Route::get('/kepalabps-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create']);
    Route::post('/kepalabps-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'store']);
    Route::get('/kepalabps-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'edit']);
    Route::put('/kepalabps-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'update']);
    Route::delete('/kepalabps-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'destroy']);

    //Rencana Kinerja
    Route::get('/kepalabps-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('kepalabps_rencanakinerja');
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'create']);
    Route::post('/kepalabps-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/kepalabps-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit']);
    Route::put('/kepalabps-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::delete('/kepalabps-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy']);

    //Penilaian SKP
    Route::get('/kepalabps-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('kepalabps_penilaianskp');
    Route::get('/kepalabps-perencanaankerja/penilaianskp/create', [PenilaianSKPController::class, 'create']);
    Route::post('/kepalabps-perencanaankerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/kepalabps-perencanaankerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit']);
    Route::put('/kepalabps-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::delete('/kepalabps-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy']);

    //List Angka Kredit
    Route::get('/kepalabps-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('kepalabps_listangkakredit');
    Route::get('/kepalabps-masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'create']);
    Route::post('/kepalabps-masterangkakredit/listangkakredit/store', [ListAngkaKreditController::class, 'post']);
    Route::get('/kepalabps-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit']);
    Route::put('/kepalabps-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::delete('/kepalabps-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy']);

    //Entri Angka Kredit
    Route::get('/kepalabps-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('kepalabps_entriangkakredit');
    Route::get('/kepalabps-masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'create']);
    Route::post('/kepalabps-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);
    Route::get('/kepalabps-masterangkakredit/entriangkakredit/{id}/edit', [EntriAngkaKreditController::class, 'edit']);
    Route::put('/kepalabps-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'update']);
    Route::delete('/kepalabps-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'destroy']);

    //List Uraian Kredit
    Route::get('/kepalabps-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('kepalabps_uraiankegiatan');
    Route::get('/kepalabps-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/kepalabps-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/kepalabps-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit']);
    Route::put('/kepalabps-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::delete('/kepalabps-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy']);

    //CKP-T
    Route::get('/kepalabps-ckp/ckpt', [CKPTController::class, 'index'])->name('kepalabps_ckpt');
    Route::get('/kepalabps-ckp/ckpt/{nama}/index', [CKPTController::class, 'index']);
    Route::get('/kepalabps-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/kepalabps-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/kepalabps-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit']);
    Route::put('/kepalabps-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::delete('/kepalabps-ckp/ckpt/{id}', [CKPTController::class, 'destroy']);

    //CKP-R
    Route::get('/kepalabps-ckp/ckpr', [CKPRController::class, 'index'])->name('kepalabps_ckpr');
    Route::get('/kepalabps-ckp/ckpr/create', [CKPRController::class, 'create']);
    Route::post('/kepalabps-ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/kepalabps-ckp/ckpr/{id}/edit', [CKPRController::class, 'edit']);
    Route::put('/kepalabps-ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::delete('/kepalabps-ckp/ckpr/{id}', [CKPRController::class, 'destroy']);

    //Penilaian CKPR
    Route::get('/kepalabps-ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('kepalabps_penilaianckpr');
    Route::get('/kepalabps-ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'create']);
    Route::post('/kepalabps-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/kepalabps-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit']);
    Route::put('/kepalabps-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::delete('/kepalabps-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy']);

    //Monitoring CKP
    Route::get('/kepalabps-monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('kepalabps_monitoringckp');
    Route::get('/kepalabps-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/kepalabps-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/kepalabps-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit']);
    Route::put('/kepalabps-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::delete('/kepalabps-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy']);

    //Monitoring Presensi
    Route::get('/kepalabps-monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('kepalabps_monitoringpre');
    Route::get('/kepalabps-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/kepalabps-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/kepalabps-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit']);
    Route::put('/kepalabps-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::delete('/kepalabps-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy']);
});

//Kepala Bu
Route::middleware(['checkRole:3'])->group(function () {
    Route::get('/kepalabu-dashboard', [DashboardController::class, 'dashboard'])->name('kepalabu_dashboard');

    //SKP Tahunan
    Route::get('/kepalabu-perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('kepalabu_skptahunan');
    Route::get('/kepalabu-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create']);
    Route::post('/kepalabu-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'store']);
    Route::get('/kepalabu-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'edit']);
    Route::put('/kepalabu-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'update']);
    Route::delete('/kepalabu-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'destroy']);

    //Rencana Kinerja
    Route::get('/kepalabu-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('kepalabu_rencanakinerja');
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'create']);
    Route::post('/kepalabu-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/kepalabu-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit']);
    Route::put('/kepalabu-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::delete('/kepalabu-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy']);

    //Penilaian SKP
    Route::get('/kepalabu-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('kepalabu_penilaianskp');
    Route::get('/kepalabu-perencanaankerja/penilaianskp/create', [PenilaianSKPController::class, 'create']);
    Route::post('/kepalabu-perencanaankerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/kepalabu-perencanaankerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit']);
    Route::put('/kepalabu-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::delete('/kepalabu-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy']);

    //List Angka Kredit
    Route::get('/kepalabu-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('kepalabu_listangkakredit');
    Route::get('/kepalabu-masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'create']);
    Route::post('/kepalabu-masterangkakredit/listangkakredit/store', [ListAngkaKreditController::class, 'post']);
    Route::get('/kepalabu-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit']);
    Route::put('/kepalabu-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::delete('/kepalabu-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy']);

    //Entri Angka Kredit
    Route::get('/kepalabu-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('kepalabu_entriangkakredit');
    Route::get('/kepalabu-masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'create']);
    Route::post('/kepalabu-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);
    Route::get('/kepalabu-masterangkakredit/entriangkakredit/{id}/edit', [EntriAngkaKreditController::class, 'edit']);
    Route::put('/kepalabu-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'update']);
    Route::delete('/kepalabu-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'destroy']);

    //List Uraian Kredit
    Route::get('/kepalabu-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('kepalabu_uraiankegiatan');
    Route::get('/kepalabu-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/kepalabu-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/kepalabu-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit']);
    Route::put('/kepalabu-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::delete('/kepalabu-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy']);

    //CKP-T
    Route::get('/kepalabu-ckp/ckpt', [CKPTController::class, 'depan'])->name('kepalabu_ckpt');
    Route::get('/kepalabu-ckp/ckpt/{nama}/index', [CKPTController::class, 'index']);
    Route::get('/kepalabu-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/kepalabu-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/kepalabu-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit']);
    Route::put('/kepalabu-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::delete('/kepalabu-ckp/ckpt/{id}', [CKPTController::class, 'destroy']);

    //CKP-R
    Route::get('/kepalabu-ckp/ckpr', [CKPRController::class, 'index'])->name('kepalabu_ckpr');
    Route::get('/kepalabu-ckp/ckpr/create', [CKPRController::class, 'create']);
    Route::post('/kepalabu-ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/kepalabu-ckp/ckpr/{id}/edit', [CKPRController::class, 'edit']);
    Route::put('/kepalabu-ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::delete('/kepalabu-ckp/ckpr/{id}', [CKPRController::class, 'destroy']);

    //Penilaian CKPR
    Route::get('/kepalabu-ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('kepalabu_penilaianckpr');
    Route::get('/kepalabu-ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'create']);
    Route::post('/kepalabu-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/kepalabu-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit']);
    Route::put('/kepalabu-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::delete('/kepalabu-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy']);

    //Monitoring CKP
    Route::get('/kepalabu-monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('kepalabu_monitoringckp');
    Route::get('/kepalabu-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/kepalabu-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/kepalabu-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit']);
    Route::put('/kepalabu-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::delete('/kepalabu-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy']);

    //Monitoring Presensi
    Route::get('/kepalabu-monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('kepalabu_monitoringpre');
    Route::get('/kepalabu-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/kepalabu-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/kepalabu-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit']);
    Route::put('/kepalabu-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::delete('/kepalabu-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy']);
});

//KF
Route::middleware(['checkRole:4'])->group(function () {
    Route::get('/kf-dashboard', [DashboardController::class, 'dashboard'])->name('kf_dashboard');

    //SKP Tahunan
    Route::get('/kf-perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('kf_skptahunan');
    Route::get('/kf-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create']);
    Route::post('/kf-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'store']);
    Route::get('/kf-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'edit']);
    Route::put('/kf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'update']);
    Route::delete('/kf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'destroy']);

    //Rencana Kinerja
    Route::get('/kf-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('kf_rencanakinerja');
    Route::get('/kf-perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'create']);
    Route::post('/kf-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/kf-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit']);
    Route::put('/kf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::delete('/kf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy']);

    //Penilaian SKP
    Route::get('/kf-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('kf_penilaianskp');
    Route::get('/kf-perencanaankerja/penilaianskp/create', [PenilaianSKPController::class, 'create']);
    Route::post('/kf-perencanaankerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/kf-perencanaankerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit']);
    Route::put('/kf-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::delete('/kf-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy']);

    //List Angka Kredit
    Route::get('/kf-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('kf_listangkakredit');
    Route::get('/kf-masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'create']);
    Route::post('/kf-masterangkakredit/listangkakredit/store', [ListAngkaKreditController::class, 'post']);
    Route::get('/kf-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit']);
    Route::put('/kf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::delete('/kf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy']);

    //Entri Angka Kredit
    Route::get('/kf-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('kf_entriangkakredit');
    Route::get('/kf-masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'create']);
    Route::post('/kf-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);
    Route::get('/kf-masterangkakredit/entriangkakredit/{id}/edit', [EntriAngkaKreditController::class, 'edit']);
    Route::put('/kf-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'update']);
    Route::delete('/kf-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'destroy']);

    //List Uraian Kredit
    Route::get('/kf-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('kf_uraiankegiatan');
    Route::get('/kf-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/kf-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/kf-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit']);
    Route::put('/kf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::delete('/kf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy']);

    //CKP-T
    Route::get('/kf-ckp/ckpt', [CKPTController::class, 'depan'])->name('kf_ckpt');
    Route::get('/kf-ckp/ckpt/{nama}/index', [CKPTController::class, 'index']);
    Route::get('/kf-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/kf-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/kf-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit']);
    Route::put('/kf-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::delete('/kf-ckp/ckpt/{id}', [CKPTController::class, 'destroy']);

    //CKP-R
    Route::get('/kf-ckp/ckpr', [CKPRController::class, 'index'])->name('kf_ckpr');
    Route::get('/kf-ckp/ckpr/create', [CKPRController::class, 'create']);
    Route::post('/kf-ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/kf-ckp/ckpr/{id}/edit', [CKPRController::class, 'edit']);
    Route::put('/kf-ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::delete('/kf-ckp/ckpr/{id}', [CKPRController::class, 'destroy']);

    //Penilaian CKPR
    Route::get('/kf-ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('kf_penilaianckpr');
    Route::get('/kf-ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'create']);
    Route::post('/kf-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/kf-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit']);
    Route::put('/kf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::delete('/kf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy']);

    //Monitoring CKP
    Route::get('/kf-monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('kf_monitoringckp');
    Route::get('/kf-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/kf-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/kf-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit']);
    Route::put('/kf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::delete('/kf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy']);

    //Monitoring Presensi
    Route::get('/kf-monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('kf_monitoringpre');
    Route::get('/kf-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/kf-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/kf-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit']);
    Route::put('/kf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::delete('/kf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy']);
});

Route::middleware(['checkRole:5'])->group(function () {
    Route::get('/staff-dashboard', [DashboardController::class, 'dashboard'])->name('staf_dashboard');

    //SKP Tahunan
    Route::get('/staf-perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('staf_skptahunan');
    Route::get('/staf-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create']);
    Route::post('/staf-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'store']);
    Route::get('/staf-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'edit']);
    Route::put('/staf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'update']);
    Route::delete('/staf-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'destroy']);

    //Rencana Kinerja
    Route::get('/staf-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('staf_rencanakinerja');
    Route::get('/staf-perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'create']);
    Route::post('/staf-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/staf-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit']);
    Route::put('/staf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::delete('/staf-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy']);

    //Penilaian SKP
    Route::get('/staf-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('staf_penilaianskp');
    Route::get('/staf-perencanaankerja/penilaianskp/create', [PenilaianSKPController::class, 'create']);
    Route::post('/staf-perencanaankerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/staf-perencanaankerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit']);
    Route::put('/staf-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::delete('/staf-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy']);

    //List Angka Kredit
    Route::get('/staf-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('staf_listangkakredit');
    Route::get('/staf-masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'create']);
    Route::post('/staf-masterangkakredit/listangkakredit/store', [ListAngkaKreditController::class, 'post']);
    Route::get('/staf-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit']);
    Route::put('/staf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::delete('/staf-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy']);

    //Entri Angka Kredit
    Route::get('/staf-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('staf_entriangkakredit');
    Route::get('/staf-masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'create']);
    Route::post('/staf-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);
    Route::get('/staf-masterangkakredit/entriangkakredit/{id}/edit', [EntriAngkaKreditController::class, 'edit']);
    Route::put('/staf-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'update']);
    Route::delete('/staf-masterangkakredit/entriangkakredit/{id}', [EntriAngkaKreditController::class, 'destroy']);

    //List Uraian Kredit
    Route::get('/staf-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('staf_uraiankegiatan');
    Route::get('/staf-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/staf-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/staf-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit']);
    Route::put('/staf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::delete('/staf-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy']);

    //CKP-T
    Route::get('/staf-ckp/ckpt', [CKPTController::class, 'depan'])->name('staf_ckpt');
    Route::get('/staf-ckp/ckpt/{nama}/index', [CKPTController::class, 'index']);
    Route::get('/staf-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/staf-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/staf-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit']);
    Route::put('/staf-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::delete('/staf-ckp/ckpt/{id}', [CKPTController::class, 'destroy']);

    //CKP-R
    Route::get('/staf-ckp/ckpr', [CKPRController::class, 'index'])->name('staf_ckpr');
    Route::get('/staf-ckp/ckpr/create', [CKPRController::class, 'create']);
    Route::post('/staf-ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/staf-ckp/ckpr/{id}/edit', [CKPRController::class, 'edit']);
    Route::put('/staf-ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::delete('/staf-ckp/ckpr/{id}', [CKPRController::class, 'destroy']);

    //Penilaian CKPR
    Route::get('/staf-ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('staf_penilaianckpr');
    Route::get('/staf-ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'create']);
    Route::post('/staf-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/staf-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit']);
    Route::put('/staf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::delete('/staf-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy']);

    //Monitoring CKP
    Route::get('/staf-monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('staf_monitoringckp');
    Route::get('/staf-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/staf-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/staf-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit']);
    Route::put('/staf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::delete('/staf-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy']);

    //Monitoring Presensi
    Route::get('/staf-monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('staf_monitoringpre');
    Route::get('/staf-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/staf-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/staf-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit']);
    Route::put('/staf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::delete('/staf-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy']);
});
