         @extends('layouts.kepalaBU')

         @section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

               <!-- Page Heading -->
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-black-800">Monitoring Presensi</h1>
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
                           <input type="tahun" class="form-control col-sm-10" id="tahun" placeholder="12345">
                        </div>
                        <div class="form-group d-flex align-items-center">
                           <label for="bulan" class="col-sm-2 pl-0 col-form-label">Bulan</label>
                           <input type="bulan" class="form-control col-sm-10" id="bulan" placeholder="12345">
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
                           <label for="kode">Kode</label>
                              <input type="kode" class="form-control" id="kode" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="cp">CP</label>
                              <input type="cp" class="form-control" id="cp" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="ct">CT</label>
                              <input type="ct" class="form-control" id="ct" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="cb">CB</label>
                              <input type="cb" class="form-control" id="cb" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="cs">CS</label>
                              <input type="cs" class="form-control" id="cs" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="cm">CM</label>
                              <input type="cm" class="form-control" id="cm" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="cltn">CLTN</label>
                              <input type="cltn" class="form-control" id="cltn" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="s">S</label>
                              <input type="s" class="form-control" id="s" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="psw1">PSW1</label>
                              <input type="psw1" class="form-control" id="psw1" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="psw2">PSW2</label>
                              <input type="psw2" class="form-control" id="psw2" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="psw3">PSW3</label>
                              <input type="psw3" class="form-control" id="psw3" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="psw4">PSW4</label>
                              <input type="psw4" class="form-control" id="psw4" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="tl1">TL1</label>
                              <input type="tl1" class="form-control" id="tl1" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="tl2">TL2</label>
                              <input type="tl2" class="form-control" id="tl2" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="tl3">TL3</label>
                              <input type="tl3" class="form-control" id="tl3" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="tl4">TL4</label>
                              <input type="tl4" class="form-control" id="tl4" placeholder="Lorem Ipsum Dolor Sit Amet">
                        </div>
                        <div class="form-group">
                           <label for="jhk">JHK</label>
                              <input type="jhk" class="form-control" id="jhk" placeholder="Lorem Ipsum Dolor Sit Amet">
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
