@extends('layouts.kepalaBPS')

      @section('content')
         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-black-800">Rencana Kinerja</h1>
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
                        <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <input type="tahun" class="form-control col-sm-11" id="tahun" placeholder="2023">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="periode" class="col-sm-1 pl-0 col-form-label">Periode</label>
                        <input type="periode" class="form-control col-sm-11" id="periode" placeholder="5 Januari - 23 Desember">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="wilayah" class="col-sm-1 pl-0 col-form-label">Wilayah</label>
                        <input type="wilayah" class="form-control col-sm-11" id="wilayah" placeholder="Pusat">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="unitkerja" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                        <input type="unitkerja" class="form-control col-sm-11" id="unitkerja" placeholder="Pusat Pendidikan dan Pelatihan">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="kinerja" class="col-sm-1 pl-0 col-form-label">Kinerja</label>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="checkbox" id="kjutama" value="option1">
                           <label class="form-check-label" for="inlineCheckbox1">Utama</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="checkbox" id="kjtambahan" value="option2">
                           <label class="form-check-label" for="inlineCheckbox2">Tambahan</label>
                        </div>
                     </div>
                  </div>
               </div>
            </form>

            <form>
               <div class="row mb-8">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label for="jenisrk">Jenis</label>
                           <input type="jenisrk" class="form-control" id="jenisrk" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="rkatasan">Rencana Kinerja Atasan</label>
                           <input type="rkatasan" class="form-control" id="rkatasan" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="rkpegawai">Rencana Kinerja</label>
                           <input type="rkpegawai" class="form-control" id="rkpegawai" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="aspek">Aspek</label>
                           <input type="aspek" class="form-control" id="aspek" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="iki">IKI</label>
                           <input type="iki" class="form-control" id="iki" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="targetmin">Target Min</label>
                           <input type="targetmin" class="form-control" id="targetmin" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="targetmix">Target Max</label>
                           <input type="targetmix" class="form-control" id="targetmix" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                     <div class="form-group">
                        <label for="satuan">Satuan</label>
                           <input type="satuan" class="form-control" id="satuan" placeholder="Lorem Ipsum Dolor Sit Amet">
                     </div>
                  </div>
               </div>
            </form>
            
            <div class="row">
               <div class="col-sm-12 mt-3 text-right">
                  <button type="button" class="btn hapus-button mr-2">Hapus</button>
                  <a href="{{ url('/rencanakinerja') }}" type="button" class="btn save-button">Simpan</a>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
      @endsection
