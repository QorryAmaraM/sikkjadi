@extends('layouts.kf')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Pilih Periode Penilaian CKPR</h1>
        </div>

        <!-- Content Row -->

        <form>
            <div class="row mb-8">
                <div class="col-sm-7">
                    <div class="search form-group d-flex align-items-center">
                        <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Nama</label>
                        <select name="search" id="search" class="form-control">
                            <option value="">Pilih Pegawai</option>
                            @php
                                $namaArray = [];
                            @endphp
                            @foreach ($ckpr as $ckpr_nama)
                                @php
                                    $userId = $ckpr_nama->user_id;
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
                    <div class="form-group d-flex align-items-center">
                        <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Tahun</label>
                        <select class="form-control col-sm-10" data-width="75%" data-live-search="true" id="tahun">
                            <option value="">Pilih tahun</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                        </select>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Bulan</label>
                        <select class="form-control col-sm-10" data-width="75%" data-live-search="true" id="bulan">
                            <option value="">Pilih Bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="July">July</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>

                        </select>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Periode</th>
                                <th>Satuan</th>
                                <th>Target</th>
                                <th>Target Rev</th>
                                <th>Realisasi</th>
                                <th>Persen (%)</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="alldata">
                            @foreach ($ckpr as $ckpr)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ckpr->kode }}</td>
                                    <td>{{ $ckpr->tahun }} {{ $ckpr->bulan }}</td>
                                    <td>{{ $ckpr->satuan }}</td>
                                    <td>{{ $ckpr->target }}</td>
                                    <td>{{ $ckpr->target_rev }}</td>
                                    <td>{{ $ckpr->realisasi }}</td>
                                    <td>{{ $ckpr->persen }} %</td>
                                    <td>{{ $ckpr->nilai }}</td>
                                    <td>{{ $ckpr->keterangan }}</td>
                                    <td>
                                        @if ($ckpr->status == '1')
                                            <span class="badge badge-success">Sudah Diverifikasi</span>
                                        @else
                                            <span class="badge badge-danger">Belum Diverifikasi</span>
                                        @endif
                                    </td>

                                    <td>
                                        <button class="btn btn-icon btn-edit btn-sm">
                                            <a href="{{ route('kf.penilaianckpr.create', ['id' => $ckpr->id]) }}"
                                                type="button" class="btn add-button">+ Nilai</a>
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
    <script>
        var savedValue = "";
        var savedTahunValue = "";
        var savedBulanValue = "";

        $('#search').on('input', function() {
            savedValue = $(this).val();

            if (savedValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else if (savedTahunValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else if (savedBulanValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedTahunValue, savedBulanValue);
        });

        $('#tahun').on('input', function() {
            savedTahunValue = $(this).val();

            if (savedTahunValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else if (savedValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else if (savedBulanValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedTahunValue, savedBulanValue);
        });

        $('#bulan').on('input', function() {
            savedBulanValue = $(this).val();

            if (savedBulanValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else if (savedTahunValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else if (savedValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedTahunValue, savedBulanValue);
        });

        function handleSearch(value, tahunvalue, bulanvalue) {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('/kf-ckp/penilaianckpr/search-create') }}',
                data: {
                    'search': value,
                    'tahun': tahunvalue,
                    'bulan': bulanvalue
                },
                success: function(data) {
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        }
    </script>
@endsection
