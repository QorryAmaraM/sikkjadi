         @extends('layouts.KF')

         @section('content')
         <!-- Begin Page Content -->
         <div class="container-fluid">

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Capaian Kinerja Pegawai Target</h1>
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
                        <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Tahun</label>
                        <select class="selectpicker col-sm-10" data-width="75%" data-live-search="true" id="tahun">
                           <option data-tokens="ketchup mustard"></option>
                           <option data-tokens="mustard"></option>
                           <option data-tokens="frosting"></option>
                        </select>
                     </div>
                     <div class="form-group d-flex align-items-center">
                        <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Bulan</label>
                           <select class="selectpicker col-sm-10" data-width="75%" data-live-search="true" id="bulan">
                              <option data-tokens="ketchup mustard"></option>
                              <option data-tokens="mustard"></option>
                              <option data-tokens="frosting"></option>
                           </select>
                     </div>
                  </div>
               </div>
            </form>

            <div class="row">
               <div class="col-sm-6">
                  <div class="inner-form">
                     <div class="input-form">
                        <input id="search" type="text" placeholder="Pencarian"/>
                           <div class="input-form-append align-items-center">
                              <i class="fas fa-search"></i>
                           </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 d-flex justify-content-end align-items-center">
                  <a href="#" type="button" class="btn add-button">+ Tambah</a>
                  <button class="btn btn-icon btn-print btn-sm">
                     <i class="fas fa-print"></i>
                  </button>
               </div>
            </div>

            <div class="row">
               <div class="col-sm-12">
                  <div class="table-responsive"> 
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                           <tr>
                              <th>No</th>
                              <th>Fungsi</th>
                              <th>Peiode</th>
                              <th>Uraian Kegiatan</th>
                              <th>Satuan</th>
                              <th>Target</th>
                              <th>Target Rev</th>
                              <th>Kode Butir</th>
                              <th>Angka Kredit</th>
                              <th>Kode</th>
                              <th>Keterangan</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                 <button class="btn btn-icon btn-edit btn-sm">
                                    <i class="fas fa-edit"></i>
                                 </button>
                                 <button class="btn btn-icon btn-delete btn-sm">
                                    <i class="fas fa-trash-can"></i>
                                 </button>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
         @endsection