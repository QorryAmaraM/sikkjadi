@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">List Uraian Kegiatan</h1>
        </div>

        <!-- Content Row -->
        <form action="/admin-masterutaiankegiatan/uraiankegiatan/store" method="POST">
            @csrf
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nomor">No</label>
                        <input type="nomor" class="form-control" id="nomor" placeholder="Lorem Ipsum Dolor Sit Amet" name="no">
                    </div>
                    <div class="form-group">
                        <label for="pembuat">Pembuat</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="pembuat" class="form-control col-sm-11" id="pembuat"
                                    placeholder="Lorem Ipsum" name="pembuat" value="{{ $users->nama }}" disabled>
                                <input type="hidden" name="user_id" value="{{ $userid }}">
                                <input type="hidden" name="pembuat" value="{{ $users->nama }}">
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="fungsi">Fungsi</label>
                        <input type="fungsi" class="form-control" id="fungsi" placeholder="Lorem Ipsum Dolor Sit Amet" name="fungsi">
                    </div>
                    <div class="form-group">
                        <label for="kegiatan">Uraian Kegiatan</label>
                        <input type="kegiatan" class="form-control" id="kegiatan" placeholder="Lorem Ipsum Dolor Sit Amet" name="uraian_kegiatan">
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
