      @extends('layouts.admin')

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
                  <button type="button" class="btn salin-button mr-2">Salin Rencana Kinerja</button>
                  <a href="/perencanaanlerja/penilaianskp/addnilai" type="button" class="btn add-button">+ Tambah</a>
               </div>
            </div>

            <div class="row">
               <div class="col-sm-12" style="margin-top: -25px">
                  <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                           <tr>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Jenis</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Rencana Kinerja Atasan</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Rencana Kinerja</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Aspek</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">IKI</th>
                              <th colspan="2" style="padding:0.2rem; border-bottom: none">Target</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Satuan</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Realisasi</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kondisi</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Capaian IKI</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kategori Capaian IKI</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Nilai Capaian Rencana</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kategori Capaian Rencana</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Nilai Tertimbang</th>
                              <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Aksi</th>
                           </tr>
                           <tr>
                              <th style="border-top: none">Min</th>
                              <th style="border-top: none">Max</th>
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
                        <tbody>
                           <tr>
                              <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">Nilai Kerja Utama</td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5; color: #000; font-weight: bold;"></td>
                           </tr>
                        </tbody>
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
                        <tbody>
                           <tr>
                              <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">Nilai Kerja Tambahan</td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5; color: #000; font-weight: bold;"></td>
                           </tr>
                           <tr>
                              <td style="background-color: #9ba4b5; color: #000; font-weight: bold;">Nilai SKP</td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5"></td>
                              <td style="background-color: #9ba4b5; color: #000; font-weight: bold;"></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
      @endsection
