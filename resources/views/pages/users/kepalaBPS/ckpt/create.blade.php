@extends('layouts.kepalaBPS')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Tambah Capaian Kinerja Pegawai Target</h1>
        </div>

        <!-- Content Row -->

        <form id="myForm" action="/admin-ckp/ckpt/store" method="POST">
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
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nip" class="col-sm-1 pl-0 col-form-label">NIP</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nip" value="{{ $users->nip }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <select class="form-control col-sm-11" data-width="75%" data-live-search="true" id="tahun"
                            name="tahun" required>
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
                        <label for="bulan" class="col-sm-1 pl-0 col-form-label">Bulan</label>
                        <select class="form-control col-sm-11" data-width="75%" data-live-search="true" id="bulan"
                            name="bulan" required>
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

            <div class="row mb-8">
                <div class="col-sm-12">

                    <div class="form-group">
                        <label for="kegiatan">Uraian Kegiatan</label>
                        <select class="form-control" data-width="75%" name="uraian_kegiatan_id" required>
                            <option value="">Pilih Uraian Kegiatan</option>
                            @foreach ($uraiankegiatan as $uraiankegiatan)
                                <option value="{{ $uraiankegiatan->id }}">{{ $uraiankegiatan->uraian_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kodebutir">Kode Butir</label>
                        <select class="form-control" data-width="75%" name="angka_kredit_id" required>
                            <option value="">Pilih Kode Butir</option>
                            @foreach ($angkakredit as $angkakredit)
                                <option value="{{ $angkakredit->id }}">{{ $angkakredit->kode_butir }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <select class="form-control" data-width="75%" id="kode" name="kode" required>
                            <option value="">Pilih Kode</option>
                            <option value="utama">Utama</option>
                            <option value="tambahan">Tambahan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="satuan" class="form-control" id="satuan" name="satuan" required>
                    </div>
                    <div class="form-group">
                        <label for="target">Target</label>
                        <input type="text" class="form-control" id="target" name="target" placeholder="Masukkan Angka" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="keterangan" class="form-control" id="keterangan" name="keterangan">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-3 text-right">
                    <button type="submit" name="submit" value="Save" class="btn save-button" onclick="checkFormAndShowModal()">Simpan</button>
                </div>
            </div>


        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       function checkFormAndShowModal() {
    var form = document.getElementById('myForm');
    var allInputsFilled = true;

    // Loop untuk memeriksa setiap input dalam form, kecuali input keterangan
    for (var i = 0; i < form.length; i++) {
        if (form[i].type == "text" || form[i].type == "select-one") {
            // Mengecualikan input keterangan dari pemeriksaan
            if (form[i].name !== 'keterangan') {
                if (form[i].value == "") {
                    allInputsFilled = false;
                    break;
                }
            }
        }
    }

    // Jika semua input terisi kecuali input keterangan, tampilkan modal
    if (allInputsFilled) {
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Data berhasil ditambah!",
            showConfirmButton: false,
            timer: 10000
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                $('#successModal').modal('show');
            }
        });
    } else {
        // Tampilkan peringatan SweetAlert jika tidak semua data terisi
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap isi semua data sebelum melanjutkan.',
        });
    }
}

    </script>

    <!-- /.container-fluid -->
@endsection
