@extends('layouts.kepalabu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Tambah Monitoring Presensi</h1>
        </div>

        <!-- Content Row -->

        <form id="myForm" action="/kepalabu-monitoring/monitorinpre/store" method="POST">
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
                        <input type="tahun" class="form-control col-sm-11" id="tahun"
                            placeholder="YYYY" name="tahun" required>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="bulan" class="col-sm-1 pl-0 col-form-label">Bulan</label>
                        <input type="bulan" class="form-control col-sm-11" id="bulan" placeholder="Bulan"
                            name="bulan" required>
                    </div>
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="cp">CP</label>
                        <input type="cp" class="form-control" id="cp" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="cp">
                    </div>
                    <div class="form-group">
                        <label for="ct">CT</label>
                        <input type="ct" class="form-control" id="ct" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="ct">
                    </div>
                    <div class="form-group">
                        <label for="cb">CB</label>
                        <input type="cb" class="form-control" id="cb" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="cb">
                    </div>
                    <div class="form-group">
                        <label for="cs">CS</label>
                        <input type="cs" class="form-control" id="cs" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="cs">
                    </div>
                    <div class="form-group">
                        <label for="cm">CM</label>
                        <input type="cm" class="form-control" id="cm" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="cm">
                    </div>
                    <div class="form-group">
                        <label for="cltn">CLTN</label>
                        <input type="cltn" class="form-control" id="cltn" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="cltn">
                    </div>
                    <div class="form-group">
                        <label for="s">S</label>
                        <input type="s" class="form-control" id="s"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="s">
                    </div>
                    <div class="form-group">
                        <label for="psw1">PSW1</label>
                        <input type="psw1" class="form-control" id="psw1"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="psw1">
                    </div>
                    <div class="form-group">
                        <label for="psw2">PSW2</label>
                        <input type="psw2" class="form-control" id="psw2"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="psw2">
                    </div>
                    <div class="form-group">
                        <label for="psw3">PSW3</label>
                        <input type="psw3" class="form-control" id="psw3"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="psw3">
                    </div>
                    <div class="form-group">
                        <label for="psw4">PSW4</label>
                        <input type="psw4" class="form-control" id="psw4"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="psw4">
                    </div>
                    <div class="form-group">
                        <label for="tl1">TL1</label>
                        <input type="tl1" class="form-control" id="tl1"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="tl1">
                    </div>
                    <div class="form-group">
                        <label for="tl2">TL2</label>
                        <input type="tl2" class="form-control" id="tl2"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="tl2">
                    </div>
                    <div class="form-group">
                        <label for="tl3">TL3</label>
                        <input type="tl3" class="form-control" id="tl3"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="tl3">
                    </div>
                    <div class="form-group">
                        <label for="tl4">TL4</label>
                        <input type="tl4" class="form-control" id="tl4"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="tl4">
                    </div>
                    <div class="form-group">
                        <label for="jhk">JHK</label>
                        <input type="jhk" class="form-control" id="jhk"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="jhk">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-3 text-right">

                    <button type="submit" name="submit" value="Save" class="btn save-button" onclick="checkFormAndShowModal()" >Simpan</button>
                </div>
            </div>

           
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       function checkFormAndShowModal() {
    var tahun = document.getElementById('tahun').value.trim();
    var bulan = document.getElementById('bulan').value.trim();

    // Jika tahun atau bulan tidak diisi, tampilkan modal error
    if (tahun === '' || bulan === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap isi tahun dan bulan sebelum melanjutkan.',
        });
    } else {
        // Jika tahun dan bulan terisi, tampilkan modal sukses
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
    }
}
    </script>
    <!-- /.container-fluid -->
@endsection
