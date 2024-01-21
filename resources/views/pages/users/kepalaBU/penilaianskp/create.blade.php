@extends('layouts.kepalabu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Penilaian SKP</h1>
        </div>

        <!-- Content Row -->

        <form action="/kepalabu-perencanaanlerja/penilaianskp/store" method="POST">
            @csrf
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                                <input type="hidden" name="user_id" value="{{ $userid }}">
                                <input type="hidden" name="nama" value="{{ $users->nama }}">
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nip" class="col-sm-1 pl-0 col-form-label">NIP</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nip" value="{{ $users->nip }}" disabled>
                                <input type="hidden" name="nip" value="{{ $users->nip }}">
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="pangkat" class="col-sm-1 pl-0 col-form-label">Pangkat</label>
                        <input type="pangkat" class="form-control col-sm-10" id="pangkat" placeholder="Pembina Tingkat"
                            name="pangkat">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="jabatan" class="col-sm-1 pl-0 col-form-label">Jabatan</label>
                        <input type="jabatan" class="form-control col-sm-10" id="jabatan" placeholder="Kepala"
                            name="jabatan">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="unitkerja" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                        <input type="unitkerja" class="form-control col-sm-11" id="unitkerja"
                            placeholder="Pusat Pendidikan dan Pelatihan" name="unit_kerja">
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label for="kinerja" class="col-sm-1 pl-0 col-form-label">Kinerja</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="kjutama" value="utama" name="kinerja"
                                onclick="toggleCheckbox(this)">
                            <label class="form-check-label" for="inlineCheckbox1">Utama</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="kjtambahan" value="tambahan" name="kinerja"
                                onclick="toggleCheckbox(this)">
                            <label class="form-check-label" for="inlineCheckbox2">Tambahan</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="realisasi">Realisasi</label>
                        <input type="realisasi" class="form-control" id="realisasi"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="realisasi">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input type="kondisi" class="form-control" id="kondisi"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="kondisi">
                    </div>
                    <div class="form-group">
                        <label for="capaianiki">Capaian IKI</label>
                        <input type="capaianiki" class="form-control" id="capaianiki"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="capaian_iki">
                    </div>
                    <div class="form-group">
                        <label for="kategoriki">Kategori Capaian IKI</label>
                        <input type="kategoriki" class="form-control" id="kategoriki"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="kategori_capaian_iki">
                    </div>
                    <div class="form-group">
                        <label for="nilaicapaian">Nilai Capaian Rencana</label>
                        <input type="nilaicapaian" class="form-control" id="nilaicapaian"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_capaian_rencana">
                    </div>
                    <div class="form-group">
                        <label for="kategoricp">Kategori Capaian Rencana</label>
                        <input type="kategoricp" class="form-control" id="kategoricp"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="kategori_capaian_rencana">
                    </div>
                    <div class="form-group">
                        <label for="nilaitimbang">Nilai Tertimbang</label>
                        <input type="nilaitimbang" class="form-control" id="nilaitimbang"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_tertimbang">
                    </div>
                    <div class="form-group">
                        <label for="nilaiutama">Nilai Kinerja Utama</label>
                        <input type="nilaiutama" class="form-control" id="nilaiutama"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_kinerja_utama">
                    </div>
                    <div class="form-group">
                        <label for="nilaitambahan">Nilai Kinerja Tambahan</label>
                        <input type="nilaitambahan" class="form-control" id="nilaitambahan"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_kinerja_tambahan">
                    </div>
                    <div class="form-group">
                        <label for="nilaiskp">Nilai SKP</label>
                        <input type="nilaiskp" class="form-control" id="nilaiskp"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_skp">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-3 text-right">
                    <button type="submit" name="submit" value="Save" class="btn save-button">Simpan</button>
                </div>
            </div>

        </form>

    </div>
    <!-- /.container-fluid -->
    <script>
        function toggleCheckbox(checkbox) {
            // Mendapatkan elemen checkbox yang lain
            var otherCheckbox = (checkbox.id === 'kjutama') ? document.getElementById('kjtambahan') : document
                .getElementById('kjutama');

            // Menonaktifkan checkbox yang lain jika checkbox yang satu ditekan
            if (checkbox.checked) {
                otherCheckbox.disabled = true;
            } else {
                otherCheckbox.disabled = false;
            }
        }
    </script>
@endsection
