@extends('layouts.kepalaBPS')

@section('content')
    <!-- Begin Page Content -->

    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Perencanaan Kinerja Tahunan</h1>
        </div>

        <!-- Content Row -->
        

        <div class="row">
            <div class="col-sm-6">
                <div class="inner-form">
                    <div class="input-form">
                        <input id="search" name="search" placeholder="Pencarian" />
                        <div class="input-form-append align-items-center">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <a href="{{ url('/kepalabps-perencanaankerja/spktahunan/create') }}" type="button" class="btn add-button">+ Tambah</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Periode</th>
                                <th>Wilayah</th>
                                <th>Unit Kerja</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="alldata">

                            @forelse ($skptahunanrole as $skp)
                                {{-- @if ($skp->user_id == $userId) --}}
                                    <tr>
                                        <td class="searchable tahun">{{ $skp->tahun }}</td>
                                        <td class="searchable">{{ $skp->periode }}</td>
                                        <td class="searchable">{{ $skp->wilayah }}</td>
                                        <td class="searchable">{{ $skp->unit_kerja }}</td>
                                        <td class="searchable">{{ $skp->jabatan }}</td>
                                        <td>
                                            <button class="btn btn-icon btn-edit btn-sm">
                                                <a href="{{ route('kepalabps.spktahunan.edit', ['id' => $skp->id]) }}" class="action-link">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                            </button>|
                                            <button class="btn btn-icon btn-delete btn-sm" data-delete-url="{{ route('kepalabps.spktahunan.delete', ['id' => $skp->id]) }}">
                                                <i class="fas fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>
                                {{-- @endif --}}
                            @empty
                                <td colspan="6" class="text-center">Empty Data</td>
                            @endforelse

                        </tbody>

                        <tbody id="Content" class="searchdata"></tbody>

                    </table>

                </div>
                <div class="d-flex justify-content-center">
                    {{ $skptahunanrole->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>

        </div>


    </div>

    <!-- /.container-fluid -->

    <!-- Script -->

    <script>
        var savedValue = "";

        $('#search').on('input', function() {

            savedValue = $(this).val();

            if (savedValue) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            handleSearch(savedValue);
        });

        function handleSearch(savedValue) {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('/kepalabps-perencanaankerja/skptahunan/search') }}',
                data: {
                    'search': savedValue
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
@endsection
