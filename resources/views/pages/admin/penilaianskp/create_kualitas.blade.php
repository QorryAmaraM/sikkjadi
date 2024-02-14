@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Penilaian SKP</h1>
        </div>

        <!-- Content Row -->

        <form action="/admin-perencanaankerja/penilaianskp/store" method="POST">
            @csrf
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Penilai</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                                <input type="hidden" name="penilai_user_id" value="{{ $userid }}">
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                        @foreach ($result as $nama)
                            @if ($nama->id == $rencanakinerja_id)
                                @foreach ($user as $users)
                                    @if ($users->id == $nama->user_id)
                                        <input type="nama" class="form-control col-sm-11" id="nama"
                                            placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                                        <input type="hidden" name="rencanakinerja_id" value="{{ $rencanakinerja_id }}">
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nip</label>
                        @foreach ($result as $nip)
                            @if ($nip->id == $rencanakinerja_id)
                                @foreach ($user as $users)
                                    @if ($users->id == $nip->user_id)
                                        <input type="nama" class="form-control col-sm-11" id="nama"
                                            placeholder="Lorem Ipsum" name="nama" value="{{ $users->nip }}" disabled>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Golongan</label>
                        @foreach ($result as $golongan)
                            @if ($golongan->id == $rencanakinerja_id)
                                @foreach ($user as $users)
                                    @if ($users->id == $golongan->user_id)
                                        <input type="nama" class="form-control col-sm-11" id="nama" name="nama"
                                            value="{{ $users->golongan }}" disabled>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Fungsional</label>
                        @foreach ($result as $fungsional)
                            @if ($fungsional->id == $rencanakinerja_id)
                                @foreach ($user as $users)
                                    @if ($users->id == $fungsional->user_id)
                                        <input type="nama" class="form-control col-sm-11" id="nama" name="nama"
                                            value="{{ $users->fungsional }}" disabled>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                        @foreach ($result as $unitkerja)
                            @if ($unitkerja->id == $rencanakinerja_id)
                                <input type="nama" class="form-control col-sm-11" id="nama" name="nama"
                                    value="{{ $unitkerja->unit_kerja }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Kinerja</label>
                        @foreach ($result as $kinerja)
                            @if ($kinerja->id == $rencanakinerja_id)
                                <input type="nama" class="form-control col-sm-11" id="nama" name="nama"
                                    value="{{ $kinerja->kinerja }}" disabled>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="realisasi">Aspek</label>
                        <input type="realisasi" class="form-control" value="Kualitas" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control" data-width="75%" data-live-search="true" id="kualitas_kondisi" name="kualitas_kondisi">
                            <option value="">Pilih Kondisi</option>
                            <option value="normal">Normal</option>
                            <option value="khusus">Khusus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="realisasi">Realisasi</label>
                        <input type="text" class="form-control" id="kualitas_realisasi" name="kualitas_realisasi" placeholder="Masukkan Angka" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-3 text-right">
                    <button type="submit" name="submit" value="Save" class="btn save-button" data-toggle="modal" data-target="#successModal">Simpan</button>
                </div>
            </div>

            <div
                class="modal fade"
                id="successModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="successModalLabel"
                aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="successModalLabel">Nilai berhasil dimasukkan!
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <div class="modal-body">
                            Anda akan diarahkan ke halaman selanjutnya.
                        </div>
                        </div>
                    </div>
            </div>

        </form>

    </div>

    <script>
        $(function () {
                                            $('#successModal').on('show.bs.modal', function () {
                                                var successModal = $(this);
                                                clearTimeout(successModal.data('hideInterval'));
                                                successModal.data('hideInterval', setTimeout(function () {
                                                    successModal.modal('hide');
                                                }, 5000));
                                            });
                                        });
    </script>
    <!-- /.container-fluid -->
@endsection
