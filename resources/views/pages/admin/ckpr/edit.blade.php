@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Capaian Kinerja Karyawan Realisasi</h1>
        </div>

        <!-- Content Row -->

        <form action="/admin-ckp/ckpr/{{ $ckpr->id }}" method="POST">
            @csrf
            @method('put')

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                        @foreach ($result as $result)
                            @foreach ($user as $users)
                                @if ($users->id == $result->user_id)
                                    <input type="nama" class="form-control col-sm-11" id="nama"
                                        placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nip" class="col-sm-1 pl-0 col-form-label">NIP</label>
                        @foreach ($user as $users)
                            @if ($users->id == $result->user_id)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nip" value="{{ $users->nip }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <input type="tahun" class="form-control col-sm-11" id="tahun" value="{{ $result->tahun }}"
                            name="tahun">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="bulan" class="col-sm-1 pl-0 col-form-label">Bulan</label>
                        <input type="bulan" class="form-control col-sm-11" id="bulan" value="{{ $result->bulan }}"
                            name="bulan">
                    </div>
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="kegiatan">Uraian Kegiatan</label>
                        <select class="form-control" data-width="75%" name="uraian_kegiatan_id">
                            <option value="{{ $result->Uraian_kegiatan_id }}">{{ $result->uraian_kegiatan }}</option>
                            @foreach ($uraiankegiatan as $uraiankegiatan)
                                <option value="{{ $uraiankegiatan->id }}">{{ $uraiankegiatan->uraian_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kodebutir">Kode Butir</label>
                        <select class="form-control" data-width="75%" name="angka_kredit_id">
                            <option value="{{ $result->Angka_kredit_id }}">{{ $result->angka_kredit }}</option>
                            @foreach ($angkakredit as $angkakredit)
                                <option value="{{ $angkakredit->id }}">{{ $angkakredit->kode_butir }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <select class="form-control" data-width="75%" id="kode" name="kode">
                            <option value="{{ $result->kode }}">{{ $result->kode }}</option>
                            <option value="utama">Utama</option>
                            <option value="tambahan">Tambahan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="periode" class="form-control" id="periode" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="periode" value="{{ $ckpr->periode }}">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="satuan" class="form-control" id="satuan" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="satuan" value="{{ $ckpr->satuan }}">
                    </div>
                    <div class="form-group">
                        <label for="target">Target</label>
                        <input type="target" class="form-control" id="target" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="target" value="{{ $ckpr->target }}">
                    </div>
                    <div class="form-group">
                        <label for="targetrev">Target Rev</label>
                        <input type="targetrev" class="form-control" id="targetrev"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="target_rev" value="{{ $ckpr->target_rev }}">
                    </div>
                    <div class="form-group">
                        <label for="realisasi">Realisasi</label>
                        <input type="realisasi" class="form-control" id="realisasi"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="realisasi" value="{{ $ckpr->realisasi }}">
                    </div>
                    <div class="form-group">
                        <label for="persen">Persen (%)</label>
                        <input type="persen" class="form-control" id="persen"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="persen" value="{{ $ckpr->persen }}">
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="nilai" class="form-control" id="nilai"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="nilai" value="{{ $ckpr->nilai }}">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="keterangan" class="form-control" id="keterangan"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="keterangan" value="{{ $ckpr->keterangan }}">
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
