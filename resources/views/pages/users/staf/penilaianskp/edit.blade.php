@extends('layouts.staf')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Penilaian SKP</h1>
        </div>

        <!-- Content Row -->

        <form action="/staf-perencanaankerja/penilaianskp/{{ $penilaianskp->id }}" method="POST">
            @csrf
            @method('put')
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Penilai</label>
                        @foreach ($result as $result)
                            @foreach ($user as $userpenilai)
                                @if ($userpenilai->id == $result->penilai_user_id)
                                    <input type="nama" class="form-control col-sm-11" value="{{ $userpenilai->nama }}" disabled>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                        @foreach ($user as $usernama)
                            @if ($usernama->id == $result->user_id)
                                <input type="nama" class="form-control col-sm-11" value="{{ $usernama->nama }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nip</label>
                        @foreach ($user as $usernip)
                            @if ($usernip->id == $result->user_id)
                                <input type="nama" class="form-control col-sm-11" value="{{ $usernip->nip }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Golongan</label>
                        @foreach ($user as $usergolongan)
                            @if ($usergolongan->id == $result->user_id)
                                <input type="nama" class="form-control col-sm-11" value="{{ $usergolongan->golongan }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Fungsional</label>
                        @foreach ($user as $userfungsional)
                            @if ($userfungsional->id == $result->user_id)
                                <input type="nama" class="form-control col-sm-11" value="{{ $userfungsional->fungsional }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                        <input type="nama" class="form-control col-sm-11" value="{{ $result->unit_kerja }}" disabled>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Kinerja</label>
                        <input type="nama" class="form-control col-sm-11" value="{{ $result->kinerja }}" disabled>
                    </div>
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="realisasi">Realisasi</label>
                        <input type="realisasi" class="form-control" id="realisasi" placeholder="Lorem Ipsum Dolor Sit Amet" name="realisasi" value="{{ $penilaianskp->realisasi }}">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input type="kondisi" class="form-control" id="kondisi" placeholder="Lorem Ipsum Dolor Sit Amet" name="kondisi" value="{{ $penilaianskp->kondisi }}">
                    </div>
                    <div class="form-group">
                        <label for="capaianiki">Capaian IKI</label>
                        <input type="capaianiki" class="form-control" id="capaianiki" placeholder="Lorem Ipsum Dolor Sit Amet" name="capaian_iki" value="{{ $penilaianskp->capaian_iki }}">
                    </div>
                    <div class="form-group">
                        <label for="kategoriki">Kategori Capaian IKI</label>
                        <input type="kategoriki" class="form-control" id="kategoriki" placeholder="Lorem Ipsum Dolor Sit Amet" name="kategori_capaian_iki" value="{{ $penilaianskp->kategori_capaian_iki }}">
                    </div>
                    <div class="form-group">
                        <label for="nilaicapaian">Nilai Capaian Rencana</label>
                        <input type="nilaicapaian" class="form-control" id="nilaicapaian" placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_capaian_rencana" value="{{ $penilaianskp->realisasi }}">
                    </div>
                    <div class="form-group">
                        <label for="kategoricp">Kategori Capaian Rencana</label>
                        <input type="kategoricp" class="form-control" id="kategoricp" placeholder="Lorem Ipsum Dolor Sit Amet" name="kategori_capaian_rencana" value="{{ $penilaianskp->kategori_capaian_rencana }}">
                    </div>
                    <div class="form-group">
                        <label for="nilaitimbang">Nilai Tertimbang</label>
                        <input type="nilaitimbang" class="form-control" id="nilaitimbang" placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_tertimbang" value="{{ $penilaianskp->nilai_tertimbang }}">
                    </div>
                    <div class="form-group">
                        <label for="nilaiutama">Nilai Kinerja Utama</label>
                        <input type="nilaiutama" class="form-control" id="nilaiutama" placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_kinerja_utama" value="{{ $penilaianskp->nilai_kinerja_utama }}">
                    </div>
                    <div class="form-group">
                        <label for="nilaitambahan">Nilai Kinerja Tambahan</label>
                        <input type="nilaitambahan" class="form-control" id="nilaitambahan" placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_kinerja_tambahan" value="{{ $penilaianskp->nilai_kinerja_tambahan }}">
                    </div>
                    <div class="form-group">
                        <label for="nilaiskp">Nilai SKP</label>
                        <input type="nilaiskp" class="form-control" id="nilaiskp" placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai_skp" value="{{ $penilaianskp->nilai_skp }}">
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
