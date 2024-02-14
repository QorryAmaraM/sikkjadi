      @extends('layouts.kepalaBU')

      @section('content')
         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-black-800">Entri Angka Kredit</h1>
            </div>

            <!-- Content Row -->

            <div class="row mb-8">
               <div class="col-sm-12"> 
                  <div class="form-group d-flex align-items-center">
                     <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Jenis Fungsional</label>
                     <select class="selectpicker flex-grow-1" data-width="75%" data-live-search="true" id="searchSelect">
                        <option data-tokens="ketchup mustard"></option>
                        <option data-tokens="mustard"></option>
                        <option data-tokens="frosting"></option>
                     </select>
                  </div>
                  <div class="form-group d-flex align-items-center">
                        <label for="kodebutir" class="col-sm-2 pl-0 col-form-label">Kode Butir</label>
                        <input type="kodebutir" class="form-control col-sm-10" id="kodebutir" placeholder="Lorem Ipsum">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="isibutir" class="col-sm-2 pl-0 col-form-label">Isi Butir</label>
                        <input type="isibutir" class="form-control col-sm-10" id="isibutir" placeholder="2023">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="angkakredit" class="col-sm-2 pl-0 col-form-label">Angka Kredit</label>
                        <input type="angkakredit" class="form-control col-sm-10" id="angkakredit" placeholder="5 Januari - 23 Desember">
                     </div>
               </div>
            </div>

            <div class="row">
                      <div class="col-sm-12 mt-3 text-right">
                          <button type="submit" name="submit" value="Save" class="btn save-button" data-toggle="modal"
                              data-target="#successModal">+ Tambah</button>
                      </div>
                  </div>
          </div>

          <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="successModalLabel">Data Berhasil Ditambah</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          Selamat! Data berhasil ditambahkan. 
                          Anda akan diarahkan ke halaman selanjutnya.
                      </div>
                  </div>
              </div>
          </div>

          </form>
          
          <script>
    $(function () {
        $('#successModal').on('show.bs.modal', function () {
            var successModal = $(this);
            clearTimeout(successModal.data('hideInterval'));
            successModal.data('hideInterval', setTimeout(function () {
                successModal.modal('hide');
            }, 3000));
        });
    });
</script>
         <!-- /.container-fluid -->
      @endsection
