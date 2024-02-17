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
            <div class="col-sm-12 d-flex justify-content-end align-items-center mb-2">
                <a href="/admin-perencanaankerja/penilaianskp/create/index" type="button" class="btn add-button">+Tambah</a>

                <button class="btn btn-icon btn-print btn-sm" data-toggle="modal" data-target="#printModal">
                    <i class="fas fa-print"></i>
                </button>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <div style="overflow-x: auto;">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="min-width: 1500px;">
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
                                    <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Realisasi</th>
                                    <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kondisi</th>
                                    <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Capaian IKI</th>
                                    <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kategori Capaian IKI
                                    </th>
                                    <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kategori Capaian Rencana</th>
                                    <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Nilai Capaian Rencana
                                    </th>
                                    <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Nilai Tertimbang</th>
                                    <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Aksi</th>
                                </tr>
                                <tr>
                                    <th style="border-top: none">Min</th>
                                    <th style="border-top: none">Max</th>
                                </tr>
                            </thead>
                            <tbody class="tabel_utama">
                                @forelse ($result as $skp)
                                    @if ($skp->kinerja == 'utama')
                                        <tr>
                                            <td rowspan="3">{{ $skp->kinerja }}</td>
                                            <td rowspan="3">{{ $skp->rencana_kinerja_atasan }}</td>
                                            <td rowspan="3">{{ $skp->rencana_kinerja }}</td>

                                            <td>Kuantitas</td>
                                            <td>{{ $skp->kuantitas_iki }}</td>
                                            <td>{{ $skp->kuantitas_target_min }}</td>
                                            <td>{{ $skp->kuantitas_target_max }}</td>
                                            <td>{{ $skp->kuantitas_satuan }}</td>
                                            <td>{{ $skp->kuantitas_realisasi }}</td>
                                            <td>{{ $skp->kuantitas_kondisi }}</td>
                                            <td>{{ $skp->kuantitas_capaian_iki }}</td>
                                            <td>{{ $skp->kuantitas_kategori_capaian_iki }}</td>

                                            <td rowspan="3">{{ $skp->kategori_capaian_rencana }}</td>
                                            <td rowspan="3">{{ $skp->nilai_capaian_rencana }}</td>
                                            <td rowspan="3">{{ $skp->nilai_tertimbang }}</td>
                                            <td rowspan="3">
                                                <button class="btn btn-icon btn-delete btn-sm">
                                                    <a class="action-link btn-delete" data-toggle="modal" data-target="#successModal"><i class="fas fa-trash-can"></i></a>
                                                </button>
                                            </td>
                                        <tr>
                                            <td>Kualitas</td>
                                            <td>{{ $skp->kualitas_iki }}</td>
                                            <td>{{ $skp->kualitas_target_min }}</td>
                                            <td>{{ $skp->kualitas_target_max }}</td>
                                            <td>{{ $skp->kualitas_satuan }}</td>
                                            <td>{{ $skp->kualitas_realisasi }}</td>
                                            <td>{{ $skp->kualitas_kondisi }}</td>
                                            <td>{{ $skp->kualitas_capaian_iki }}</td>
                                            <td>{{ $skp->kualitas_kategori_capaian_iki }}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td>{{ $skp->waktu_iki }}</td>
                                            <td>{{ $skp->waktu_target_min }}</td>
                                            <td>{{ $skp->waktu_target_max }}</td>
                                            <td>{{ $skp->waktu_satuan }}</td>
                                            <td>{{ $skp->waktu_realisasi }}</td>
                                            <td>{{ $skp->waktu_kondisi }}</td>
                                            <td>{{ $skp->waktu_capaian_iki }}</td>
                                            <td>{{ $skp->waktu_kategori_capaian_iki }}</td>

                                        </tr>
                                    @endif
                                @empty
                                    <td colspan="16" class="text-center">Empty Data</td>
                                @endforelse
                            </tbody>

                            <tbody id="Utama" class="searchdata"></tbody>

                            <tbody class="tabel_utama">
                                <tr>
                                    <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">Nilai Kerja
                                        Utama
                                    </td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">
                                        {{ $nilai_kinerja_utama }}</td>
                                </tr>
                            </tbody>

                            <tbody class="tabel_tambahan">
                                @forelse ($result as $skp)
                                    @if ($skp->kinerja == 'tambahan')
                                        <tr>
                                            <td rowspan="3">{{ $skp->kinerja }}</td>
                                            <td rowspan="3">{{ $skp->rencana_kinerja_atasan }}</td>
                                            <td rowspan="3">{{ $skp->rencana_kinerja }}</td>

                                            <td>Kuantitas</td>
                                            <td>{{ $skp->kuantitas_iki }}</td>
                                            <td>{{ $skp->kuantitas_target_min }}</td>
                                            <td>{{ $skp->kuantitas_target_max }}</td>
                                            <td>{{ $skp->kuantitas_satuan }}</td>
                                            <td>{{ $skp->kuantitas_realisasi }}</td>
                                            <td>{{ $skp->kuantitas_kondisi }}</td>
                                            <td>{{ $skp->kuantitas_capaian_iki }}</td>
                                            <td>{{ $skp->kuantitas_kategori_capaian_iki }}</td>

                                            <td rowspan="3">{{ $skp->kategori_capaian_rencana }}</td>
                                            <td rowspan="3">{{ $skp->nilai_capaian_rencana }}</td>
                                            <td rowspan="3">{{ $skp->nilai_tertimbang }}</td>
                                            <td rowspan="3">
                                                <button class="btn btn-icon btn-delete btn-sm" data-toggle="modal" data-target="#successModal">
                                                    <a class="action-link btn-delete">
                                                        <i class="fas fa-trash-can"></i>
                                                    </a>
                                                </button>
                                            </td>
                                        <tr>
                                            <td>Kualitas</td>
                                            <td>{{ $skp->kualitas_iki }}</td>
                                            <td>{{ $skp->kualitas_target_min }}</td>
                                            <td>{{ $skp->kualitas_target_max }}</td>
                                            <td>{{ $skp->kualitas_satuan }}</td>
                                            <td>{{ $skp->kualitas_realisasi }}</td>
                                            <td>{{ $skp->kualitas_kondisi }}</td>
                                            <td>{{ $skp->kualitas_capaian_iki }}</td>
                                            <td>{{ $skp->kualitas_kategori_capaian_iki }}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td>{{ $skp->waktu_iki }}</td>
                                            <td>{{ $skp->waktu_target_min }}</td>
                                            <td>{{ $skp->waktu_target_max }}</td>
                                            <td>{{ $skp->waktu_satuan }}</td>
                                            <td>{{ $skp->waktu_realisasi }}</td>
                                            <td>{{ $skp->waktu_kondisi }}</td>
                                            <td>{{ $skp->waktu_capaian_iki }}</td>
                                            <td>{{ $skp->waktu_kategori_capaian_iki }}</td>

                                        </tr>
                                    @endif
                                @empty
                                    <td colspan="16" class="text-center">Empty Data</td>
                                @endforelse
                            </tbody>

                            <tbody id="Tambahan" class="searchdata"></tbody>

                            <tbody class="tabel_tambahan">
                                <tr>
                                    <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">Nilai Kerja
                                        Tambahan
                                    </td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">
                                        {{ $nilai_kinerja_tambahan }}</td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr>
                                    <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">Nilai SKP</td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5"></td>
                                    <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">
                                        {{ $nilai_skp }}</td>
                                </tr>

                            </tbody>

                            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="successModalLabel">Yakin menghapus
                                                data?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <button class="btn btn-icon btn-modal btn-sm">
                                                <a href="{{ route('penilaianskp.delete', ['id' => $skp->id]) }}" class="action-link btn-modal">Hapus</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="printModalLabel">Cetak Penilaian SKP
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <!-- Form input data -->
                                            <form action="/admin-perencanaankerja/penilaianskp/print">
                                                <div class="form-group">
                                                    <label for="inputTahun">Tahun</label>
                                                    <input type="text" class="form-control" name="input_tahun" id="input_tahun" placeholder="Masukkan Tahun SKP">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="submit" value="Save" class="btn btn-primary">Cetak</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </table>
                    </div>
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
                $('.tabel_utama').hide();
                $('.tabel_tambahan').hide();
                $('.searchdata').show();
            } else {
                $('.tabel_utama').show();
                $('.tabel_tambahan').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedUnitkerjaValue, savedKinerjaValue);
        });

        $('#unitkerja').on('input', function() {
            savedUnitkerjaValue = $(this).val();

            if (savedUnitkerjaValue) {
                $('.tabel_utama').hide();
                $('.tabel_tambahan').hide();
                $('.searchdata').show();
            } else {
                $('.tabel_utama').show();
                $('.tabel_tambahan').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue, savedUnitkerjaValue, savedKinerjaValue);
        });

        $('#kinerja').on('input', function() {
            savedKinerjaValue = $(this).val();

            if (savedKinerjaValue == 'utama') {
                $('.tabel_utama').show();
                $('.tabel_tambahan').hide();
            } else if (savedKinerjaValue == 'tambahan') {
                $('.tabel_utama').hide();
                $('.tabel_tambahan').show();
            } else {
                $('.tabel_utama').show();
                $('.tabel_tambahan').show();

            }

            handleSearch(savedValue, savedUnitkerjaValue, savedKinerjaValue);
        });

        function handleSearch(value, unitkerjavalue, kinerjavalue) {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('/admin-perencanaankerja/penilaianskp/search') }}',
                data: {
                    'search': value,
                    'unitkerja': unitkerjavalue,
                    'kinerja': kinerjavalue
                },
                success: function(data) {
                    console.log(data);
                    $('#Utama').html(data);
                }
            });
        }

        $(function() {
            $('#successModal').on('show.bs.modal', function() {
                var successModal = $(this);
                clearTimeout(successModal.data('hideInterval'));
                successModal.data('hideInterval', setTimeout(function() {
                    successModal.modal('hide');
                }, 5000));
            });
        });
    </script>
@endsection

{{-- utama<tr> --}}
