<?php

use App\Http\Controllers\CKPController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntriAngkaKreditController;
use App\Http\Controllers\ListAngkaKreditController;
use App\Http\Controllers\ListUraianKegiatanController;
use App\Http\Controllers\MasterAngkaKredit;
use App\Http\Controllers\MasterUraianKegiatan;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PenilaianSKPController;
use App\Http\Controllers\PerencanaanKerja;
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

//CKP
Route::get('/ckp/ckpt', [CKPController::class, 'ckpt_index'])->name('ckpt');
Route::get('/ckp/ckpt/createckpt', [CKPController::class, 'ckpt_create'])->name('createckpt');
Route::get('/ckp/ckpr', [CKPController::class, 'ckpr_index'])->name('ckpr');
Route::get('/ckp/ckpr/createckpr', [CKPController::class, 'ckpr_create'])->name('createckpr');
Route::get('/ckp/penilaianckpr', [CKPController::class, 'penilaianckpr_index'])->name('penilaianckpr');
Route::get('/ckp/penilaianckpr/addnilai', [CKPController::class, 'penilaianckpr_create'])->name('createpckpr');

//Monitoring 
Route::get('/monitoring/monitoringckp', [MonitoringController::class, 'monitoringckp_index'])->name('monitoringckp');
Route::get('/monitoring/monitoringckp/createmckp', [MonitoringController::class, 'monitoringckp_create'])->name('createmckp');
Route::get('/monitoring/monitoringpre', [MonitoringController::class, 'monitoringpre_index'])->name('monitoringpre');
Route::get('/monitoring/monitorinpre/createpre', [MonitoringController::class, 'monitoringpre_create'])->name('createpre');

Route::get('/logout', function () {
    return view('auth.login');
})->name('logout');
