@extends('layouts.kepalabu')

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
                        <input id="search" type="text" placeholder="Pencarian" />
                        <div class="input-form-append align-items-center">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <a href="/kepalabu-masterutaiankegiatan/uraiankegiatan/create" type="button" class="btn add-button">+ Tambah</a>
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
                        <tbody class="alldata">
                            @forelse ($uraiankegiatanrole as $kegiatan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kegiatan->pembuat }}</td>
                                    <td>{{ $kegiatan->fungsi }}</td>
                                    <td>{{ $kegiatan->uraian_kegiatan }}</td>
                                    <td>
                                        <button class="btn btn-icon btn-edit btn-sm">
                                            <a href="{{ route('kepalabu.listuraiankredit.edit', ['id' => $kegiatan->id]) }}" class="action-link"><i class="fas fa-edit"></i></a>

                                        </button>|
                                        <button class="btn btn-icon btn-delete btn-sm" data-delete-url="{{ route('kepalabu.listuraiankredit.delete', ['id' => $kegiatan->id]) }}">
                                            <i class="fas fa-trash-can"></i></a>
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
                        {{ $uraiankegiatanrole->links('vendor.pagination.bootstrap-4') }}
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
                url: '{{ URL::to('/kepalabu-masterutaiankegiatan/uraiankegiatan/search') }}',
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
