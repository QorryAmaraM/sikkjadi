         @extends('layouts.kepalaBU')

         @section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

               <!-- Page Heading -->
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-black-800">Capaian Kinerja Karyawan Realisasi</h1>
               </div>

               <!-- Content Row -->

               <form>
                  <div class="row mb-8">
                     <div class="col-sm-7">
                        <div class="form-group d-flex align-items-center">
                           <label for="nama" class="col-sm-2 pl-0 col-form-label">Nama</label>
                           <input type="nama" class="form-control col-sm-10" id="nama" placeholder="Lorem Ipsum">
                        </div>
                        <div class="form-group d-flex align-items-center">
                           <label for="nip" class="col-sm-2 pl-0 col-form-label">NIP</label>
                           <input type="nip" class="form-control col-sm-10" id="nip" placeholder="12345">
                        </div>
                        <div class="form-group d-flex align-items-center">
                           <label for="tahun" class="col-sm-2 pl-0 col-form-label">Tahun</label>
                           <input type="tahun" class="form-control col-sm-10" id="tahun" placeholder="Pembina Tingkat">
                        </div>
                        <div class="form-group d-flex align-items-center">
                           <label for="bulan" class="col-sm-2 pl-0 col-form-label">Bulan</label>
                           <input type="bulan" class="form-control col-sm-10" id="bulan" placeholder="Kepala">
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
                           <label for="fungsi">Fungsi</label>
                              <input type="fungsi" class="form-control" id="fungsi" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="periode">Periode</label>
                              <input type="periode" class="form-control" id="periode" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="kegiatan">Uraian Kegiatan</label>
                              <input type="kegiatan" class="form-control" id="kegiatan" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="satuan">Satuan</label>
                              <input type="satuan" class="form-control" id="satuan" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="target">Target</label>
                              <input type="target" class="form-control" id="target" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="targetrev">Target Rev</label>
                              <input type="targetrev" class="form-control" id="targetrev" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="realisasi">Realisasi</label>
                              <input type="realisasi" class="form-control" id="realisasi" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="persen">Persen (%)</label>
                              <input type="persen" class="form-control" id="persen" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="nilai">Nilai</label>
                              <input type="nilai" class="form-control" id="nilai" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="kodebutir">Kode Butir</label>
                              <input type="kodebutir" class="form-control" id="kodebutir" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="angkakredit">Angka Kredit</label>
                              <input type="angkakredit" class="form-control" id="angkakredit" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="kode">Kode</label>
                              <input type="kode" class="form-control" id="kode" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="keterangan">Keterangan</label>
                              <input type="keterangan" class="form-control" id="keterangan" placeholder="Lorem Ipsum Dolor Sit Amet">
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
