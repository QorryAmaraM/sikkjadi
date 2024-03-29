@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @foreach ($user as $users)
                @if ($users->id == $userid)
                <h1 class="h3 mb-0 text-black-800">Selamat Datang di Sistem Informasi Kinerja Karyawan BPS, {{ $users->nama }}</h1>
                @endif
            @endforeach
            </h1>
        </div>
        
        <div class="col-xl-5 col-lg-7 mx-auto">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Karyawan</h6>
                </div>
                <!-- Card Body -->
                <a href="{{ route('admin_monitoringuser') }}" class="text-decoration-none">
                    <div class="card-body cursor-pointer">                    
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-6">
                                <div class="text-center">
                                    <h4 class="card-title">Total Karyawan</h4>
                                    <div class="display-4 font-weight-bold">{{ $user->count() }}</div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <script src="{{ $chartckp->cdn() }}"></script>

    {{ $chartckp->script() }}

    <script src="{{ $chartskp->cdn() }}"></script>

    {{ $chartskp->script() }}

<script>
    document.querySelector('.card').addEventListener('click', function() {
    window.location.href = '/admin-monitoring/monitoringuser'; // Update this with the correct path
});
</script>



@endsection
