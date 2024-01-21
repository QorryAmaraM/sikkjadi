@extends('layouts.kepalabu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Capaian Kinerja Karyawan Realisasi</h1>
        </div>

        <!-- Content Row -->

        <form action="/kepalabu-ckp/ckpr/{{ $ckpr->id }}" method="POST">\
         @csrf
         @method('put')

         <div class="row mb-8">
            <div class="col-sm-7">
               <div class="form-group d-flex align-items-center">
                  <label for="nama" class="col-sm-2 pl-0 col-form-label">Nama</label>
                  @foreach ($user as $users)
                      @if ($users->id == $userid)
                          <input type="nama" class="form-control col-sm-11" id="nama"
                              placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                          <input type="hidden" name="user_id" value="{{ $userid }}">
                          <input type="hidden" name="nama" value="{{ $users->nama }}">
                      @endif
                  @endforeach
              </div>
              <div class="form-group d-flex align-items-center">
                  <label for="nip" class="col-sm-2 pl-0 col-form-label">NIP</label>
                  @foreach ($user as $users)
                      @if ($users->id == $userid)
                          <input type="nama" class="form-control col-sm-11" id="nama"
                              placeholder="Lorem Ipsum" name="nip" value="{{ $users->nip }}" disabled>
                          <input type="hidden" name="nip" value="{{ $users->nip }}">
                      @endif
                  @endforeach
              </div>
               <div class="form-group d-flex align-items-center">
                  <label for="tahun" class="col-sm-2 pl-0 col-form-label">Tahun</label>
                  <input type="tahun" class="form-control col-sm-10" id="tahun" placeholder="Pembina Tingkat" name="tahun" value="{{ $ckpr->tahun }}">
               </div>
               <div class="form-group d-flex align-items-center">
                  <label for="bulan" class="col-sm-2 pl-0 col-form-label">Bulan</label>
                  <input type="bulan" class="form-control col-sm-10" id="bulan" placeholder="Kepala" name="bulan" value="{{ $ckpr->bulan }}">
               </div>
            </div>
         </div>

         <div class="row mb-8">
            <div class="col-sm-12">
               <div class="form-group">
                  <label for="nomor">No</label>
                     <input type="nomor" class="form-control" id="nomor" placeholder="Lorem Ipsum Dolor Sit Amet" name="no" value="{{ $ckpr->no }}">
               </div>
               <div class="form-group">
                  <label for="fungsi">Fungsi</label>
                     <input type="fungsi" class="form-control" id="fungsi" placeholder="Lorem Ipsum Dolor Sit Amet" name="fungsi" value="{{ $ckpr->fungsi }}">
               </div>
               <div class="form-group">
                  <label for="periode">Periode</label>
                     <input type="periode" class="form-control" id="periode" placeholder="Lorem Ipsum Dolor Sit Amet" name="periode" value="{{ $ckpr->periode }}">
               </div>
               <div class="form-group">
                  <label for="kegiatan">Uraian Kegiatan</label>
                     <input type="kegiatan" class="form-control" id="kegiatan" placeholder="Lorem Ipsum Dolor Sit Amet" name="uraian_kegiatan" value="{{ $ckpr->uraian_kegiatan }}">
               </div>
               <div class="form-group">
                  <label for="satuan">Satuan</label>
                     <input type="satuan" class="form-control" id="satuan" placeholder="Lorem Ipsum Dolor Sit Amet" name="satuan" value="{{ $ckpr->satuan }}">
               </div>
               <div class="form-group">
                  <label for="target">Target</label>
                     <input type="target" class="form-control" id="target" placeholder="Lorem Ipsum Dolor Sit Amet" name="target" value="{{ $ckpr->target }}">
               </div>
               <div class="form-group">
                  <label for="targetrev">Target Rev</label>
                     <input type="targetrev" class="form-control" id="targetrev" placeholder="Lorem Ipsum Dolor Sit Amet" name="target_rev" value="{{ $ckpr->target_rev }}">
               </div>
               <div class="form-group">
                  <label for="realisasi">Realisasi</label>
                     <input type="realisasi" class="form-control" id="realisasi" placeholder="Lorem Ipsum Dolor Sit Amet" name="realisasi" value="{{ $ckpr->realisasi }}">
               </div>
               <div class="form-group">
                  <label for="persen">Persen (%)</label>
                     <input type="persen" class="form-control" id="persen" placeholder="Lorem Ipsum Dolor Sit Amet" name="persen" value="{{ $ckpr->persen }}">
               </div>
               <div class="form-group">
                  <label for="nilai">Nilai</label>
                     <input type="nilai" class="form-control" id="nilai" placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai" value="{{ $ckpr->nilai }}">
               </div>
               <div class="form-group">
                  <label for="kodebutir">Kode Butir</label>
                     <input type="kodebutir" class="form-control" id="kodebutir" placeholder="Lorem Ipsum Dolor Sit Amet" name="kode_butir" value="{{ $ckpr->kode_butir }}">
               </div>
               <div class="form-group">
                  <label for="angkakredit">Angka Kredit</label>
                     <input type="angkakredit" class="form-control" id="angkakredit" placeholder="Lorem Ipsum Dolor Sit Amet" name="angka_kredit" value="{{ $ckpr->angka_kredit }}">
               </div>
               <div class="form-group">
                  <label for="kode">Kode</label>
                     <input type="kode" class="form-control" id="kode" placeholder="Lorem Ipsum Dolor Sit Amet" name="kode" value="{{ $ckpr->kode }}">
               </div>
               <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                     <input type="keterangan" class="form-control" id="keterangan" placeholder="Lorem Ipsum Dolor Sit Amet" name="keterangan" value="{{ $ckpr->keterangan }}">
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-sm-12 mt-3 text-right">
                                      
               <button type="submit" name="submit" value="Save" class="btn save-button">Simpan</button>
            </div>
         </div>

        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
