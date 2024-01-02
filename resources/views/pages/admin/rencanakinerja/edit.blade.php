@extends('layouts.admin')

@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-black-800">Rencana Kinerja</h1>
      </div>

      <!-- Content Row -->

      <form action="/perencanaankerja/rencanakinerja/{{ $rencanakinerja->id }}" method="POST">
         @csrf
         @method('put')

         <div class="row mb-8">
            <div class="col-sm-12">
               <div class="form-group d-flex align-items-center">
                  <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                  <input type="nama" class="form-control col-sm-11" id="nama" placeholder="Lorem Ipsum" name="nama" value="{{ $rencanakinerja->nama }}">
               </div>
               <div class="form-group d-flex align-items-center">
                  <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                  <input type="tahun" class="form-control col-sm-11" id="tahun" placeholder="2023" name="tahun" value="{{ $rencanakinerja->tahun }}">
               </div>
               <div class="form-group d-flex align-items-center">
                  <label for="periode" class="col-sm-1 pl-0 col-form-label">Periode</label>
                  <input type="periode" class="form-control col-sm-11" id="periode" placeholder="5 Januari - 23 Desember" name="periode" value="{{ $rencanakinerja->periode }}">
               </div>
               <div class="form-group d-flex align-items-center">
                  <label for="wilayah" class="col-sm-1 pl-0 col-form-label">Wilayah</label>
                  <input type="wilayah" class="form-control col-sm-11" id="wilayah" placeholder="Pusat" name="wilayah" value="{{ $rencanakinerja->wilayah }}">
               </div>
               <div class="form-group d-flex align-items-center">
                  <label for="unitkerja" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                  <input type="unitkerja" class="form-control col-sm-11" id="unitkerja" placeholder="Pusat Pendidikan dan Pelatihan" name="unit_kerja" value="{{ $rencanakinerja->unit_kerja }}">
               </div>
               <div class="form-group d-flex align-items-center">
                  <label for="kinerja" class="col-sm-1 pl-0 col-form-label">Kinerja</label>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="checkbox" id="kjutama" value="0" name="kinerja">
                     <label class="form-check-label" for="inlineCheckbox1">Utama</label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="checkbox" id="kjtambahan" value="1" name="kinerja">
                     <label class="form-check-label" for="inlineCheckbox2">Tambahan</label>
                  </div>
               </div>
            </div>
         </div>
         
         <div class="row mb-8">
            <div class="col-sm-12">
               <div class="form-group">
                  <label for="jenisrk">Jenis</label>
                     <input type="jenisrk" class="form-control" id="jenisrk" placeholder="Lorem Ipsum Dolor Sit Amet" name="jenis" value="{{ $rencanakinerja->jenis }}">
               </div>
               <div class="form-group">
                  <label for="rkatasan">Rencana Kinerja Atasan</label>
                     <input type="rkatasan" class="form-control" id="rkatasan" placeholder="Lorem Ipsum Dolor Sit Amet" name="rencana_kinerja_atasan" value="{{ $rencanakinerja->rencana_kinerja_atasan }}">
               </div>
               <div class="form-group">
                  <label for="rkpegawai">Rencana Kinerja</label>
                     <input type="rkpegawai" class="form-control" id="rkpegawai" placeholder="Lorem Ipsum Dolor Sit Amet" name="rencana_kinerja" value="{{ $rencanakinerja->rencana_kinerja }}">
               </div>
               <div class="form-group">
                  <label for="aspek">Aspek</label>
                     <input type="aspek" class="form-control" id="aspek" placeholder="Lorem Ipsum Dolor Sit Amet" name="aspek" value="{{ $rencanakinerja->aspek }}">
               </div>
               <div class="form-group">
                  <label for="iki">IKI</label>
                     <input type="iki" class="form-control" id="iki" placeholder="Lorem Ipsum Dolor Sit Amet" name="iki" value="{{ $rencanakinerja->iki }}">
               </div>
               <div class="form-group">
                  <label for="targetmin">Target Min</label>
                     <input type="targetmin" class="form-control" id="targetmin" placeholder="Lorem Ipsum Dolor Sit Amet" name="target_min" value="{{ $rencanakinerja->target_min }}">
               </div>
               <div class="form-group">
                  <label for="targetmix">Target Max</label>
                     <input type="targetmix" class="form-control" id="targetmix" placeholder="Lorem Ipsum Dolor Sit Amet" name="target_max" value="{{ $rencanakinerja->target_max }}">
               </div>
               <div class="form-group">
                  <label for="satuan">Satuan</label>
                     <input type="satuan" class="form-control" id="satuan" placeholder="Lorem Ipsum Dolor Sit Amet" name="satuan" value="{{ $rencanakinerja->satuan }}">
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-sm-12 mt-3 text-right">
               <button type="button" class="btn hapus-button mr-2">Hapus</button>                       
               <button type="submit" name="submit" value="Save" class="btn save-button">Simpan</button>
            </div>
         </div>

         
      </form>

      
   </div>
   <!-- /.container-fluid -->
@endsection
