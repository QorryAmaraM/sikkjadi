@extends('layouts.kepalaBU')

@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-black-800">Penilaian SKP</h1>
      </div>

      <!-- Content Row -->

      <form>
         <div class="row mb-8">
            <div class="col-sm-12">
               <div class="form-group d-flex align-items-center">
                  <label for="nama" class="col-sm-2 pl-0 col-form-label">Nama</label>
                  <input type="nama" class="form-control col-sm-10" id="nama" placeholder="Lorem Ipsum">
               </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="nip" class="col-sm-2 pl-0 col-form-label">NIP</label>
                        <input type="nip" class="form-control col-sm-10" id="nip" placeholder="12345">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="pangkat" class="col-sm-2 pl-0 col-form-label">Pangkat</label>
                        <input type="pangkat" class="form-control col-sm-10" id="pangkat" placeholder="Pembina Tingkat">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="jabatan" class="col-sm-2 pl-0 col-form-label">Jabatan</label>
                        <input type="jabatan" class="form-control col-sm-10" id="jabatan" placeholder="Kepala">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="unitkerja" class="col-sm-2 pl-0 col-form-label">Unit Kerja</label>
                        <input type="unitkerja" class="form-control col-sm-10" id="unitkerja" placeholder="Pusat Pendidikan dan Pelatihan">
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="kinerja" class="col-sm-2 pl-0 col-form-label">Kinerja</label>
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
               <div class="form-group">
                  <label for="realisasi">Realisasi</label>
                     <input type="realisasi" class="form-control" id="realisasi" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="kondisi">Kondisi</label>
                     <input type="kondisi" class="form-control" id="kondisi" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="capaianiki">Capaian IKI</label>
                     <input type="capaianiki" class="form-control" id="capaianiki" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="kategoriki">Kategori Capaian IKI</label>
                     <input type="kategoriki" class="form-control" id="kategoriki" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="nilaicapaian">Nilai Capaian Rencana</label>
                     <input type="nilaicapaian" class="form-control" id="nilaicapaian" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="kategoricp">Kategori Capaian Rencana</label>
                     <input type="kategoricp" class="form-control" id="kategoricp" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="nilaitimbang">Nilai Tertimbang</label>
                     <input type="nilaitimbang" class="form-control" id="nilaitimbang" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="nilaiutama">Nilai Kinerja Utama</label>
                     <input type="nilaiutama" class="form-control" id="nilaiutama" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="nilaitambahan">Nilai Kinerja Tambahan</label>
                     <input type="nilaitambahan" class="form-control" id="nilaitambahan" placeholder="Lorem Ipsum Dolor Sit Amet">
               </div>
               <div class="form-group">
                  <label for="nilaiskp">Nilai SKP</label>
                     <input type="nilaiskp" class="form-control" id="nilaiskp" placeholder="Lorem Ipsum Dolor Sit Amet">
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
