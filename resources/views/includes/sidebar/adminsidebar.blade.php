<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <img src="/assets/img/bps.png" style="height: 2rem" alt="Logo">
        {{-- <span class="brand-text">SISTEM INFORMASI<br>KINERJA KARYAWAN<br>BPS</span> --}}
        <div class="sidebar-brand-text mx-3">SISTEM INFORMASI<br>KINERJA KARYAWAN<br>BPS Bukittinggi</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin_dashboard*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin_dashboard') }}">
            <i class="fas fa-home"></i>
            <span>DASHBOARD</span>
        </a>
    </li>
    
    {{-- perencaan kerja --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-book"></i>
            <span>PERENCANAAN KERJA</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('admin_skptahunan') }}">
                    <p class="sub-nav-text">
                        <i class="fas fa-bookmark"></i>SKP Tahunan
                    </p>
                </a>
                <a class="collapse-item" href="{{ route('admin_rencanakinerja') }}">
                    <p class="sub-nav-text">
                        <i class="fas fa-bookmark"></i>Rencana Kinerja
                    </p>
                </a>
            </div>
        </div>
    </li>

    {{-- Master Angka Kredit --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
            aria-expanded="true" aria-controls="collapse3">
            <i class="fas fa-envelope"></i>
            <span>MASTER ANGKA KREDIT</span>

        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('admin_listangkakredit') }}">
                    <p class="sub-nav-text">
                        <i class="fas fa-bookmark"></i>List Angka Kredit
                    </p>
                </a>
                <a class="collapse-item" href="{{ route('admin_entriangkakredit') }}">
                    <p class="sub-nav-text">
                        <i class="fas fa-bookmark"></i>Entri Angka Kredit
                    </p>
                </a>
            </div>
        </div>
    </li>
    {{-- MASTER URAIAN KEGIATAN --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4"
            aria-expanded="true" aria-controls="collapse4">
            <i class="fas fa-bookmark"></i>
            <span>MASTER URAIAN KEGIATAN</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('admin_uraiankegiatan') }}">
                    <p class="sub-nav-text">
                        <i class="fas fa-bookmark"></i>List Uraian Kegiatan
                    </p>
                </a>
            </div>
        </div>
    </li>

    {{-- CKP --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
            aria-expanded="true" aria-controls="collapse5">
            <i class="fas fa-book-open"></i>
            <span>CKP</span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('admin_ckpt') }}">
                    <p class="sub-nav-text">
                        <i class="fas fa-bookmark"></i>CKP-T
                    </p>
                </a>
                <a class="collapse-item" href="{{ route('admin_ckpr') }}">
                    <p class="sub-nav-text">
                        <i class="fas fa-bookmark"></i>CKP-R
                    </p>
                </a>
            </div>
        </div>
    </li>

    {{-- MONITORING --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6"
            aria-expanded="true" aria-controls="collapse6">
            <i class="fas fa-desktop"></i>
            <span>MONITORING</span>
        </a>
        <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('admin_monitoringckp') }}">
                    <p class="sub-nav-text">
                        <i class="fas fa-bookmark"></i>Monitoring CKP
                    </p>
                </a>
                <a class="collapse-item" href="{{ route('admin_monitoringpre') }}">
                    <p class="sub-nav-text">
                        <i class="fas fa-bookmark"></i>Monitoring Presensi
                    </p>
                </a>
                <a class="collapse-item" href="{{ route('admin_monitoringuser') }}">
                    <p class="sub-nav-text">
                        <i class="fas fa-bookmark"></i>Monitoring User
                    </p>
                </a>
            </div>
        </div>
    </li>
</ul>

<!-- End of Sidebar -->
