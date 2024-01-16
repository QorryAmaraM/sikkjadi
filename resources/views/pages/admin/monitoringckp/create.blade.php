      @extends('layouts.admin')

      @section('content')
         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-black-800">Monitoring CKP</h1>
            </div>

            <!-- Content Row -->
            <form>
               <div class="row mb-8">
                  <div class="col-sm-12">
                     <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                        <input type="nama" class="form-control col-sm-11" id="nama" placeholder="Lorem Ipsum">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="nip" class="col-sm-1 pl-0 col-form-label">NIP</label>
                        <input type="nip" class="form-control col-sm-11" id="nip" placeholder="2023">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <input type="tahun" class="form-control col-sm-11" id="tahun" placeholder="2023">
                     </div>
                  </div>
               </div>
            </form>

            <form>
               <div class="row mb-8">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label for="nomor">No</label>
                           <input type="nomor" class="form-control" id="nomor" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="periode">Periode</label>
                           <input type="periode" class="form-control" id="periode" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="ckp">CKP</label>
                           <input type="ckp" class="form-control" id="ckp" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="ckpakhir">CKP Akhir</label>
                           <input type="ckpakhir" class="form-control" id="ckpakhir" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="ketkepala">Keterangan Kepala</label>
                           <input type="ketkepala" class="form-control" id="ketkepala" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                  </div>
               </div>
            </form>
            
            <div class="row">
               <div class="col-sm-12 mt-3 text-right">
                  
                  <a href="#" type="button" class="btn save-button">Simpan</a>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
      @endsection
