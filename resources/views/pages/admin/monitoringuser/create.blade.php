@extends('layouts.admin')

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
                                <form id="myForm" class="validate-form mt-2" action="/admin-monitoring/monitoringuser/store" method="POST">
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
                                                <input type="nip" class="form-control" name="nip" id="nip" required />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" required />
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
                                                <select class="form-control col-sm-12" data-width="75%" data-live-search="true" id="golongan" name="golongan" required>
                                                    <option value="">Pilih Fungsional</option>
                                                    <option value="Pembina Utama (IV/e)">Pembina Utama (IV/e)</option>
                                                    <option value="Pembina UtamaMadya (IV/d)">Pembina UtamaMadya (IV/d)</option>
                                                    <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option> 
                                                    <option value="Pembina Tingkat I (IV/b)">Pembina Tingkat I (IV/b)</option>
                                                    <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                                                    <option value="Penata Tingkat I (III/d)">Penata Tingkat I (III/d)</option>
                                                    <option value="Penata (III/c)">Penata (III/c)</option>
                                                    <option value="Penata Muda Tingkat I (III/b)">Penata Muda Tingkat I (III/b)</option>
                                                    <option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                                                    <option value="Pengatur Tingkat I (II/d)">Pengatur Tingkat I (II/d)</option>
                                                    <option value="Pengatur (II/c)">Pengatur (II/c)</option>
                                                    <option value="Pengatur Muda Tingkat I (II/b)">Pengatur Muda Tingkat I (II/b)</option>
                                                    <option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                                                    <option value="Juru Tingkat I (I/d)">Juru Tingkat I (I/d)</option>
                                                    <option value="Juru (I/c)">Juru (I/c)</option>
                                                    <option value="Juru Muda Tingkat I (I/b)">Juru Muda Tingkat I (I/b)</option>
                                                    <option value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Fungsional</label>
                                                <select class="form-control col-sm-12" data-width="75%" data-live-search="true" id="fungsional" name="fungsional" required>
                                                    <option value="">Pilih Fungsional</option>
                                                    <option value="KEPALA KANTOR">KEPALA KANTOR </option>
                                                    <option value="Fungsional Pranata Komputer Muda">Fungsional Pranata Komputer Muda</option>
                                                    <option value="Statistisi Ahli Muda">Statistisi Ahli Muda</option>
                                                    <option value="Statistisi Ahli Muda">Statistisi Ahli Muda</option>
                                                    <option value="Statistisi Ahli Muda">Statistisi Ahli Muda</option>
                                                    <option value="Statistisi Ahli Muda">Statistisi Ahli Muda</option>
                                                    <option value="Statistisi Ahli Muda">Statistisi Ahli Muda</option>
                                                    <option value="Pranata Keuangan APBN Terampil">Pranata Keuangan APBN Terampil</option>
                                                    <option value="Tugas Belajar">Tugas Belajar</option>
                                                    <option value="Statistisi Pelaksana Lanjutan">Statistisi Pelaksana Lanjutan</option>
                                                    <option value="BENDAHARA PENGELUARAN">BENDAHARA PENGELUARAN</option>
                                                    <option value="Tugas Belajar">Tugas Belajar</option>
                                                    <option value="Staf Subbag Umum">Staf Subbag Umum</option>
                                                    <option value="Statistisi Penyeli">Statistisi Penyeli</option>
                                                    <option value="Statistisi Ahli Pertama">Statistisi Ahli Pertama</option>
                                                    <option value="Statistisi Ahli Pertama">Statistisi Ahli Pertama</option>
                                                    <option value="Tugas Belajar">Tugas Belajar</option>
                                                    <option value="Pranata komputer ahli pertama">Pranata komputer ahli pertama</option>
                                                    <option value="Statistisi Ahli Muda">Statistisi Ahli Muda</option>
                                                    <option value="Statistisi Ahli Pertama">Statistisi Ahli Pertama</option>
                                                    <option value="CPNS">CPNS</option>
                                                </select>
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
