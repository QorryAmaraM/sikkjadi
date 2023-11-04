<?php

use App\Http\Controllers\CKPRController;
use App\Http\Controllers\CKPTController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntriAngkaKreditController;
use App\Http\Controllers\ListAngkaKreditController;
use App\Http\Controllers\ListUraianKegiatanController;
use App\Http\Controllers\MonitoringCKPController;
use App\Http\Controllers\MonitoringPresensiController;
use App\Http\Controllers\PenilaianCKPRController;
use App\Http\Controllers\PenilaianSKPController;
use App\Http\Controllers\RencanaKinerjaController;
use App\Http\Controllers\SKPTahunanController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//SKP Tahunan
Route::get('/perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('skptahunan');
Route::get('/perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create'])->name('createskpt');
Route::get('/perencanaankerja/spktahunan/edit', [SKPTahunanController::class, 'edit'])->name('editskpt');

//Rencana Kinerja
Route::get('/perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('rencanakinerja');
Route::get('/perencanaankerja/rencanakinerja/create', [RencanaKinerjaController::class, 'create'])->name('createrk');
Route::get('/perencanaankerja/rencanakinerja/edit', [RencanaKinerjaController::class, 'edit'])->name('editrk');

//Penilaian SKP
Route::get('/perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('penilaianskp');
Route::get('/perencanaanlerja/penilaianskp/create', [PenilaianSKPController::class, 'create'])->name('createpskp');
Route::get('/perencanaanlerja/penilaianskp/edit', [PenilaianSKPController::class, 'edit'])->name('editpskp');

//List Angka Kredit
Route::get('/masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('listangkakredit');
Route::get('/masterangkakredit/listangkakredit/create', [ListAngkaKreditController::class, 'create'])->name('createlak');
Route::get('/masterangkakredit/listangkakredit/edit', [ListAngkaKreditController::class, 'edit'])->name('editlak');

//Entri Angka Kredit
Route::get('/masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])-> name('entriangkakredit');
Route::get('/masterangkakredit/entriangkakredit/create', [EntriAngkaKreditController::class, 'create'])->name('createeak');
Route::get('/masterangkakredit/entriangkakredit/edit', [EntriAngkaKreditController::class, 'create'])->name('editeak');

//List Uraian Kredit
Route::get('/masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('uraiankegiatan');
Route::get('/masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create'])->name('createuk');
Route::get('/masterutaiankegiatan/uraiankegiatan/edit', [ListUraianKegiatanController::class, 'edit'])->name('edituk');

//CKP-T
Route::get('/ckp/ckpt', [CKPTController::class, 'index'])->name('ckpt');
Route::get('/ckp/ckpt/create', [CKPTController::class, 'create'])->name('createckpt');
Route::get('/ckp/ckpt/edit', [CKPTController::class, 'edit'])->name('editckpt');

//CKP-R
Route::get('/ckp/ckpr', [CKPRController::class, 'index'])->name('ckpr');
Route::get('/ckp/ckpr/create', [CKPRController::class, 'create'])->name('createckpr');
Route::get('/ckp/ckpr/edit', [CKPRController::class, 'edit'])->name('editckpr');

//Penilaian CKPR
Route::get('/ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('penilaianckpr');
Route::get('/ckp/penilaianckpr/create', [PenilaianCKPRController::class, 'create'])->name('createpckpr');
Route::get('/ckp/penilaianckpr/edit', [PenilaianCKPRController::class, 'edit'])->name('editpckpr');

//Monitoring CKP
Route::get('/monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('monitoringckp');
Route::get('/monitoring/monitoringckp/createmckp', [MonitoringCKPController::class, 'create'])->name('createmckp');
Route::get('/monitoring/monitoringckp/editmckp', [MonitoringCKPController::class, 'edit'])->name('editmckp');

//Monitoring Presensi
Route::get('/monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('monitoringpre');
Route::get('/monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create'])->name('createpre');
Route::get('/monitoring/monitorinpre/edit', [MonitoringPresensiController::class, 'edit'])->name('editpre');

Route::get('/logout', function () {
    return view('auth.login');
})->name('logout');
