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
                        <label for="pembuat">Pembuat</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="pembuat" class="form-control col-sm-12" id="pembuat"
                                    placeholder="Lorem Ipsum" name="pembuat" value="{{ $users->nama }}" disabled>
                                <input type="hidden" name="user_id" value="{{ $userid }}">
                                <input type="hidden" name="pembuat" value="{{ $users->nama }}">
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="fungsi">Fungsi</label>
                        <select class="form-control col-sm-12" data-width="75%" id="fungsi" name="fungsi">
                            <option value="">Pilih Fungsi</option>
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
                        <input type="kegiatan" class="form-control col-sm-12" id="kegiatan" placeholder="Lorem Ipsum Dolor Sit Amet" name="uraian_kegiatan">
                    </div>
                </div>
            </div>

            <div class="row">
               <div class="col-sm-12 mt-3 text-right">                                         
                  <button type="submit" name="submit" value="Save" class="btn save-button" data-toggle="modal" data-target="#successModal">Simpan</button>
               </div>
            </div>

            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="successModalLabel">Data Berhasil Ditambah</h5>
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
            }, 3000));
        });
    });
</script>
    <!-- /.container-fluid -->
@endsection
