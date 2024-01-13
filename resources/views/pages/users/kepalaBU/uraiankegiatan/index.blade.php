      @extends('layouts.kepalaBU')

      @section('content')
         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-black-800">List Uraian Kegiatan</h1>
            </div>

            <!-- Content Row -->

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
               </div>
            </div>

            <div class="row">
               <div class="col-sm-12">
                  <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Pembuat</th>
                              <th>Fungsi</th>
                              <th>Uraian Kegiatan</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
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
