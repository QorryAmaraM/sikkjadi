@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Penilaian SKP</h1>
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
                            @foreach ($result as $penilaian_skp)
                                @php
                                    $userId = $penilaian_skp->user_id;
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
                        <label for="unitkerja" class="col-sm-2 pl-0 col-form-label">Unit Kerja</label>
                        <input class="form-control col-sm-10" name="unitkerja" id="unitkerja" placeholder="Unit Kerja">
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label for="unitkerja" class="col-sm-2 pl-0 col-form-label">Jenis</label>
                        <input class="form-control col-sm-10" name="jenis" id="jenis" placeholder="Jenis">
                    </div>

                    <div class="search form-group d-flex align-items-center">
                        <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Kinerja</label>
                        <select name="kinerja" id="kinerja" class="form-control">
                            <option value="">Kinerja</option>
                            <option value="utama">Utama</option>
                            <option value="tambahan">Tambahan</option>
                        </select>
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
                <a href="/admin-perencanaankerja/penilaianskp/create/index" type="button" class="btn add-button">+
                    Tambah</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Realisasi</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kondisi</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Capaian IKI</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kategori Capaian IKI</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Nilai Capaian Rencana</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kategori Capaian Rencana
                                </th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Nilai Tertimbang</th>
                                <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="alldata">
                            @foreach ($penilaianskp as $skp)
                                <tr>
                                    <td>{{ $skp->realisasi }}</td>
                                    <td>{{ $skp->kondisi }}</td>
                                    <td>{{ $skp->capaian_iki }}</td>
                                    <td>{{ $skp->kategori_capaian_iki }}</td>
                                    <td>{{ $skp->nilai_capaian_rencana }}</td>
                                    <td>{{ $skp->kategori_capaian_rencana }}</td>
                                    <td>{{ $skp->nilai_tertimbang }}</td>
                                    <td>
                                        <button class="btn btn-icon btn-edit btn-sm">
                                            <a href="{{ route('penilaianskp.edit', ['id' => $skp->id]) }}"
                                                class="action-link"><i class="fas fa-edit"></i></a>

                                        </button> |
                                        <button class="btn btn-icon btn-delete btn-sm">
                                            <a href="{{ route('penilaianskp.delete', ['id' => $skp->id]) }}"
                                                class="action-link btn-delete"><i class="fas fa-trash-can"></i></a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                        <tbody id="Content" class="searchdata"></tbody>


                        <tbody>
                            <tr>
                                <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">Nilai Kerja Utama
                                </td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5; color: #000; font-weight: bold;"></td>
                            </tr>
                        </tbody>
                        <tbody>

                        </tbody>

                        <tbody>
                            <tr>
                                <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">Nilai Kerja Tambahan
                                </td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5; color: #000; font-weight: bold;"></td>
                            </tr>
                            <tr>
                                <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">Nilai SKP</td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5"></td>
                                <td style="background-color: #9ba4b5; color: #000; font-weight: bold;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script>
        var savedValue = "";
        var savedUnitkerjaValue = "";
        var savedJenisValue = "";
        var savedKinerjaValue = "";

        $('#search').on('input', function() {
            savedValue = $(this).val();

            if (savedValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedUnitkerjaValue, savedJenisValue, savedKinerjaValue);
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

            handleSearch(savedValue, savedUnitkerjaValue, savedJenisValue, savedKinerjaValue);
        });

        $('#jenis').on('input', function() {
            savedJenisValue = $(this).val();

            if (savedJenisValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedUnitkerjaValue, savedJenisValue, savedKinerjaValue);
        });

        $('#kinerja').on('input', function() {
            savedKinerjaValue = $(this).val();

            if (savedKinerjaValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedUnitkerjaValue, savedJenisValue, savedKinerjaValue);
        });

        function handleSearch(value, unitkerjavalue, jenisvalue, kinerjavalue) {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('/admin-perencanaankerja/penilaianskp/search') }}',
                data: {
                    'search': value,
                    'unitkerja': unitkerjavalue,
                    'jenis': jenisvalue,
                    'kinerja': kinerjavalue
                },
                success: function(data) {
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        }
    </script>
@endsection
