@extends('layouts.staf')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Edit CKP Akhir</h1>
        </div>

        <!-- Content Row -->
        @foreach ($result as $result)
            @if ($result->penilaian_ckpr_id == null)
                <form id="myForm" action="/staf-monitoring/monitoringckp/store" method="POST">
                    @csrf
                    <div class="row mb-8">
                        <div class="col-sm-12">
                            <div class="form-group d-flex align-items-center">
                                <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                                @foreach ($user as $users)
                                    @if ($users->id == $result->user_id)
                                        <input type="nama" class="form-control col-sm-11" id="nama"
                                            placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                                        <input type="hidden" name="penilaian_ckpr_id" value="{{ $result->id }}">
                                    @endif
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
                                <input type="tahun" class="form-control col-sm-11" id="tahun" name="tahun"
                                    value="{{ $result->tahun }}" disabled>
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="bulan" class="col-sm-1 pl-0 col-form-label">Bulan</label>
                                <input type="bulan" class="form-control col-sm-11" id="bulan" name="bulan"
                                    value="{{ $result->bulan }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-8">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="kegiatan">CKPR Akhir</label>
                                <input type="kegiatan" class="form-control" id="ckp_akhir" name="ckp_akhir" placeholder="Masukkan Angka" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                            </div>
                            <div class="form-group">
                                <label for="kodebutir">Keterangan Kepala</label>
                                <input type="kegiatan" class="form-control" id="keterangan_kepala" name="keterangan_kepala">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 mt-3 text-right">
                            <button type="submit" name="submit" value="Save" class="btn save-button" onclick="checkFormAndShowModal()">Simpan</button>
                        </div>
                    </div>

                </form>
            @else
                <form id="myForm" action="/staf-monitoring/monitoringckp/{{ $nilai_ckpr_id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mb-8">
                        <div class="col-sm-12">
                            <div class="form-group d-flex align-items-center">
                                <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                                @foreach ($user as $users)
                                    @if ($users->id == $result->user_id)
                                        <input type="nama" class="form-control col-sm-11" id="nama"
                                            placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                                        <input type="hidden" name="penilaian_ckpr_id" value="{{ $result->id }}">
                                    @endif
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
                                <input type="tahun" class="form-control col-sm-11" id="tahun" name="tahun"
                                    value="{{ $result->tahun }}" disabled>
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label for="bulan" class="col-sm-1 pl-0 col-form-label">Bulan</label>
                                <input type="bulan" class="form-control col-sm-11" id="bulan" name="bulan"
                                    value="{{ $result->bulan }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-8">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="kegiatan">CKPR Akhir</label>
                                <input type="text" class="form-control" id="ckp_akhir" name="ckp_akhir" value="{{ $result->ckp_akhir }}"  placeholder="Masukkan Angka" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                            </div>
                            <div class="form-group">
                                <label for="kodebutir">Keterangan Kepala</label>
                                <input type="kegiatan" class="form-control" id="keterangan_kepala" name="keterangan_kepala" value="{{ $result->keterangan_kepala }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 mt-3 text-right">
                            <button type="submit" name="submit" value="Save" class="btn save-button" onclick="checkFormAndShowModal()">Simpan</button>
                        </div>
                    </div>


                </form>
            @endif
        @endforeach

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       function checkFormAndShowModal() {
    var form = document.getElementById('myForm');
    var allInputsFilled = true;

    // Loop untuk memeriksa setiap input dalam form, kecuali input keterangan
    for (var i = 0; i < form.length; i++) {
        if (form[i].type == "text" || form[i].type == "select-one") {
            // Mengecualikan input keterangan dari pemeriksaan
            if (form[i].name !== 'keterangan_kepala') {
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
