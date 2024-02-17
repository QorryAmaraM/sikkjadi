@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Form Realisasi Target SKP</h1>
        </div>

        <!-- Content Row -->

        <form id="myForm" action="/admin-perencanaankerja/penilaianskp/store" method="POST">
            @csrf
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Penilai</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                                <input type="hidden" name="penilai_user_id" value="{{ $userid }}">
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                        @foreach ($result as $nama)
                            @if ($nama->id == $rencanakinerja_id)
                                @foreach ($user as $users)
                                    @if ($users->id == $nama->user_id)
                                        <input type="nama" class="form-control col-sm-11" id="nama"
                                            placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                                        <input type="hidden" name="rencanakinerja_id" value="{{ $rencanakinerja_id }}">
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nip</label>
                        @foreach ($result as $nip)
                            @if ($nip->id == $rencanakinerja_id)
                                @foreach ($user as $users)
                                    @if ($users->id == $nip->user_id)
                                        <input type="nama" class="form-control col-sm-11" id="nama"
                                            placeholder="Lorem Ipsum" name="nama" value="{{ $users->nip }}" disabled>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Golongan</label>
                        @foreach ($result as $golongan)
                            @if ($golongan->id == $rencanakinerja_id)
                                @foreach ($user as $users)
                                    @if ($users->id == $golongan->user_id)
                                        <input type="nama" class="form-control col-sm-11" id="nama" name="nama"
                                            value="{{ $users->golongan }}" disabled>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Fungsional</label>
                        @foreach ($result as $fungsional)
                            @if ($fungsional->id == $rencanakinerja_id)
                                @foreach ($user as $users)
                                    @if ($users->id == $fungsional->user_id)
                                        <input type="nama" class="form-control col-sm-11" id="nama" name="nama"
                                            value="{{ $users->fungsional }}" disabled>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                        @foreach ($result as $unitkerja)
                            @if ($unitkerja->id == $rencanakinerja_id)
                                <input type="nama" class="form-control col-sm-11" id="nama" name="nama"
                                    value="{{ $unitkerja->unit_kerja }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Kinerja</label>
                        @foreach ($result as $kinerja)
                            @if ($kinerja->id == $rencanakinerja_id)
                                <input type="nama" class="form-control col-sm-11" id="nama" name="nama"
                                    value="{{ $kinerja->kinerja }}" disabled>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="realisasi">Aspek</label>
                        <input type="realisasi" class="form-control" value="Kualitas" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control" data-width="75%" data-live-search="true" id="kualitas_kondisi" name="kualitas_kondisi" required>
                            <option value="">Pilih Kondisi</option>
                            <option value="normal">Normal</option>
                            <option value="khusus">Khusus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="realisasi">Realisasi</label>
                        <input type="text" class="form-control" id="kualitas_realisasi" name="kualitas_realisasi" placeholder="Masukkan Angka" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
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
