@extends('layouts.kepalabps')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Edit Aspek</h1>
        </div>

        <!-- Content Row -->

        <form id="myForm" action="/kepalabps-perencanaankerja/rencanakinerja/{{ $rencanakinerja->id }}" method="POST">
            @csrf
            @method('put')
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                        @foreach ($result as $result)
                            @foreach ($user as $user)
                                @if ($user->id == $result->user_id)
                                    <input type="nama" class="form-control col-sm-11" value="{{ $user->nama }}"
                                        disabled>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <input type="tahun" class="form-control col-sm-11" value="{{ $result->tahun }}" disabled>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="periode" class="col-sm-1 pl-0 col-form-label">Periode</label>
                        <input type="periode" class="form-control col-sm-11" value="{{ $result->periode }}" disabled>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="wilayah" class="col-sm-1 pl-0 col-form-label">Wilayah</label>
                        <input type="wilayah" class="form-control col-sm-11" value="{{ $result->wilayah }}" disabled>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="unitkerja" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                        <input type="unitkerja" class="form-control col-sm-11" value="{{ $result->unit_kerja }}" disabled>
                    </div>

                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="aspek">Aspek</label>
                        <input type="aspek" class="form-control" id="aspek" name="aspek" value="Kualitas" disabled>
                    </div>
                    <div class="form-group">
                        <label for="iki">IKI</label>
                        <input type="iki" class="form-control" id="kualitas_iki" name="kualitas_iki" value="{{ $rencanakinerja->kualitas_iki }}" required>
                    </div>
                    <div class="form-group">
                        <label for="targetmin">Target Min</label>
                        <input type="targetmin" class="form-control" id="kualitas_target_min" name="kualitas_target_min" value="{{ $rencanakinerja->kualitas_target_min }}" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                    </div>
                    <div class="form-group">
                        <label for="targetmix">Target Max</label>
                        <input type="targetmix" class="form-control" id="kualitas_target_max" name="kualitas_target_max" value="{{ $rencanakinerja->kualitas_target_max }}" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="satuan" class="form-control" id="kualitas_satuan" name="kualitas_satuan" value="{{ $rencanakinerja->kualitas_satuan }}" required>
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
    <!-- /.container-fluid -->

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
@endsection
