@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-black-800">Capaian Kinerja Pegawai Target</h1>
</div>

<!-- Content Row -->

   <form action="/ckp/ckpt/{{ $ckpt->id }}" method="POST">
      @csrf
      @method('put')

      <div class="row mb-8">
         <div class="col-sm-12">
         <div class="form-group d-flex align-items-center">
               <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
               <input type="nama" class="form-control col-sm-11" id="nama" placeholder="Lorem Ipsum" name="nama" value="{{ $ckpt->nama }}">
            </div>
            <div class="form-group d-flex align-items-center">
               <label for="nip" class="col-sm-1 pl-0 col-form-label">NIP</label>
               <input type="nip" class="form-control col-sm-11" id="nip" placeholder="2023" name="nip" value="{{ $ckpt->nip }}">
            </div>
            <div class="form-group d-flex align-items-center">
               <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
               <input type="tahun" class="form-control col-sm-11" id="tahun" placeholder="5 Januari - 23 Desember" name="tahun" value="{{ $ckpt->tahun }}">
            </div>
            <div class="form-group d-flex align-items-center">
               <label for="bulan" class="col-sm-1 pl-0 col-form-label">Bulan</label>
               <input type="bulan" class="form-control col-sm-11" id="bulan" placeholder="Pusat" name="bulan" value="{{ $ckpt->bulan }}">
            </div>
         </div>
      </div>

      <div class="row mb-8">
         <div class="col-sm-12">
            <div class="form-group">
               <label for="nomor">No</label>
                  <input type="nomor" class="form-control" id="nomor" placeholder="Lorem Ipsum Dolor Sit Amet" name="no" value="{{ $ckpt->no }}">
            </div>
            <div class="form-group">
               <label for="fungsi">Fungsi</label>
                  <input type="fungsi" class="form-control" id="fungsi" placeholder="Lorem Ipsum Dolor Sit Amet" name="fungsi" value="{{ $ckpt->fungsi }}">
            </div>
            <div class="form-group">
               <label for="periode">Periode</label>
                  <input type="periode" class="form-control" id="periode" placeholder="Lorem Ipsum Dolor Sit Amet" name="periode" value="{{ $ckpt->periode }}">
            </div>
            <div class="form-group">
               <label for="kegiatan">Uraian Kegiatan</label>
                  <input type="kegiatan" class="form-control" id="kegiatan" placeholder="Lorem Ipsum Dolor Sit Amet" name="uraian_kegiatan" value="{{ $ckpt->uraian_kegiatan }}">
            </div>
            <div class="form-group">
               <label for="satuan">Satuan</label>
                  <input type="satuan" class="form-control" id="satuan" placeholder="Lorem Ipsum Dolor Sit Amet" name="satuan" value="{{ $ckpt->satuan }}">
            </div>
            <div class="form-group">
               <label for="target">Target</label>
                  <input type="target" class="form-control" id="target" placeholder="Lorem Ipsum Dolor Sit Amet" name="target" value="{{ $ckpt->satuan }}">
            </div>
            <div class="form-group">
               <label for="kodebutir">Kode Butir</label>
                  <input type="kodebutir" class="form-control" id="kodebutir" placeholder="Lorem Ipsum Dolor Sit Amet" name="kode_butir" value="{{ $ckpt->kode_butir }}">
            </div>
            <div class="form-group">
               <label for="angkakredit">Angka Kredit</label>
                  <input type="angkakredit" class="form-control" id="angkakredit" placeholder="Lorem Ipsum Dolor Sit Amet" name="angka_kredit" value="{{ $ckpt->angka_kredit }}">
            </div>
            <div class="form-group">
               <label for="kode">Kode</label>
                  <input type="kode" class="form-control" id="kode" placeholder="Lorem Ipsum Dolor Sit Amet" name="kode" value="{{ $ckpt->kode }}">
            </div>
            <div class="form-group">
               <label for="keterangan">Keterangan</label>
                  <input type="keterangan" class="form-control" id="keterangan" placeholder="Lorem Ipsum Dolor Sit Amet" name="keterangan" value="{{ $ckpt->keterangan }}">
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