@extends('layouts.admin')

@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-black-800">Entri Angka Kredit</h1>
      </div>

      <!-- Content Row -->

      <form>
         <div class="row mb-8">
            <div class="col-sm-12">
               <div class="form-group">
                  <label for="jenisfungsi">Jenis Fungsional</label>
                     <input type="jenisfungsi" class="form-control" id="jenisfungsi" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="kodebutir">Kode Butir</label>
                     <input type="kodebutir" class="form-control" id="kodebutir" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="isibutir">Isi Butir</label>
                     <input type="isibutir" class="form-control" id="isibutir" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="angkakredit">Angka Kredit</label>
                     <input type="angkakredit" class="form-control" id="angkakredit" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
            </div>
         </div>
      </form>
      
      <div class="row">
         <div class="col-sm-12 mt-3 text-right">
            
            <a href="#" type="button" class="btn save-button" data-toggle="modal" data-target="#successModal">Simpan</a>
         </div>
      </div>
   </div>

          <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="successModalLabel">Data Berhasil Diedit</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
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
