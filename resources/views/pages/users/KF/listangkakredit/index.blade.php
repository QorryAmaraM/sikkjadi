@extends('layouts.kf') @section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">List Angka Kredit</h1>
        </div>

        <!-- Content Row -->

        <div class="row">
            <div class="col-sm-6">
                <div class="inner-form">
                    <div class="input-form">
                        <input id="search" name="search" type="text" placeholder="Pencarian" />
                        <div class="input-form-append align-items-center">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Fungsi</th>
                                <th>Pembuat</th>
                                <th>Kode Butir</th>
                                <th>Isi Butir</th>
                                <th>Angka Kredit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="alldata">
                            @forelse ($angkakredit as $list)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $list->jenis_fungsional }}</td>
                                    <td>{{ $list->nama }}</td>
                                    <td>{{ $list->kode_butir }}</td>
                                    <td>{{ $list->isi_butir }}</td>
                                    <td>{{ $list->angka_kredit }}</td>
                                    <td>
                                        <button class="btn btn-icon btn-edit btn-sm">
                                            <a href="{{ route('kf.listangkakredit.edit', ['id' => $list->id]) }}" class="action-link">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                        </button>|
                                        <button class="btn btn-icon btn-delete btn-sm" data-delete-url="{{ route('kf.listangkakredit.delete', ['id' => $list->id]) }}">
                                            <i class="fas fa-trash-can"></i>
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="7" class="text-center">Empty Data</td>
                            @endforelse
                        </tbody>

                        <tbody id="Content" class="searchdata"></tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $angkakredit->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var savedData = "";
        
        $('#search').on('input', function() {
            savedData = $(this).val();

            if (savedData) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedData);
        });

        function handleSearch(Data) {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('/kf-masterangkakredit/listangkakredit/search') }}',
                data: {
                    'data': Data
                },
                success: function(data) {
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        }
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
