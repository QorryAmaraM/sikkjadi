@extends('layouts.kepalabu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Capaian Kinerja Pegawai Target</h1>
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
                            @foreach ($resultrole as $ckpt)
                                @php
                                    $userId = $ckpt->user_id;
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
            <div class="col-sm-12 d-flex justify-content-end align-items-center mb-2">
                <a href="/kepalabu-ckp/ckpt/create" type="button" class="btn add-button">+ Tambah</a>
                <button class="btn btn-icon btn-print btn-sm" data-toggle="modal" data-target="#printModal">
                    <i class="fas fa-print"></i>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Fungsi</th>
                                <th>Periode</th>
                                <th>Uraian Kegiatan</th>
                                <th>Satuan</th>
                                <th>Target</th>
                                <th>Target Rev</th>
                                <th>Kode Butir</th>
                                <th>Angka Kredit</th>
                                <th>Kode</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="alldata">
                            @forelse ($resultrole as $ckpt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ckpt->fungsi }}</td>
                                    <td>{{ $ckpt->tahun }} {{ $ckpt->bulan }}</td>
                                    <td>{{ $ckpt->uraian_kegiatan }}</td>
                                    <td>{{ $ckpt->satuan }}</td>
                                    <td>{{ $ckpt->target }}</td>
                                    <td>{{ $ckpt->target_rev }}</td>
                                    <td>{{ $ckpt->kode_butir }}</td>
                                    <td>{{ $ckpt->angka_kredit }}</td>
                                    <td>{{ $ckpt->kode }}</td>
                                    <td>{{ $ckpt->keterangan }}</td>
                                    <td>
                                        <button class="btn btn-icon btn-edit btn-sm">
                                            <a href="{{ route('kepalabu.ckpt.edit', ['id' => $ckpt->id]) }}" class="action-link"><i class="fas fa-edit"></i></a>
                                        </button> |
                                        <button class="btn btn-icon btn-delete btn-sm" data-delete-url="{{ route('kepalabu.ckpt.delete', ['id' => $ckpt->id]) }}">
                                            <i class="fas fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="printModalLabel">Cetak CKP-T</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <!-- Form input data -->
                                                <form action="/kepalabu-ckp/ckpt/print">
                                                    <div class="form-group">
                                                        <label for="inputData">Pejabat Penilai</label>
                                                        <input type="text" class="form-control" name="pejabatnama" id="pejabatnama">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputData">NIP Pejabat Penilai</label>
                                                        <input type="text" class="form-control" name="pejabatid" id="pejabatid">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="submit" value="Save" class="btn btn-primary">Cetak</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <td colspan="12" class="text-center">Empty Data</td>
                            @endforelse
                        </tbody>
                        <tbody id="Content" class="searchdata"></tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                    {{ $resultrole->links('vendor.pagination.bootstrap-4') }}
            </div>
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
                url: '{{ URL::to('/kepalabu-ckp/ckpt/search') }}',
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Event delegation untuk tombol hapus
            $(document).on('click', '.btn-delete', function() {
                var deleteUrl = $(this).data('delete-url');

                Swal.fire({
                    title: "Anda Yakin?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                }).then((resultrole) => {
                    if (resultrole.isConfirmed) {
                        window.location.href = deleteUrl; // Redirect ke URL penghapusan
                    }
                });
            });
        });
    </script>
    
@endsection
