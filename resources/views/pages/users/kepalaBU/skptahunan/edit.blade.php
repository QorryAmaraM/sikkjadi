@extends('layouts.kepalaBU')

@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-black-800">Perencanaan Kinerja Tahunan</h1>
      </div>

      <!-- Content Row -->
      <div class="row mb-8">
         <div class="col-sm-6"> 
            <div class="form-group d-flex align-items-center">
               <label for="searchSelect" class="mb-0 mr-4">Pegawai</label>
               <select class="selectpicker flex-grow-1" data-width="75%" data-live-search="true" id="searchSelect">
                  <option data-tokens="ketchup mustard"></option>
                  <option data-tokens="mustard"></option>
                  <option data-tokens="frosting"></option>
               </select>
            </div>
         </div>
      </div>

      <form>
         <div class="row mb-8 mt-3">
            <div class="col-sm-12">
               <div class="form-group">
                  <label for="tahun">Tahun</label>
                     <input type="tahun" class="form-control" id="tahun" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="periode">Periode</label>
                     <input type="periode" class="form-control" id="periode" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="wilayah">Wilayah</label>
                     <input type="wilayah" class="form-control" id="wilayah" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="unitkerja">Unit Kerja</label>
                     <input type="unitkerja" class="form-control" id="unitkerja" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                     <input type="jabatan" class="form-control" id="jabatan" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="status">Status</label>
                     <input type="status" class="form-control" id="status" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
            </div>
         </div>   
      </form>
      
      <div class="row">
         <div class="col-sm-12 mt-3 text-right">
            
               <a href="{{ route('skptahunan') }}" type="button" class="btn save-button">Simpan</a>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
@endsection
