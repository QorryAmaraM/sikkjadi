@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Capaian Kinerja Karyawan Realisasi</h1>
        </div>

        <!-- Content Row -->

        <form id="myForm"action="/admin-ckp/ckpr/{{ $ckpr->id }}" method="POST">
            @csrf
            @method('put')

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                        @foreach ($result as $result)
                            @foreach ($user as $users)
                                @if ($users->id == $result->user_id)
                                    <input type="nama" class="form-control col-sm-11" id="nama"
                                        placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nip" class="col-sm-1 pl-0 col-form-label">NIP</label>
                        @foreach ($user as $users)
                            @if ($users->id == $result->user_id)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nip" value="{{ $users->nip }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <input type="tahun" class="form-control col-sm-11" id="tahun" value="{{ $result->tahun }}"
                            name="tahun" disabled>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="bulan" class="col-sm-1 pl-0 col-form-label">Bulan</label>
                        <input type="bulan" class="form-control col-sm-11" id="bulan" value="{{ $result->bulan }}"
                            name="bulan" disabled>
                    </div>
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="kegiatan">Uraian Kegiatan</label>
                            <input type="bulan" class="form-control" value="{{ $result->uraian_kegiatan }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="kodebutir">Kode Butir</label>
                        <input type="bulan" class="form-control" value="{{ $result->angka_kredit }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="bulan" class="form-control" value="{{ $result->kode }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="bulan" class="form-control" value="{{ $result->satuan }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="target">Target</label>
                        <input type="bulan" class="form-control" value="{{ $result->target }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="targetrev">Target Rev</label>
                        <input type="bulan" class="form-control" value="{{ $result->target_rev }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="bulan" class="form-control" value="{{ $result->keterangan }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="realisasi">Realisasi</label>
                        <input type="realisasi" class="form-control" id="realisasi"
                        placeholder="Masukkan Angka" name="realisasi" value="{{ $result->realisasi }}" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-3 text-right">
                    <button type="submit" name="submit" value="Save" class="btn save-button" onclick="checkFormAndShowModal()">Update</button>
                </div>
            </div>

    

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function checkFormAndShowModal() {
    var form = document.getElementById('myForm');
    var realisasiInput = document.getElementById('realisasi');
    var realisasiValue = realisasiInput.value.trim(); // Menghapus spasi di awal dan akhir

    // Jika input realisasi sudah diisi
    if (realisasiValue !== "") {
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Data berhasil diedit!",
            showConfirmButton: false,
            timer: 10000
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                $('#successModal').modal('show');
            }
        });
    } else {
        // Tampilkan modal error jika input realisasi tidak diisi
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap isi input Realisasi sebelum melanjutkan.',
        });
    }
}

    </script>
    <!-- /.container-fluid -->
@endsection
