@extends('layouts.staf')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-black-800">Capaian Kinerja Pegawai Target</h1>
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
         <a href="/ckp/ckpt/create" type="button" class="btn add-button">+ Tambah</a>
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
                    <th></th>
                     <th>Nama</th>
                     <th>tahun</th>
                     <th>bulan</th>
                     <th></th>
                     
                  </tr>
               </thead>
               <tbody>
                  @foreach ($ckpt as $ckpt)
                  <tr>
                     <td></td>
                     <td>{{ $ckpt->nama }}</td>
                     <td>{{ $ckpt->tahun }}</td>
                     <td>{{ $ckpt->bulan }}</td>
                     <td>
                        <button class="btn btn-icon btn-edit btn-sm">
                           <a href="/ckp/ckpt/{{ $ckpt->nama }}/index" class="action-link"><i class="fas fa-edit"></i>
                        </button>
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