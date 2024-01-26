@extends('layouts.admin')

@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-black-800">Entri Angka Kredit</h1>
      </div>

      <!-- Content Row -->
      <form action="/admin-masterangkakredit/listangkakredit/{{ $angkakredit->id }}"  method="POST">
         @csrf
         @method('put')
         <div class="row mb-8">
            <div class="col-sm-12"> 
               <div class="form-group d-flex align-items-center">
                  <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Jenis Fungsional</label>
                  <select class="selectpicker flex-grow-1" data-width="75%" name="jenis_fungsional">
                     <option value="{{ $angkakredit->jenis_fungsional }}">{{ $angkakredit->jenis_fungsional }}</option>
                     <option value="Semua Jenjang">Semua Jenjang</option>
                     <option value="Admininstrator">Admininstrator</option>
                     <option value="Pengawas">Pengawas</option>
                     <option value="Fungsional Umum">Fungsional Umum</option>
                     <option value="Fungsional Penatalaksana Barang">Fungsional Penatalaksana Barang</option>
                     <option value="Statistisi Pelaksana Lanjutan">Statistisi Pelaksana Lanjutan</option>
                     <option value="Statistisi Pertama">Statistisi Pertama</option>
                     <option value="Statistisi Penyelia">Statistisi Penyelia</option>
                     <option value="Statistisi Muda">Statistisi Muda</option>
                     <option value="Statistisi Madya">Statistisi Madya</option>
                     <option value="Statistisi Utama">Statistisi Utama</option>
                     <option value="Parkom Pertama">Parkom Pertama</option>
                     <option value="Parkom Muda">Parkom Muda</option>
                     <option value="Penata Keuangan Pertama">Penata Keuangan Pertama</option>
                     <option value="Penata Keuangan Penyelia Muda">Penata Keuangan Penyelia Muda</option>
                     <option value="Pranata Keuangan">Pranata Keuangan</option>
                     <option value="Analisis Pengelola Keuangan">Analisis Pengelola Keuangan</option>                         
                  </select>
                  <input type="hidden" name="user_id" value="{{ $userid }}">
               </div>
               <div class="form-group d-flex align-items-center">
                     <label for="kodebutir" class="col-sm-2 pl-0 col-form-label">Kode Butir</label>
                     <input type="kodebutir" class="form-control col-sm-10" name="kode_butir" value="{{ $angkakredit->kode_butir }}">
                  </div>
                  <div class="form-group d-flex align-items-center">
                     <label for="isibutir" class="col-sm-2 pl-0 col-form-label">Isi Butir</label>
                     <input type="isibutir" class="form-control col-sm-10" name="isi_butir" value="{{ $angkakredit->isi_butir }}">
                  </div>
                  <div class="form-group d-flex align-items-center">
                     <label for="angkakredit" class="col-sm-2 pl-0 col-form-label">Angka Kredit</label>
                     <input type="angkakredit" class="form-control col-sm-10" name="angka_kredit" value="{{ $angkakredit->angka_kredit }}">
                  </div>
            </div>
         </div>

         <div class="row">
            <div class="col-sm-12 mt-3 text-right">
                <button type="submit" name="submit" value="Save" class="btn save-button">+ Tambah</button>
            </div>
        </div>
      </div>


      </form>

   <!-- /.container-fluid -->
@endsection
