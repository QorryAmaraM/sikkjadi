@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Capaian Kinerja Pegawai Target</h1>
        </div>

        <!-- Content Row -->
        <form action="/admin-ckp/ckpt/{{ $ckpt->id }}" method="POST">
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
                        <select class="form-control col-sm-10" data-width="75%" data-live-search="true" id="tahun"
                            name="tahun">
                            <option value="{{ $result->tahun }}">{{ $result->tahun }}</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                        </select>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="bulan" class="col-sm-1 pl-0 col-form-label">Bulan</label>
                        <select class="form-control col-sm-10" data-width="75%" data-live-search="true" id="bulan"
                            name="bulan">
                            <option value="{{ $result->bulan }}">{{ $result->bulan }}</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="July">July</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
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
                        <label for="satuan">Satuan</label>
                        <input type="satuan" class="form-control" id="satuan" value="{{ $result->satuan }}"
                            name="satuan">
                    </div>
                    <div class="form-group">
                        <label for="target">Target Revisi</label>
                        <input type="target" class="form-control" id="target_rev" value="{{ $result->target_rev }}"
                            name="target_rev">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="target" value="{{ $result->target }}"
                            name="target">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="keterangan" class="form-control" id="keterangan" value="{{ $result->keterangan }}"
                            name="keterangan">
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
