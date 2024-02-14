@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Perencanaan Kinerja Tahunan</h1>
        </div>

        <!-- Content Row -->

        <form action="/admin-perencanaankerja/spktahunan/{{ $skptahunan->id }}" method="POST">
            @csrf
            @method('put')
            <div class="row mb-8">
                <div class="col-sm-6">
                    <div class="form-group d-flex align-items-center">

                        <label for="searchSelect" class="mb-0 mr-4">Pegawai</label>
                        <select class="selectpicker flex-grow-1" data-width="75%" data-live-search="true" id="searchSelect"
                            name="user_id">
                            @foreach ($user as $users)
                                @if ($users->id == $userid)
                                    <option value="{{ $user_id = $userid }}">{{ $users->nama }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>

            <div class="row mb-8 mt-3">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="tahun" class="form-control" id="tahun" placeholder="YYYY" name="tahun"
                            value="{{ $skptahunan->tahun }}">
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="periode" class="form-control" id="periode" placeholder="Periode" name="periode"
                            value="{{ $skptahunan->periode }}">
                    </div>
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <input type="wilayah" class="form-control" id="wilayah" placeholder="wilayah" name="wilayah"
                            value="{{ $skptahunan->wilayah }}">
                    </div>
                    <div class="form-group">
                        <label for="unitkerja">Unit Kerja</label>
                        <input type="unitkerja" class="form-control" id="unitkerja" placeholder="Unit Kerja"
                            name="unit_kerja" value="{{ $skptahunan->unit_kerja }}">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan"
                            value="{{ $skptahunan->jabatan }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="status" class="form-control" id="status" placeholder="Status" name="status"
                            value="{{ $skptahunan->status }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-3 text-right">

                    <button type="submit" name="submit" value="Save" class="btn save-button">Update</button>
                </div>
            </div>
        </form>

    </div>
    
    <!-- /.container-fluid -->
@endsection
