@extends('layouts.kepalaBPS')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @foreach ($user as $users)
                @if ($users->id == $userid)
                <h1 class="h3 mb-0 text-black-800">Selamat Datang di Sistem Informasi Kinerja Karyawan BPS {{ $users->nama }}</h1>
                @endif
            @endforeach
            </h1>
        </div>

        <div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-lg-7 mx-auto">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- Card Body -->
                <a href="/kepalabps-perencanaankerja/penilaianskp/index/{{ $user_id_tertinggi }}" class="text-decoration-none">
                    <div class="card-body cursor-pointer">                    
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-6">
                                <div class="text-center">
                                    <h4 class="card-title">Nilai SKP Tertinggi</h4>
                                    <div class="display-4 font-weight-bold">{{ $nilai_skp_tertinggi }} </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </a>
            </div>
        </div>


        <div class="col-xl-3 col-lg-7 mx-auto">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- Card Body -->
                <a href="/kepalabps-perencanaankerja/penilaianskp/index/{{ $user_id_terendah }}" class="text-decoration-none">
                    <div class="card-body cursor-pointer">                    
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-6">
                                <div class="text-center">
                                    <h4 class="card-title">Nilai SKP Terendah</h4>
                                    <div class="display-4 font-weight-bold">{{ $nilai_skp_terendah }} </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-7 mx-auto">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- Card Body -->
                <a href="/kepalabps-ckp/penilaianckpr/index/{{ $id_ckp_tertinggi }}" class="text-decoration-none">
                    <div class="card-body cursor-pointer">                    
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-6">
                                <div class="text-center">
                                    <h4 class="card-title">Nilai CKP Tertinggi</h4>
                                    <div class="display-4 font-weight-bold">{{ $nilai_ckp_tertinggi }} </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </a>
            </div>
        </div>


        <div class="col-xl-3 col-lg-7 mx-auto">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- Card Body -->
                <a href="/kepalabps-ckp/penilaianckpr/index/{{ $id_ckp_terendah }}" class="text-decoration-none">
                    <div class="card-body cursor-pointer">                    
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-6">
                                <div class="text-center">
                                    <h4 class="card-title">Nilai CKP Terendah</h4>
                                    <div class="display-4 font-weight-bold">{{ $nilai_ckp_terendah }} </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </a>
            </div>
        </div>
    </div>
    
        <div class="col-xl-8 col-lg-7 mx-auto">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Penilaian CKP</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">                    
                    {!! $chartckp->container() !!}                    
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7 mx-auto">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Penilaian SKP</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    {!! $chartskp->container() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script src="{{ $chartckp->cdn() }}"></script>

    {{ $chartckp->script() }}

    <script src="{{ $chartskp->cdn() }}"></script>

    {{ $chartskp->script() }}


@endsection
