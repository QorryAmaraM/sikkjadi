@extends('layouts.admin')

@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-black-800">List Uraian Kegiatan</h1>
      </div>

      <!-- Content Row --> 

      <div class="row">
         <div class="col-sm-6">
            <div class="inner-form">
               <div class="input-form">
                  <input id="search" type="text" placeholder="Pencarian"/>
                     <div class="input-form-append align-items-center">
                        <i class="fas fa-search"></i>
                     </div>
               </div>
            </div>
         </div>
         <div class="col-sm-6 d-flex justify-content-end align-items-center">
            <a href="/admin-masterutaiankegiatan/uraiankegiatan/create" type="button" class="btn add-button">+ Tambah</a>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-12">
            <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Pembuat</th>
                        <th>Fungsi</th>
                        <th>Uraian Kegiatan</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse ($uraiankegiatan as $kegiatan)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kegiatan->pembuat }}</td>
                        <td id="fungsi">{{ $kegiatan->fungsi }}</td>
                        <td>{{ $kegiatan->uraian_kegiatan }}</td>
                        <td>
                           <button class="btn btn-icon btn-edit btn-sm">
                               <a href="{{ route('listuraiankredit.edit', ['id' => $kegiatan->id]) }}"
                                   class="action-link"><i class="fas fa-edit"></i></a>

                           </button> |
                           <button class="btn btn-icon btn-delete btn-sm">
                               <a 
                                   class="action-link btn-delete" data-toggle="modal"
                                    data-target="#successModal"><i class="fas fa-trash-can"></i></a>
                           </button>
                       </td>
                     </tr>
                         
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
                                        <h5 class="modal-title" id="successModalLabel">Yakin menghapus data?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <button class="btn btn-icon btn-modal btn-sm">
                                            <a
                                                href="{{ route('listuraiankredit.delete', ['id' => $kegiatan->id]) }}"
                                                class="action-link btn-modal">Hapus</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @empty
                     <td colspan="7" class="text-center">Empty Data</td>
                     @endforelse
                  </tbody>
               </table>

               <div class="d-flex justify-content-center">
                    {{ $uraiankegiatan->links('vendor.pagination.bootstrap-4') }}
            </div>
            </div>
         </div>
      </div>
   </div>


   <script>
    // Fungsi untuk filter berdasarkan input pencarian
    function filterTable() {
        // Mendapatkan nilai input pencarian
        var searchText = document.getElementById('search').value.toLowerCase();
        
        // Mendapatkan semua baris data pada tabel
        var rows = document.querySelectorAll('#dataTable tbody tr');

        // Melakukan iterasi pada setiap baris data
        rows.forEach(function(row) {
            // Mendapatkan nilai jenis fungsional dari setiap baris
            var jenisFungsional = row.querySelector('#fungsi').textContent.toLowerCase();

            // Menyembunyikan baris yang tidak sesuai dengan pencarian
            if (jenisFungsional.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Memanggil fungsi filter saat nilai input pencarian berubah
    document.getElementById('search').addEventListener('input', filterTable);
</script>
   <!-- /.container-fluid -->
@endsection
