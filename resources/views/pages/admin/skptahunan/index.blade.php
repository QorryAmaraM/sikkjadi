@extends('layouts.admin')

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
            <a href="{{ url('/admin-perencanaankerja/spktahunan/create') }}" type="button" class="btn add-button">+ Tambah</a>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-12">
            <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>Tahun</th>
                        <th>Periode</th>
                        <th>Wilayah</th>
                        <th>Unit Kerja</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>

                  <tbody>
                     @foreach ($skptahunan as $skp)
                        <tr>
                           <td>{{ $skp->tahun }}</td>
                           <td>{{ $skp->periode }}</td>
                           <td>{{ $skp->wilayah }}</td>
                           <td>{{ $skp->unit_kerja }}</td>
                           <td>{{ $skp->jabatan }}</td>
                           <td>{{ $skp->status }}</td>
                           <td>
                              <button class="btn btn-icon btn-edit btn-sm">
                                 <a href="/admin-perencanaankerja/spktahunan/{{ $skp->id }}/edit" class="action-link"><i class="fas fa-edit"></i>
                              </button>
                              <form action="/admin-perencanaankerja/spktahunan/{{ $skp->id }}" method="POST" class="delete-form">
                                 @csrf
                                 @method('delete')
                                 <button class="btn btn-icon btn-delete btn-sm"><i class="fas fa-trash-can"></i></button>
                              </form>
                           </td>                                                             
                        </tr>
                         
                     @endforeach
                  </tbody>

               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
@endsection
