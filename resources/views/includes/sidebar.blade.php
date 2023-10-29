<!-- Sidebar -->
<ul
    class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="">
        <img src="/assets/img/bps.png" style="height: 2rem" alt="Logo">
            {{-- <span class="brand-text">SISTEM INFORMASI<br>KINERJA KARYAWAN<br>BPS</span> --}}
            <div class="sidebar-brand-text mx-3">SISTEM INFORMASI<br>KINERJA KARYAWAN<br>BPS Bukittinggi</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('dashboard') }}">
                            <i class="fas fa-home"></i>
                            <span>DASHBOARD</span>
                        </a>
                    </li>
                    {{-- perencaan kerja --}}
                    <li class="nav-item">
                        <a
                            class="nav-link collapsed"
                            href="#"
                            data-toggle="collapse"
                            data-target="#collapseTwo"
                            aria-expanded="true"
                            aria-controls="collapseTwo">
                            <i class="fas fa-book"></i>
                            <span>PERENCANAAN KERJA</span>
                        </a>
                        <div
                            id="collapseTwo"
                            class="collapse"
                            aria-labelledby="headingTwo"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                                <a class="collapse-item" href="{{ route('skptahunan') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>SKP Tahunan
                                    </p>
                                </a>
                                <a class="collapse-item" href="{{ route('rencanakinerja') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>Rencana Kinerja
                                    </p>
                                </a>
                                <a class="collapse-item" href="{{ route('penilaianskp') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>Penilaian SKP
                                    </p>
                                </a>
                            </div>
                        </div>
                    </li>

                    {{-- Master Angka Kredit --}}
                    <li class="nav-item">
                        <a
                            class="nav-link collapsed"
                            href="#"
                            data-toggle="collapse"
                            data-target="#collapse3"
                            aria-expanded="true"
                            aria-controls="collapse3">
                            <i class="fas fa-envelope"></i>
                            <span>MASTER ANGKA KREDIT</span>

                        </a>
                        <div
                            id="collapse3"
                            class="collapse"
                            aria-labelledby="headingTwo"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                                <a class="collapse-item" href="{{ route('listangkakredit') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>List Angka Kredit
                                    </p>
                                </a>
                                <a class="collapse-item" href="{{ route('entriangkakredit') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>Entri Angka Kredit
                                    </p>
                                </a>
                            </div>
                        </div>
                    </li>
                    {{-- MASTER URAIAN KEGIATAN --}}
                    <li class="nav-item">
                        <a
                            class="nav-link collapsed"
                            href="#"
                            data-toggle="collapse"
                            data-target="#collapse4"
                            aria-expanded="true"
                            aria-controls="collapse4">
                            <i class="fas fa-bookmark"></i>
                            <span>MASTER URAIAN KEGIATAN</span>
                        </a>
                        <div
                            id="collapse4"
                            class="collapse"
                            aria-labelledby="headingTwo"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                                <a class="collapse-item" href="{{ route('uraianakegiatan') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>List Uraian Kegiatan
                                    </p>
                                </a>
                            </div>
                        </div>
                    </li>

                    {{-- CKP --}}
                    <li class="nav-item">
                        <a
                            class="nav-link collapsed"
                            href="#"
                            data-toggle="collapse"
                            data-target="#collapse5"
                            aria-expanded="true"
                            aria-controls="collapse5">
                            <i class="fas fa-book-open"></i>
                            <span>CKP</span>
                        </a>
                        <div
                            id="collapse5"
                            class="collapse"
                            aria-labelledby="headingTwo"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                                <a class="collapse-item" href="{{ route('ckpt') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>CKP-T
                                    </p>
                                </a>
                                <a class="collapse-item" href="{{ route('ckpr') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>CKP-R
                                    </p>
                                </a>
                                <a class="collapse-item" href="{{ route('penilaianckpr') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>Penilaian CKP-R
                                    </p>
                                </a>
                            </div>
                        </div>
                    </li>

                    {{-- MONITORING --}}
                    <li class="nav-item">
                        <a
                            class="nav-link collapsed"
                            href="#"
                            data-toggle="collapse"
                            data-target="#collapse6"
                            aria-expanded="true"
                            aria-controls="collapse6">
                            <i class="fas fa-desktop"></i>
                            <span>MONITORING</span>
                        </a>
                        <div
                            id="collapse6"
                            class="collapse"
                            aria-labelledby="headingTwo"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                                <a class="collapse-item" href="{{ route('monitoringckp') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>Monitoring CKP
                                    </p>
                                </a>
                                <a class="collapse-item" href="{{ route('monitoringpre') }}">
                                    <p class="sub-nav-text">
                                        <i class="fas fa-bookmark"></i>Monitoring Presensi
                                    </p>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item" style="position: absolute; bottom:0px;margin-bottom:0; ">
                        <hr class="sidebar-divider my-0">
                            <a
                                class="nav-link collapsed"
                                style="text-align: right;"
                                href="{{ route('login') }}"
                                data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </li>

                    </ul>

                    <!-- End of Sidebar -->