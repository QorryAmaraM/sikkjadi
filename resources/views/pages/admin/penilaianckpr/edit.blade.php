@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Edit Penilaian CKPR</h1>
        </div>

        <!-- Content Row -->

        <form required action="/admin-ckp/penilaianckpr/{{ $nilaickpr->id }}" method="POST">
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
                                    <input type="hidden" name="ckpr_id" value="{{ $result->id }}" disabled>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <input type="tahun" class="form-control col-sm-11" value="{{ $result->tahun }}" disabled>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="bulan" class="col-sm-1 pl-0 col-form-label">Bulan</label>
                        <input type="bulan" class="form-control col-sm-11" value="{{ $result->bulan }}" disabled>
                    </div>
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="fungsi">Uraian Kegiatan</label>
                        <input type="fungsi" class="form-control" value="{{ $result->uraian_kegiatan }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="periode">Kode Butir</label>
                        <input type="periode" class="form-control" value="{{ $result->kode_butir }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kegiatan">Kode</label>
                        <input type="kegiatan" class="form-control" value="{{ $result->kode }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="target">Satuan</label>
                        <input type="target" class="form-control" value="{{ $result->satuan }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="targetrev">Target</label>
                        <input type="targetrev" class="form-control" value="{{ $result->target }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="targetrev">Target Rev</label>
                        <input type="targetrev" class="form-control" value="{{ $result->target_rev }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="realisasi">Realisasi</label>
                        <input type="realisasi" class="form-control" value="{{ $result->realisasi }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="persen">Persen (%)</label>
                        <input type="persen" class="form-control" value="{{ $result->persen }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="nilai" class="form-control" value="{{ $result->nilai }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="ketstaf">Keterangan Staf</label>
                        <input type="ketstaf" class="form-control" value="{{ $result->keterangan }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="penilai">Penilai</label>
                        <input type="penilai" class="form-control" id="penilai" name="penilai" value="{{ $nilaickpr->penilai }}" required>
                    </div>
                    <div class="form-group">
                        <label for="ketpenilai">Keterangan Penilai</label>
                        <input type="ketpenilai" class="form-control" id="keterangan_penilai" name="keterangan_penilai" value="{{ $nilaickpr->keterangan_penilai }}">
                    </div>
                    <div class="form-group">
                        <label for="penilai">Nilai</label>
                        <input type="text" class="form-control" id="nilai" name="nilai" value="{{ $nilaickpr->nilai }}" placeholder="Masukkan Angka" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-3 text-right">
                    <button type="submit" name="submit" value="Save" class="btn save-button" onclick="checkFormAndShowModal()">Update</button>
                </div>
            </div>


        </form>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function checkFormAndShowModal() {
    var form = document.getElementById('myForm');
    var allInputsFilled = true;

    // Loop untuk memeriksa setiap input dalam form
    for (var i = 0; i < form.length; i++) {
        if (form[i].type == "text" || form[i].type == "select-one") {
            if (form[i].value == "") {
                allInputsFilled = false;
                break;
            }
        }
    }

    // Jika semua input terisi, tampilkan modal
    if (allInputsFilled) {
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Data berhasil diedit!",
            showConfirmButton: false,
            timer: 5000
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
