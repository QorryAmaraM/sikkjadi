@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Rencana Kinerja</h1>
        </div>

        <!-- Content Row -->

        <form>
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="search form-group d-flex align-items-center">
                        <label for="searchSelect" class="col-sm-1 pl-0 col-form-label">Pegawai</label>
                        <select name="search" id="search" class="form-control">
                            <option value="">Pilih Pegawai</option>
                            @php
                                $namaArray = [];
                            @endphp
                            @foreach ($result as $rencana_kinerja)
                                @php
                                    $userId = $rencana_kinerja->user_id;
                                    $nama = '';
                                @endphp
                                @foreach ($user as $users)
                                    @if ($userId == $users->id)
                                        @php
                                            $nama = $users->nama;
                                        @endphp
                                        @if (!in_array($nama, $namaArray))
                                            <option value="{{ $userId }}">
                                                {{ $nama }}
                                            </option>
                                            @php
                                                $namaArray[] = $nama;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="tahun form-group d-flex align-items-center">
                        <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <input class="form-control col-sm-11" name="tahun" id="tahun" placeholder="Tahun">
                    </div>

                    <div class="tahun form-group d-flex align-items-center">
                        <label for="periode" class="col-sm-1 pl-0 col-form-label">Periode</label>
                        <input class="form-control col-sm-11" name="periode" id="periode" placeholder="Periode">
                    </div>

                    <div class="tahun form-group d-flex align-items-center">
                        <label for="wilayah" class="col-sm-1 pl-0 col-form-label">Wilayah</label>
                        <input class="form-control col-sm-11" name="wilayah" id="wilayah" placeholder="wilayah">
                    </div>

                    <div class="tahun form-group d-flex align-items-center">
                        <label for="unitkerja" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                        <input class="form-control col-sm-11" name="unitkerja" id="unitkerja" placeholder="Unit Kerja">
                    </div>

                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-sm-6">
                <div class="inner-form">
                    <div class="input-form">
                        <input id="search" type="text" placeholder="Pencarian" />
                        <div class="input-form-append align-items-center">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <button type="button" class="btn salin-button mr-2">Salin Rencana Kinerja</button>
                <a href="/admin-perencanaankerja/rencanakinerja/create/index" type="button" class="btn add-button">+
                    Tambah</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Jenis</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Rencana Kinerja Atasan
                                </th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Rencana Kinerja</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Aspek</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">IKI</th>
                                <th colspan="2" style="padding:0.2rem; border-bottom: none">Target</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Satuan</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Aksi</th>
                            </tr>
                            <tr>
                                <th style="border-top: none">Min</th>
                                <th style="border-top: none">Max</th>
                            </tr>
                        </thead>
                        
                        <tbody class="alldata">
                            @foreach ($rencanakinerja as $rencana)
                            <tr>
                                <td rowspan="3">{{ $rencana->kinerja }}</td>
                                <td rowspan="3">{{ $rencana->rencana_kinerja_atasan }}</td>
                                <td rowspan="3">{{ $rencana->rencana_kinerja }}</td>
                            
                                <!-- Kuantitas -->
                                <td>Kuantitas</td>
                                <td>{{ $rencana->kuantitas_iki }}</td>
                                <td>{{ $rencana->kuantitas_target_min }}</td>
                                <td>{{ $rencana->kuantitas_target_max }}</td>
                                <td>{{ $rencana->kuantitas_satuan }}</td>
                                <td>
                                    <button class="btn btn-icon btn-edit btn-sm">
                                        <a href="{{ route('kuantitas.edit', ['id' => $rencana->id]) }}" class="action-link"><i class="fas fa-edit"></i></a>
                                    </button>
                                </td>

                                <td rowspan="3">
                                    <button class="btn btn-icon btn-edit btn-sm">
                                        <a href="{{ route('edit', ['id' => $rencana->id]) }}" class="action-link"><i class="fas fa-edit"></i></a>
                                    </button>
                                </td>


                            </tr>
                            
                            <tr>
                                <!-- Kualitas -->
                                <td>Kualitas</td>
                                <td>{{ $rencana->kualitas_iki }}</td>
                                <td>{{ $rencana->kualitas_target_min }}</td>
                                <td>{{ $rencana->kualitas_target_max }}</td>
                                <td>{{ $rencana->kualitas_satuan }}</td>
                                <td>
                                    <button class="btn btn-icon btn-edit btn-sm">
                                        <a href="{{ route('kualitas.edit', ['id' => $rencana->id]) }}" class="action-link"><i class="fas fa-edit"></i></a>
                                    </button>
                                </td>
                            </tr>
                            
                            <tr>
                                <!-- Waktu -->
                                <td>Waktu</td>
                                <td>{{ $rencana->waktu_iki }}</td>
                                <td>{{ $rencana->waktu_target_min }}</td>
                                <td>{{ $rencana->waktu_target_max }}</td>
                                <td>{{ $rencana->waktu_satuan }}</td>
                                <td>
                                    <button class="btn btn-icon btn-edit btn-sm">
                                        <a href="{{ route('waktu.edit', ['id' => $rencana->id]) }}" class="action-link"><i class="fas fa-edit"></i></a>
                                    </button>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>

                        <tbody id="Content" class="searchdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Script -->
    <script type="text/javascript">
        var savedValue = "";
        var savedTahunValue = "";
        var savedPeriodeValue = "";
        var savedWilayahValue = "";
        var savedUnitkerjaValue = "";

        $('#search').on('input', function() {
            savedValue = $(this).val();

            if (savedValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedTahunValue, savedPeriodeValue, savedWilayahValue, savedUnitkerjaValue);
        });

        $('#tahun').on('input', function() {
            savedTahunValue = $(this).val();

            if (savedTahunValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedTahunValue, savedPeriodeValue, savedWilayahValue, savedUnitkerjaValue);
        });

        $('#periode').on('input', function() {
            savedPeriodeValue = $(this).val();

            if (savedPeriodeValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedTahunValue, savedPeriodeValue, savedWilayahValue, savedUnitkerjaValue);
        });

        $('#wilayah').on('input', function() {
            savedWilayahValue = $(this).val();

            if (savedWilayahValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedTahunValue, savedPeriodeValue, savedWilayahValue, savedUnitkerjaValue);
        });

        $('#unitkerja').on('input', function() {
            savedUnitkerjaValue = $(this).val();

            if (savedUnitkerjaValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedTahunValue, savedPeriodeValue, savedWilayahValue, savedUnitkerjaValue);
        });


        function handleSearch(value, tahunValue, periodeValue, wilayahValue, unitkerjaValue) {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('/admin-perencanaankerja/rencanakinerja/search') }}',
                data: {
                    'search': value,
                    'tahun': tahunValue,
                    'periode': periodeValue,
                    'wilayah': wilayahValue,
                    'unitkerja': unitkerjaValue
                },
                success: function(data) {
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        }

    </script>
    <!-- Script -->
@endsection
