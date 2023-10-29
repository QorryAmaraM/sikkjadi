<?php

use App\Http\Controllers\CKPController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterAngkaKredit;
use App\Http\Controllers\MasterUraianKegiatan;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PerencanaanKerja;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Perencanaan Kerja
Route::get('/perencanaankerja/skptahunan', [PerencanaanKerja::class, 'skptahunan_index'])->name('skptahunan');
Route::get('/perencanaankerja/spktahunan/createpkt', [PerencanaanKerja::class, 'skptahunan_create'])->name('createpkt');
Route::get('/perencanaankerja/spktahunan/updatepkt', [PerencanaanKerja::class, 'skptahunan_update'])->name('updatepkt');
Route::get('/perencanaankerja/rencanakinerja', [PerencanaanKerja::class, 'rencanakinerja_index'])->name('rencanakinerja');
Route::get('/perencanaankerja/rencanakinerja/createrk', [PerencanaanKerja::class, 'rencanakinerja_create'])->name('createrk');
Route::get('/perencanaankerja/penilaianskp', [PerencanaanKerja::class, 'penilaianskp_index'])->name('penilaianskp');
Route::get('/perencanaanlerja/penilaianskp/addnilai', [PerencanaanKerja::class, 'penilaianskp_create'])->name('createskp');

//Master Angka Kredit
Route::get('/masterangkakredit/listangkakredit', [MasterAngkaKredit::class, 'listangkakredit_index'])->name('listangkakredit');
Route::get('/masterangkakredit/listangkakredit/createlist', [MasterAngkaKredit::class, 'listangkakredit_create'])->name('createlak');
Route::get('/masterangkakredit/entriangkakredit', [MasterAngkaKredit::class, 'entriangkakredit_index'])-> name('entriangkakredit');
Route::get('/masterangkakredit/entriangkakredit/createkredit', [MasterAngkaKredit::class, 'entriangkakredti_create'])->name('createeak');

//Master Uraian Kredit
Route::get('/masteruraiankegiatan/uraiankegiatan', [MasterUraianKegiatan::class, 'uraiankegiatan_index'])->name('uraiankegiatan');
Route::get('/masterutaiankegiatan/uraiankegiatan/addkegiatan', [MasterUraianKegiatan::class, 'uraiankegiatan_create'])->name('createuk');

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
