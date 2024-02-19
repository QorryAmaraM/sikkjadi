      @extends('layouts.kepalabu')

      @section('content')
          <!-- Begin Page Content -->
          <div class="container-fluid">

              <!-- Page Heading -->
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-black-800">Entri Angka Kredit</h1>
              </div>

              <!-- Content Row -->
              <form id="myForm" action="/kepalabu-masterangkakredit/entriangkakredit/store" method="POST" id="myForm">
                  @csrf
                  <div class="row mb-8">
                      <div class="col-sm-12">
                          <div class="form-group d-flex align-items-center">
                              <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Jenis Fungsional</label>
                              <select class="form-control" data-width="75%" name="jenis_fungsional" required>
                                  <option value="Semua Jenjang">Semua Jenjang</option>
                                  <option value="Admininstrator">Admininstrator</option>
                                  <option value="Pengawas">Pengawas</option>
                                  <option value="Fungsional Umum">Fungsional Umum</option>
                                  <option value="Fungsional Penatalaksana Barang">Fungsional Penatalaksana Barang</option>
                                  <option value="Statistisi Pelaksana Lanjutan">Statistisi Pelaksana Lanjutan</option>
                                  <option value="Statistisi Pertama">Statistisi Pertama</option>
                                  <option value="Statistisi Penyelia">Statistisi Penyelia</option>
                                  <option value="Statistisi Muda">Statistisi Muda</option>
                                  <option value="Statistisi Madya">Statistisi Madya</option>
                                  <option value="Statistisi Utama">Statistisi Utama</option>
                                  <option value="Parkom Pertama">Parkom Pertama</option>
                                  <option value="Parkom Muda">Parkom Muda</option>
                                  <option value="Penata Keuangan Pertama">Penata Keuangan Pertama</option>
                                  <option value="Penata Keuangan Penyelia Muda">Penata Keuangan Penyelia Muda</option>
                                  <option value="Pranata Keuangan">Pranata Keuangan</option>
                                  <option value="Analisis Pengelola Keuangan">Analisis Pengelola Keuangan</option>
                              </select>
                              <input type="hidden" name="user_id" value="{{ $userid }}">
                          </div>
                          <div class="form-group d-flex align-items-center">
                              <label for="kodebutir" class="col-sm-2 pl-0 col-form-label">Kode Butir</label>
                              <input type="kodebutir" class="form-control col-sm-10" name="kode_butir"
                                  placeholder="Kode Butir" required>
                          </div>
                          <div class="form-group d-flex align-items-center">
                              <label for="isibutir" class="col-sm-2 pl-0 col-form-label">Isi Butir</label>
                              <input type="isibutir" class="form-control col-sm-10" name="isi_butir" placeholder="Isi Butir" required>
                          </div>
                          <div class="form-group d-flex align-items-center">
                              <label for="angkakredit" class="col-sm-2 pl-0 col-form-label">Angka Kredit</label>
                              <input type="text" class="form-control col-sm-10" name="angka_kredit" placeholder="Masukkan Angka" onkeypress="return(event.charCode != 8 && event.charCode == 0 || (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 44)" required>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-12 mt-3 text-right">
                          <button type="submit" name="submit" value="Save" class="btn save-button" onclick="checkFormAndShowModal()">+ Tambah</button>
                      </div>
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
