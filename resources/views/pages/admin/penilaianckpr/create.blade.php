@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Penilaian Capaian Kinerja Karyawan Realisasi</h1>
        </div>

        <!-- Content Row -->

        <form action="/ckp/penilaianckpr/store" method="POST">
            @csrf
            <div class="row mb-8">
                <div class="col-sm-7">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-2 pl-0 col-form-label">Pegawai</label>
                        <input type="nama" class="form-control col-sm-10" id="nama" placeholder="Lorem Ipsum" name="pegawai">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tahun" class="col-sm-2 pl-0 col-form-label">Tahun</label>
                        <input type="tahun" class="form-control col-sm-10" id="tahun" placeholder="Pembina Tingkat" name="tahun">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="bulan" class="col-sm-2 pl-0 col-form-label">Bulan</label>
                        <input type="bulan" class="form-control col-sm-10" id="bulan" placeholder="Kepala" name="bulan">
                    </div>
                </div>
            </div>

            <div class="row mb-8">
               <div class="col-sm-12">
                   <div class="form-group">
                       <label for="nomor">No</label>
                       <input type="nomor" class="form-control" id="nomor" placeholder="Lorem Ipsum Dolor Sit Amet" name="no">
                   </div>
                   <div class="form-group">
                       <label for="fungsi">Fungsi</label>
                       <input type="fungsi" class="form-control" id="fungsi" placeholder="Lorem Ipsum Dolor Sit Amet" name="fungsi">
                   </div>
                   <div class="form-group">
                       <label for="periode">Periode</label>
                       <input type="periode" class="form-control" id="periode" placeholder="Lorem Ipsum Dolor Sit Amet" name="periode">
                   </div>
                   <div class="form-group">
                       <label for="kegiatan">Uraian Kegiatan</label>
                       <input type="kegiatan" class="form-control" id="kegiatan" placeholder="Lorem Ipsum Dolor Sit Amet" name="uraian_kegiatan">
                   </div>
                   <div class="form-group">
                       <label for="satuan">Satuan</label>
                       <input type="satuan" class="form-control" id="satuan" placeholder="Lorem Ipsum Dolor Sit Amet" name="satuan">
                   </div>
                   <div class="form-group">
                       <label for="target">Target</label>
                       <input type="target" class="form-control" id="target" placeholder="Lorem Ipsum Dolor Sit Amet" name="target">
                   </div>
                   <div class="form-group">
                       <label for="targetrev">Target Rev</label>
                       <input type="targetrev" class="form-control" id="targetrev" placeholder="Lorem Ipsum Dolor Sit Amet" name="target_rev">
                   </div>
                   <div class="form-group">
                       <label for="realisasi">Realisasi</label>
                       <input type="realisasi" class="form-control" id="realisasi" placeholder="Lorem Ipsum Dolor Sit Amet" name="realisasi">
                   </div>
                   <div class="form-group">
                       <label for="persen">Persen (%)</label>
                       <input type="persen" class="form-control" id="persen" placeholder="Lorem Ipsum Dolor Sit Amet" name="persen">
                   </div>
                   <div class="form-group">
                       <label for="nilai">Nilai</label>
                       <input type="nilai" class="form-control" id="nilai" placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai">
                   </div>
                   <div class="form-group">
                       <label for="kodebutir">Kode Butir</label>
                       <input type="kodebutir" class="form-control" id="kodebutir" placeholder="Lorem Ipsum Dolor Sit Amet" name="kode_butir">
                   </div>
                   <div class="form-group">
                       <label for="angkakredit">Angka Kredit</label>
                       <input type="angkakredit" class="form-control" id="angkakredit" placeholder="Lorem Ipsum Dolor Sit Amet" name="angka_kredit">
                   </div>
                   <div class="form-group">
                       <label for="kode">Kode</label>
                       <input type="kode" class="form-control" id="kode" placeholder="Lorem Ipsum Dolor Sit Amet" name="kode">
                   </div>
                   <div class="form-group">
                       <label for="ketstaf">Keterangan Staf</label>
                       <input type="ketstaf" class="form-control" id="ketstaf" placeholder="Lorem Ipsum Dolor Sit Amet" name="keterangan_staff">
                   </div>
                   <div class="form-group">
                       <label for="ketpenilai">Keterangan Penilai</label>
                       <input type="ketpenilai" class="form-control" id="ketpenilai" placeholder="Lorem Ipsum Dolor Sit Amet" name="keterangan_penilai">
                   </div>
                   <div class="form-group">
                       <label for="penilai">Penilai</label>
                       <input type="penilai" class="form-control" id="penilai" placeholder="Lorem Ipsum Dolor Sit Amet" name="penilai">
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
