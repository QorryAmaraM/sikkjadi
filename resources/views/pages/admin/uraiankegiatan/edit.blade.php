@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">List Uraian Kegiatan</h1>
        </div>

        <!-- Content Row -->

        <form action="/admin-masterutaiankegiatan/uraiankegiatan/{{ $uraiankegiatan->id }}" method="POST">
            @csrf
            @method('put')
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="pembuat">Pembuat</label>
                        @foreach ($user as $users)
                            @if ($users->id == $uraiankegiatan->user_id)
                                <input type="pembuat" class="form-control col-sm-11" value="{{ $users->nama }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="fungsi">Fungsi</label>
                        <select class="form-control" data-width="75%" id="fungsi" name="fungsi">
                            <option value="{{ $uraiankegiatan->fungsi }}">{{ $uraiankegiatan->fungsi }}</option>
                            <option value="IPDS">IPDS</option>
                            <option value="Sosial">Sosial</option>
                            <option value="Umum">Umum</option>
                            <option value="Distribusi">Distribusi</option>
                            <option value="Produksi">Produksi</option>
                            <option value="Nerwilis">Nerwilis</option>                         
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="kegiatan">Uraian Kegiatan</label>
                        <input type="kegiatan" class="form-control" id="kegiatan" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="uraian_kegiatan" value="{{ $uraiankegiatan->uraian_kegiatan }}">
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
