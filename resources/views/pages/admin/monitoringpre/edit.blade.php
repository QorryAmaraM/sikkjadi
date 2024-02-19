@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Edit Monitoring Presensi</h1>
        </div>

        <!-- Content Row -->

        <form action="/admin-monitoring/monitorinpre/{{ $monitoringpresensi->id }}" method="POST">
            @csrf
            @method('put')

            <div class="row mb-8">
                <div class="col-sm-7">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-2 pl-0 col-form-label">Nama</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nip" class="col-sm-2 pl-0 col-form-label">NIP</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nip" value="{{ $users->nip }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <select class="form-control col-sm-11" data-width="75%" data-live-search="true" id="tahun" name="tahun">
                            <option value="">Pilih tahun</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="bulan" class="col-sm-1 pl-0 col-form-label">Bulan</label>
                        <select class="form-control col-sm-11" data-width="75%" data-live-search="true" id="bulan" name="bulan">
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
                        <label for="cp">CP</label>
                        <input type="cp" class="form-control" id="cp" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="cp" value="{{ $monitoringpresensi->cp }}">
                    </div>
                    <div class="form-group">
                        <label for="ct">CT</label>
                        <input type="ct" class="form-control" id="ct" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="ct" value="{{ $monitoringpresensi->ct }}">
                    </div>
                    <div class="form-group">
                        <label for="cb">CB</label>
                        <input type="cb" class="form-control" id="cb" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="cb" value="{{ $monitoringpresensi->cb }}">
                    </div>
                    <div class="form-group">
                        <label for="cs">CS</label>
                        <input type="cs" class="form-control" id="cs" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="cs" value="{{ $monitoringpresensi->cs }}">
                    </div>
                    <div class="form-group">
                        <label for="cm">CM</label>
                        <input type="cm" class="form-control" id="cm"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="cm"
                            value="{{ $monitoringpresensi->cm }}">
                    </div>
                    <div class="form-group">
                        <label for="cltn">CLTN</label>
                        <input type="cltn" class="form-control" id="cltn"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="cltn"
                            value="{{ $monitoringpresensi->cltn }}">
                    </div>
                    <div class="form-group">
                        <label for="s">S</label>
                        <input type="s" class="form-control" id="s"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="s"
                            value="{{ $monitoringpresensi->s }}">
                    </div>
                    <div class="form-group">
                        <label for="psw1">PSW1</label>
                        <input type="psw1" class="form-control" id="psw1"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="psw1"
                            value="{{ $monitoringpresensi->psw1 }}">
                    </div>
                    <div class="form-group">
                        <label for="psw2">PSW2</label>
                        <input type="psw2" class="form-control" id="psw2"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="psw2"
                            value="{{ $monitoringpresensi->psw2 }}">
                    </div>
                    <div class="form-group">
                        <label for="psw3">PSW3</label>
                        <input type="psw3" class="form-control" id="psw3"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="psw3"
                            value="{{ $monitoringpresensi->psw3 }}">
                    </div>
                    <div class="form-group">
                        <label for="psw4">PSW4</label>
                        <input type="psw4" class="form-control" id="psw4"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="psw4"
                            value="{{ $monitoringpresensi->psw4 }}">
                    </div>
                    <div class="form-group">
                        <label for="tl1">TL1</label>
                        <input type="tl1" class="form-control" id="tl1"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="tl1"
                            value="{{ $monitoringpresensi->tl1 }}">
                    </div>
                    <div class="form-group">
                        <label for="tl2">TL2</label>
                        <input type="tl2" class="form-control" id="tl2"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="tl2"
                            value="{{ $monitoringpresensi->tl2 }}">
                    </div>
                    <div class="form-group">
                        <label for="tl3">TL3</label>
                        <input type="tl3" class="form-control" id="tl3"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="tl3"
                            value="{{ $monitoringpresensi->tl3 }}">
                    </div>
                    <div class="form-group">
                        <label for="tl4">TL4</label>
                        <input type="tl4" class="form-control" id="tl4"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="tl4"
                            value="{{ $monitoringpresensi->tl4 }}">
                    </div>
                    <div class="form-group">
                        <label for="jhk">JHK</label>
                        <input type="jhk" class="form-control" id="jhk"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="jhk"
                            value="{{ $monitoringpresensi->jhk }}">
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
