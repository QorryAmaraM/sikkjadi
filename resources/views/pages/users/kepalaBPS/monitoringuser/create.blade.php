@extends('layouts.kepalabps')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Tambah Pengguna</h1>
        </div>

        <!-- account setting page -->

        <div class="row">

            <!-- right content section -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- general tab -->
                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                <!-- header media -->
                                <!--/ header media -->

                                <!-- form -->
                                <form id="myForm" class="validate-form mt-2" action="/kepalabps-monitoring/monitoringuser/store" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-nama">Jabatan</label>
                                                <select class="form-control col-sm-12" data-width="75%" data-live-search="true" id="role_id" name="role_id" required>
                                                    <option value="">Pilih Jabatan</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Kepala BPS</option>
                                                    <option value="3">Kepala Bagian Umum</option>
                                                    <option value="4">Koordinator Fungsi</option>
                                                    <option value="5">Staf</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-username">Nama</label>
                                                <input type="nama" class="form-control" name="nama" id="nama" required />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">NIP</label>
                                                <input type="nip" class="form-control" name="nip" id="nip" required/>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" required/>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" required />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Golongan</label>
                                                <input type="golongan" class="form-control" name="golongan" id="golongan" required />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Fungsional</label>
                                                <input type="fungsional" class="form-control" name="fungsional" id="fungsional" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 text-right">
                                        <button type="submit" name="submit" value="Save" class="btn btn-primary mt-2 mr-1" onclick="checkFormAndShowModal()">Simpan</button>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                            <!--/ general tab -->




                        </div>
                    </div>
                </div>
            </div>
            <!--/ right content section -->
        </div>
        </section>
        <!-- / account setting page -->

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
@endsection
<!-- /.container-fluid -->
