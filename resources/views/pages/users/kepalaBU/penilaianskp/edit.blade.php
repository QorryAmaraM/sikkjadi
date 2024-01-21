@extends('layouts.kepalabu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Penilaian SKP</h1>
        </div>

        <!-- Content Row -->

        <form action="/kepalabu-perencanaanlerja/penilaianskp/{{ $penilaianskp->id }}" method="POST">
            @csrf
            @method('put')

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
                        <label for="pangkat" class="col-sm-2 pl-0 col-form-label">Pangkat</label>
                        <input type="pangkat" class="form-control col-sm-10" id="pangkat" placeholder="Pembina Tingkat"
                            name="pangkat" value="{{ $penilaianskp->pangkat }}">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="jabatan" class="col-sm-2 pl-0 col-form-label">Jabatan</label>
                        <input type="jabatan" class="form-control col-sm-10" id="jabatan" placeholder="Kepala"
                            name="jabatan" value="{{ $penilaianskp->jabatan }}">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="unitkerja" class="col-sm-2 pl-0 col-form-label">Unit Kerja</label>
                        <input type="unitkerja" class="form-control col-sm-10" id="unitkerja"
                            placeholder="Pusat Pendidikan dan Pelatihan" name="unit_kerja"
                            value="{{ $penilaianskp->unit_kerja }}">
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label for="kinerja" class="col-sm-1 pl-0 col-form-label">Kinerja</label>
                        @if ($penilaianskp->kinerja == 'utama')
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="kjutama" value="utama" name="kinerja"
                                    onclick="toggleCheckbox(this)" checked>
                                <label class="form-check-label" for="inlineCheckbox1">Utama</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="kjtambahan" value="tambahan"
                                    name="kinerja" onclick="toggleCheckbox(this)" disabled>
                                <label class="form-check-label" for="inlineCheckbox2">Tambahan</label>
                            </div>
                        @else
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="kjutama" value="utama" name="kinerja"
                                    onclick="toggleCheckbox(this)" disabled>
                                <label class="form-check-label" for="inlineCheckbox1">Utama</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="kjtambahan" value="tambahan"
                                    name="kinerja" onclick="toggleCheckbox(this)" checked>
                                <label class="form-check-label" for="inlineCheckbox2">Tambahan</label>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="jenisrk">Jenis</label>
                        <input type="jenisrk" class="form-control" id="jenisrk"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="jenis" value="{{ $penilaianskp->jenis }}">
                    </div>
                    <div class="form-group">
                        <label for="rkatasan">Rencana Kinerja Atasan</label>
                        <input type="rkatasan" class="form-control" id="rkatasan"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="rencana_kinerja_atasan"
                            value="{{ $penilaianskp->rencana_kinerja_atasan }}">
                    </div>
                    <div class="form-group">
                        <label for="rkpegawai">Rencana Kinerja</label>
                        <input type="rkpegawai" class="form-control" id="rkpegawai"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="rencana_kinerja"
                            value="{{ $penilaianskp->rencana_kinerja }}">
                    </div>
                    <div class="form-group">
                        <label for="aspek">Aspek</label>
                        <input type="aspek" class="form-control" id="aspek"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="aspek" value="{{ $penilaianskp->aspek }}">
                    </div>
                    <div class="form-group">
                        <label for="iki">IKI</label>
                        <input type="iki" class="form-control" id="iki"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="iki" value="{{ $penilaianskp->iki }}">
                    </div>
                    <div class="form-group">
                        <label for="targetmin">Target Min</label>
                        <input type="targetmin" class="form-control" id="targetmin"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="target_min"
                            value="{{ $penilaianskp->target_min }}">
                    </div>
                    <div class="form-group">
                        <label for="targetmix">Target Max</label>
                        <input type="targetmix" class="form-control" id="targetmix"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="target_max"
                            value="{{ $penilaianskp->target_max }}">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="satuan" class="form-control" id="satuan"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="satuan" value="{{ $penilaianskp->satuan }}">
                    </div>
                    <div class="form-group">
                        <label for="realisasi">Realisasi</label>
                        <input type="realisasi" class="form-control" id="realisasi"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="realisasi"
                            value="{{ $penilaianskp->realisasi }}">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input type="kondisi" class="form-control" id="kondisi"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="kondisi"
                            value="{{ $penilaianskp->kondisi }}">
                    </div>
                    <div class="form-group">
                        <label for="capaianiki">Capaian IKI</label>
                        <input type="capaianiki" class="form-control" id="capaianiki"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="capaian_iki"
                            value="{{ $penilaianskp->capaian_iki }}">
                    </div>
                    <div class="form-group">
                        <label for="kategoriki">Kategori Capaian IKI</label>
                        <input type="kategoriki" class="form-control" id="kategoriki"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="kategori_capaian_iki"
                            value="{{ $penilaianskp->kategori_capaian_iki }}">
                    </div>
                    <div class="form-group">
                        <label for="nilaicapaian">Nilai Capaian Rencana</label>
                        <input type="nilaicapaian" class="form-control" id="nilaicapaian"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_capaian_rencana"
                            value="{{ $penilaianskp->nilai_capaian_rencana }}">
                    </div>
                    <div class="form-group">
                        <label for="kategoricp">Kategori Capaian Rencana</label>
                        <input type="kategoricp" class="form-control" id="kategoricp"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="kategori_capaian_rencana"
                            value="{{ $penilaianskp->kategori_capaian_rencana }}">
                    </div>
                    <div class="form-group">
                        <label for="nilaitimbang">Nilai Tertimbang</label>
                        <input type="nilaitimbang" class="form-control" id="nilaitimbang"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_tertimbang"
                            value="{{ $penilaianskp->nilai_tertimbang }}">
                    </div>
                    <div class="form-group">
                        <label for="nilaiutama">Nilai Kinerja Utama</label>
                        <input type="nilaiutama" class="form-control" id="nilaiutama"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_kinerja_utama"
                            value="{{ $penilaianskp->nilai_kinerja_utama }}">
                    </div>
                    <div class="form-group">
                        <label for="nilaitambahan">Nilai Kinerja Tambahan</label>
                        <input type="nilaitambahan" class="form-control" id="nilaitambahan"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_kinerja_tambahan"
                            value="{{ $penilaianskp->nilai_kinerja_tambahan }}">
                    </div>
                    <div class="form-group">
                        <label for="nilaiskp">Nilai SKP</label>
                        <input type="nilaiskp" class="form-control" id="nilaiskp"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_skp"
                            value="{{ $penilaianskp->nilai_skp }}">
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
