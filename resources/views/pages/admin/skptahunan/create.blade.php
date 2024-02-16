@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->

    <div class = "container-fluid">

        <!-- Page Heading -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Perencanaan Kinerja Tahunan</h1>
        </div>

        <!-- Content Row -->

        <form action="/admin-perencanaankerja/spktahunan/store" method="POST">
            @csrf

            <div class="row mb-8">
                <div class="col-sm-6">
                    <div class="form-group d-flex align-items-center">
                        <label for="searchSelect" class="mb-0 mr-4">Pegawai</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}"
                                    disabled="disabled">
                                <input type="hidden" name="user_id" value="{{ $userid }}">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row mb-8 mt-3">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun"
                            placeholder="Masukkan Angka"
                            onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="periode" class="form-control" id="periode" placeholder="Periode" name="periode">
                    </div>
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <input type="wilayah" class="form-control" id="wilayah" placeholder="Wilayah" name="wilayah">
                    </div>
                    <div class="form-group">
                        <label for="unitkerja">Unit Kerja</label>
                        <input type="unitkerja" class="form-control" id="unitkerja" placeholder="Unit Kerja"
                            name="unit_kerja">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan">
                    </div>
                </div>
                <div class="col-12 mt-3 text-right">

                    <button type="submit" name="submit" value="Save" class="btn save-button" data-toggle="modal"
                        data-target="#successModal">Simpan</button>
                </div>
            </div>


        </form>

    </div>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Data Berhasil Ditambah!</h5>
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

    <script>
        $(function() {
            $('#successModal').on('show.bs.modal', function() {
                var successModal = $(this);
                clearTimeout(successModal.data('hideInterval'));
                successModal.data('hideInterval', setTimeout(function() {
                    successModal.modal('hide');
                }, 5000));
            });
        });
    </script>
    <!-- /.container-fluid -->
@endsection
