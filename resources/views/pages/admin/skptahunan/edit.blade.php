@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Perencanaan Kinerja Tahunan</h1>
        </div>

        <form>
            <div class="row mb-8 mt-3">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $data->tahun }}">
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="text" class="form-control" id="periode" name="periode" value="{{ $data->periode }}">
                    </div>
                    <!-- Isi formulir dengan data yang sudah ada -->
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <input type="text" class="form-control" id="wilayah" name="wilayah" value="{{ $data->wilayah }}">
                    </div>
                    <div class="form-group">
                        <label for="unitkerja">Unit Kerja</label>
                        <input type="text" class="form-control" id="unitkerja" name="unitkerja" value="{{ $data->unitkerja }}">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $data->jabatan }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $data->status }}">
                    </div>
                </div>
            </div>   
            
            <div class="row">
                <div class="col-sm-12 mt-3 text-right">
                    <button type="button" class="btn hapus-button mr-2">Hapus</button>
                    <button type="submit" class="btn save-button">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection
