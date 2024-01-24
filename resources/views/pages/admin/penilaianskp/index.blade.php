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
                                    $simpan = null;
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
                                                $simpan = $users->nip;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nip" class="col-sm-2 pl-0 col-form-label">NIP</label>
                        <input type="nip" class="form-control col-sm-10" id="nip" placeholder="12345" disabled>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label for="pangkat" class="col-sm-2 pl-0 col-form-label">Golongan</label>
                        <input type="pangkat" class="form-control col-sm-10" id="pangkat" placeholder="Pembina Tingkat">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="jabatan" class="col-sm-2 pl-0 col-form-label">Fungsional</label>
                        <input type="jabatan" class="form-control col-sm-10" id="jabatan" placeholder="Kepala">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="unitkerja" class="col-sm-2 pl-0 col-form-label">Unit Kerja</label>
                        <input type="unitkerja" class="form-control col-sm-10" id="unitkerja"
                            placeholder="Pusat Pendidikan dan Pelatihan">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="kinerja" class="col-sm-2 pl-0 col-form-label">Kinerja</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="kjutama" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Utama</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="kjtambahan" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Tambahan</label>
                        </div>
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
                <a href="/admin-perencanaankerja/penilaianskp/create" type="button" class="btn add-button">+ Tambah</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="margin-top: -25px">
                <div class="table-responsive">
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
                        <tbody>
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
                                            <a href="/admin-perencanaanlerja/penilaianskp/{{ $skp->id }}/edit"
                                                class="action-link"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="/admin-perencanaanlerja/penilaianskp/{{ $skp->id }}"
                                            method="POST" class="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-icon btn-delete btn-sm"><i
                                                    class="fas fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
                            @foreach ($penilaianskp as $skp)
                                <tr>
                                    <td>{{ $skp->nilai_kinerja_utama }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-icon btn-edit btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-icon btn-delete btn-sm">
                                            <i class="fas fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
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
        document.addEventListener("DOMContentLoaded", function() {
            // Mendapatkan elemen input dengan ID "nip"
            var nipInput = document.getElementById("nip");

            // Mendapatkan elemen select dengan ID "search"
            var searchSelect = document.getElementById("search");

            // Menambahkan event listener untuk perubahan nilai pada elemen select
            searchSelect.addEventListener("change", function() {
                // Mengatur nilai input "nip" dengan nilai dari elemen select yang dipilih
                nipInput.value = this.value;
            });
        });
    </script>
@endsection
