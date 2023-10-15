<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/logout', function () {
    return view('auth.login');
})->name('logout');

Route::get('/skptahunan', function () {
    return view('pages.admin.skptahunan.index');
})->name('skptahunan');

Route::get('/createpkt', function () {
    return view('pages.admin.skptahunan.create');
})->name('createpkt');

Route::get('/updatepkt', function () {
    return view('pages.admin.skptahunan.edit');
})->name('updatepkt');

Route::get('/rencanakinerja', function () {
    return view('pages.admin.rencanakinerja.index');
});

Route::get('/createrk', function () {
    return view('pages.admin.rencanakinerja.create');
});

Route::get('/penilaianskp', function () {
    return view('pages.admin.penilaianskp.index');
});

Route::get('/addnilaiskp', function () {
    return view('pages.admin.penilaianskp.create');
});

Route::get('/listangkakredit', function () {
    return view('pages.admin.listangkakredit.index');
});

Route::get('/createlist', function () {
    return view('pages.admin.listangkakredit.create');
});

Route::get('/entriangkakredit', function () {
    return view('pages.admin.entriangkakredit.index');
});

Route::get('/createkredit', function () {
    return view('pages.admin.entriangkakredit.create');
});

Route::get('/uraiankegiatan', function () {
    return view('pages.admin.uraiankegiatan.index');
});

Route::get('/addkegiatan', function () {
    return view('pages.admin.uraiankegiatan.create');
});

Route::get('/ckpt', function () {
    return view('pages.admin.ckpt.index');
});

Route::get('/createckp', function () {
    return view('pages.admin.ckpt.create');
});

Route::get('/ckpr', function () {
    return view('pages.admin.ckpr.index');
});

Route::get('/createckpr', function () {
    return view('pages.admin.ckpr.create');
});

Route::get('/penilaianckpr', function () {
    return view('pages.admin.penilaianckpr.index');
});

Route::get('/addnilai', function () {
    return view('pages.admin.penilaianckpr.create');
});

Route::get('/monitoringckp', function () {
    return view('pages.admin.monitoringckp.index');
});

Route::get('/createmckp', function () {
    return view('pages.admin.monitoringckp.create');
});

Route::get('/monitoringpre', function () {
    return view('pages.admin.monitoringpre.index');
});
Route::get('/createpre', function () {
    return view('pages.admin.monitoringpre.create');
});


// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/', [WisataController::class, 'index'])->name('admin');
//     Route::resource('wisata', WisataController::class);
//     Route::resource('makanan', MakananController::class);
//     Route::resource('produk', ProdukController::class);
//     Route::resource('pejabat', PejabatController::class);
// });