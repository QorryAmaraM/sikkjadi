@extends('layouts.kepalabu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Edit List Uraian Kegiatan</h1>
        </div>

        <!-- Content Row -->

        <form id="myForm" action="/kepalabu-masterutaiankegiatan/uraiankegiatan/{{ $uraiankegiatan->id }}" method="POST">
            @csrf
            @method('put')
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="pembuat">Pembuat</label>
                        @foreach ($user as $users)
                            @if ($users->id == $uraiankegiatan->user_id)
                                <input type="pembuat" class="form-control col-sm-11" value="{{ $users->nama }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="fungsi">Fungsi</label>
                        <select class="form-control" data-width="75%" id="fungsi" name="fungsi" required>
                            <option value="{{ $uraiankegiatan->fungsi }}">{{ $uraiankegiatan->fungsi }}</option>
                            <option value="IPDS">IPDS</option>
                            <option value="Sosial">Sosial</option>
                            <option value="Umum">Umum</option>
                            <option value="Distribusi">Distribusi</option>
                            <option value="Produksi">Produksi</option>
                            <option value="Nerwilis">Nerwilis</option>                         
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="kegiatan">Uraian Kegiatan</label>
                        <input type="kegiatan" class="form-control" id="kegiatan" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="uraian_kegiatan" value="{{ $uraiankegiatan->uraian_kegiatan }}" required>
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
