@extends('layouts.kf')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Tambah Penilaian SKP</h1>
        </div>

        <!-- Content Row -->
        <div class="row mb-8">
            <div class="col-sm-6">
                <div class="search form-group d-flex align-items-center">
                    <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Nama</label>
                    <select name="search" id="search" class="form-control">
                        <option value="">Pilih Pegawai</option>
                        @php
                            $namaArray = [];
                        @endphp
                        @foreach ($result as $nilaiskp)
                            @php
                                $userId = $nilaiskp->user_id;
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
            </div>
        </div>


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

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
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
                            @foreach ($result as $rencana)
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
                                            <a href="{{ route('kepalabps.kuantitas.create', ['id' => $rencana->id]) }}" type="button" class="btn add-button">+ Nilai</a>
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
                                            <a href="{{ route('kepalabps.kualitas.create', ['id' => $rencana->id]) }}" type="button" class="btn add-button">+ Nilai</a>
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
                                            <a href="{{ route('kepalabps.waktu.create', ['id' => $rencana->id]) }}" type="button" class="btn add-button">+ Nilai</a>
                                        </button>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>

                        <tbody id="Content" class="searchdata"> </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Script -->
    <script type="text/javascript">
        $('#search').on('change', function() {

            $value = $(this).val();

            if ($value) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            $.ajax({
                type: 'get',
                url: '{{ URL::to('/admin-perencanaankerja/penilaianskp/create/search') }}',
                data: {
                    'search': $value
                },

                success: function(data) {
                    console.log(data);
                    $('#Content').html(data);
                }

            });

        })
    </script>
@endsection
