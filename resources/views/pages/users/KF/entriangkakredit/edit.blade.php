@extends('layouts.KF')

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
            <button type="button" class="btn hapus-button mr-2">Hapus</button>
            <a href="#" type="button" class="btn save-button">Simpan</a>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
@endsection
