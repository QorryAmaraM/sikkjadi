Route::get('/staff-dashboard', [DashboardController::class, 'dashboard'])->name('staff_dashboard');
    Route::get('/staff-profil', [DashboardController::class, 'profil']);

    //SKP Tahunan
    Route::get('/staff-perencanaankerja/skptahunan', [SKPTahunanController::class, 'index'])->name('staff_skptahunan');
    Route::get('/staff-perencanaankerja/skptahunan/search', [SKPTahunanController::class, 'search']);
    Route::get('/staff-perencanaankerja/spktahunan/create', [SKPTahunanController::class, 'create']);
    Route::post('/staff-perencanaankerja/spktahunan/store', [SKPTahunanController::class, 'store']);
    Route::get('/staff-perencanaankerja/spktahunan/{id}/edit', [SKPTahunanController::class, 'edit'])->name('staff.spktahunan.edit');
    Route::put('/staff-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'update']);
    Route::get('/staff-perencanaankerja/spktahunan/{id}', [SKPTahunanController::class, 'destroy'])->name('staff.spktahunan.delete');

    //Rencana Kinerja
    Route::get('/staff-perencanaankerja/rencanakinerja', [RencanaKinerjaController::class, 'index'])->name('staff_rencanakinerja');
    Route::get('/staff-perencanaankerja/rencanakinerja/search', [RencanaKinerjaController::class, 'search']);
    Route::get('/staff-perencanaankerja/rencanakinerja/create/index', [RencanaKinerjaController::class, 'create_index']);
    Route::get('/staff-perencanaankerja/rencanakinerja/create/{id}', [RencanaKinerjaController::class, 'create']);
    Route::post('/staff-perencanaankerja/rencanakinerja/store', [RencanaKinerjaController::class, 'store']);
    Route::get('/staff-perencanaankerja/rencanakinerja/{id}/edit', [RencanaKinerjaController::class, 'edit'])->name('staff.rencanakinerja.edit');
    Route::get('/staff-perencanaankerja/rencanakinerja/{id}/kuantitas-edit', [RencanaKinerjaController::class, 'edit_kuantitas'])->name('staff.kuantitas.edit');
    Route::get('/staff-perencanaankerja/rencanakinerja/{id}/kualitas-edit', [RencanaKinerjaController::class, 'edit_kualitas'])->name('staff.kualitas.edit');
    Route::get('/staff-perencanaankerja/rencanakinerja/{id}/waktu-edit', [RencanaKinerjaController::class, 'edit_waktu'])->name('staff.waktu.edit');
    Route::put('/staff-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'update']);
    Route::get('/staff-perencanaankerja/rencanakinerja/{id}', [RencanaKinerjaController::class, 'destroy'])->name('staff.rencanakinerja.delete');

    //Penilaian SKP
    Route::get('/staff-perencanaankerja/penilaianskp', [PenilaianSKPController::class, 'index'])->name('staff_penilaianskp');
    Route::get('/staff-perencanaankerja/penilaianskp/print', [PenilaianSKPController::class, 'print']);
    Route::get('/staff-perencanaankerja/penilaianskp/search', [PenilaianSKPController::class, 'search']);
    Route::get('/staff-perencanaankerja/penilaianskp/create/index', [PenilaianSKPController::class, 'create_index']);
    Route::get('/staff-perencanaankerja/penilaianskp/create/search', [PenilaianSKPController::class, 'create_search']);
    Route::get('/staff-perencanaankerja/penilaianskp/create/{id}/kuantitas', [PenilaianSKPController::class, 'create_kuantitas'])->name('staff.kuantitas.create');
    Route::get('/staff-perencanaankerja/penilaianskp/create/{id}/kualitas', [PenilaianSKPController::class, 'create_kualitas'])->name('staff.kualitas.create');
    Route::get('/staff-perencanaankerja/penilaianskp/create/{id}/waktu', [PenilaianSKPController::class, 'create_waktu'])->name('staff.waktu.create');
    Route::post('/staff-perencanaankerja/penilaianskp/store', [PenilaianSKPController::class, 'store']);
    Route::get('/staff-perencanaankerja/penilaianskp/{id}/edit', [PenilaianSKPController::class, 'edit'])->name('staff.penilaianskp.edit');
    Route::put('/staff-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'update']);
    Route::get('/staff-perencanaankerja/penilaianskp/{id}', [PenilaianSKPController::class, 'destroy'])->name('staff.penilaianskp.delete');

    //List Angka Kredit
    Route::get('/staff-masterangkakredit/listangkakredit', [ListAngkaKreditController::class, 'index'])->name('staff_listangkakredit');
    Route::get('/staff-masterangkakredit/listangkakredit/search', [ListAngkaKreditController::class, 'search']);
    Route::get('/staff-masterangkakredit/listangkakredit/{id}/edit', [ListAngkaKreditController::class, 'edit'])->name('staff.listangkakredit.edit');
    Route::put('/staff-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'update']);
    Route::get('/staff-masterangkakredit/listangkakredit/{id}', [ListAngkaKreditController::class, 'destroy'])->name('staff.listangkakredit.delete');

    //Entri Angka Kredit
    Route::get('/staff-masterangkakredit/entriangkakredit', [EntriAngkaKreditController::class, 'index'])->name('staff_entriangkakredit');
    Route::post('/staff-masterangkakredit/entriangkakredit/store', [EntriAngkaKreditController::class, 'store']);

    //List Uraian Kredit
    Route::get('/staff-masteruraiankegiatan/uraiankegiatan', [ListUraianKegiatanController::class, 'index'])->name('staff_uraiankegiatan');
    Route::get('/staff-masterutaiankegiatan/uraiankegiatan/search', [ListUraianKegiatanController::class, 'search']);
    Route::get('/staff-masterutaiankegiatan/uraiankegiatan/create', [ListUraianKegiatanController::class, 'create']);
    Route::post('/staff-masterutaiankegiatan/uraiankegiatan/store', [ListUraianKegiatanController::class, 'store']);
    Route::get('/staff-masterutaiankegiatan/uraiankegiatan/{id}/edit', [ListUraianKegiatanController::class, 'edit'])->name('staff.listuraiankredit.edit');
    Route::put('/staff-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'update']);
    Route::get('/staff-masterutaiankegiatan/uraiankegiatan/{id}', [ListUraianKegiatanController::class, 'destroy'])->name('staff.listuraiankredit.delete');

    //CKP-T
    Route::get('/staff-ckp/ckpt', [CKPTController::class, 'index'])->name('staff_ckpt');
    Route::get('/staff-ckp/ckpt/print', [CKPTController::class, 'print']);
    Route::get('/staff-ckp/ckpt/search', [CKPTController::class, 'search']);
    Route::get('/staff-ckp/ckpt/create', [CKPTController::class, 'create']);
    Route::post('/staff-ckp/ckpt/store', [CKPTController::class, 'store']);
    Route::get('/staff-ckp/ckpt/{id}/edit', [CKPTController::class, 'edit'])->name('staff.ckpt.edit');
    Route::put('/staff-ckp/ckpt/{id}', [CKPTController::class, 'update']);
    Route::get('/staff-ckp/ckpt/{id}', [CKPTController::class, 'destroy'])->name('staff.ckpt.delete');

    //CKP-R
    Route::get('/staff-ckp/ckpr', [CKPRController::class, 'index'])->name('staff_ckpr');
    Route::get('/staff-ckp/ckpr/print', [CKPRController::class, 'print']);
    Route::get('/staff-ckp/ckpr/search', [CKPRController::class, 'search']);
    Route::get('/staff-ckp/ckpr/create/index', [CKPRController::class, 'create_index']);
    Route::get('/staff-ckp/ckpr/create/search', [CKPRController::class, 'create_search']);
    Route::get('/staff-ckp/ckpr/create/{id}', [CKPRController::class, 'create'])->name('staff.ckpr.create');
    Route::post('/staff-ckp/ckpr/store', [CKPRController::class, 'store']);
    Route::get('/staff-ckp/ckpr/{id}/edit', [CKPRController::class, 'edit'])->name('staff.ckpr.edit');
    Route::put('/staff-ckp/ckpr/{id}', [CKPRController::class, 'update']);
    Route::get('/staff-ckp/ckpr/{id}', [CKPRController::class, 'destroy'])->name('staff.ckpr.delete');

    //Penilaian CKPR
    Route::get('/staff-ckp/penilaianckpr', [PenilaianCKPRController::class, 'index'])->name('staff_penilaianckpr');
    Route::get('/staff-ckp/penilaianckpr/saerch', [PenilaianCKPRController::class, 'search']);
    Route::get('/staff-ckp/penilaianckpr/search-create', [PenilaianCKPRController::class, 'search_create']);
    Route::get('/staff-ckp/penilaianckpr/create-index', [PenilaianCKPRController::class, 'create_index']);
    Route::get('/staff-ckp/penilaianckpr/create/{id}', [PenilaianCKPRController::class, 'create'])->name('staff.penilaianckpr.create');
    Route::post('/staff-ckp/penilaianckpr/store', [PenilaianCKPRController::class, 'store']);
    Route::get('/staff-ckp/penilaianckpr/{id}/edit', [PenilaianCKPRController::class, 'edit'])->name('staff.penilaianckpr.edit');
    Route::put('/staff-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'update']);
    Route::get('/staff-ckp/penilaianckpr/{id}', [PenilaianCKPRController::class, 'destroy'])->name('staff.penilaianckpr.delete');

    //Monitoring CKP
    Route::get('/staff-monitoring/monitoringckp', [MonitoringCKPController::class, 'index'])->name('staff_monitoringckp');
    Route::get('/staff-monitoring/monitoringckp/search', [MonitoringCKPController::class, 'search']);
    Route::get('/staff-monitoring/monitoringckp/create', [MonitoringCKPController::class, 'create']);
    Route::post('/staff-monitoring/monitoringckp/store', [MonitoringCKPController::class, 'store']);
    Route::get('/staff-monitoring/monitoringckp/{id}/edit', [MonitoringCKPController::class, 'edit'])->name('staff.monitoringckp.edit');
    Route::put('/staff-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'update']);
    Route::get('/staff-monitoring/monitoringckp/{id}', [MonitoringCKPController::class, 'destroy'])->name('staff.monitoringckp.delete');

    //Monitoring Presensi
    Route::get('/staff-monitoring/monitoringpre', [MonitoringPresensiController::class, 'index'])->name('staff_monitoringpre');
    Route::get('/staff-monitoring/monitorinpre/search', [MonitoringPresensiController::class, 'search']);
    Route::get('/staff-monitoring/monitorinpre/create', [MonitoringPresensiController::class, 'create']);
    Route::post('/staff-monitoring/monitorinpre/store', [MonitoringPresensiController::class, 'store']);
    Route::get('/staff-monitoring/monitorinpre/{id}/edit', [MonitoringPresensiController::class, 'edit'])->name('staff.monitoringpresensi.edit');
    Route::put('/staff-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'update']);
    Route::get('/staff-monitoring/monitorinpre/{id}', [MonitoringPresensiController::class, 'destroy'])->name('staff.monitoringpresensi.delete');

    //Monitoring User
    Route::get('/staff-monitoring/monitoringuser', [MonitoringUserController::class, 'index'])->name('staff_monitoringuser');
    Route::get('/staff-monitoring/monitoringuser/search', [MonitoringUserController::class, 'search']);
    Route::get('/staff-monitoring/monitoringuser/create', [MonitoringUserController::class, 'create']);
    Route::post('/staff-monitoring/monitoringuser/store', [MonitoringUserController::class, 'store']);
    Route::get('/staff-monitoring/monitoringuser/{id}/edit', [MonitoringUserController::class, 'edit'])->name('staff.monitoringuser.edit');
    Route::put('/staff-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'update']);
    Route::get('/staff-monitoring/monitoringuser/{id}', [MonitoringUserController::class, 'destroy'])->name('staff.monitoringuser.delete');