@extends('layouts.admin') @section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-black-800">Monitoring User</h1>
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
            <a href="" type="button" class="btn add-button">+ Tambah</a>
         </div>
      </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                    <thead>
                        <tr>
                            <th>Role ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>NIP</th>
                            <th>Golongan</th>
                            <th>Fungsional</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                  
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="btn btn-icon btn-edit btn-sm">
                                    <a
                                        href=""
                                        class="action-link">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                </button>
                                |
                                <button
                                    class="btn btn-icon btn-delete btn-sm"
                                    data-delete-url="">
                                        <i class="fas fa-trash-can"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            
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
            var jenisFungsional = row.querySelector('#jenis_fungsional').textContent.toLowerCase();

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Event delegation untuk tombol hapus
            $(document).on('click', '.btn-delete', function() {
                var deleteUrl = $(this).data('delete-url');

                Swal.fire({
                    title: "Anda Yakin?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl; // Redirect ke URL penghapusan
                    }
                });
            });
        });
    </script>

<!-- /.container-fluid -->
@endsection