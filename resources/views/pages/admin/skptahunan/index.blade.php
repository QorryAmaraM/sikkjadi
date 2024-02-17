@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->

    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Perencanaan Kinerja Tahunan</h1>
        </div>

        <!-- Content Row -->
        <div class="row mb-8">
            <div class="col-sm-6">
                <div class="search form-group d-flex align-items-center">
                    <label for="searchSelect" class="mb-0 mr-4">Pegawai</label>
                    <select name="searchSelect" id="searchSelect" class="form-control">
                        <option value="">Pilih Pegawai</option>
                        @php
                            $namaArray = [];
                        @endphp
                        @foreach ($skptahunan as $skp)
                            @php
                                $userId = $skp->user_id;
                                $nama = '';
                            @endphp
                            @foreach ($user as $users)
                                @if ($userId == $users->id)
                                    @php
                                        $nama = $users->nama;
                                    @endphp
                                    @if (!in_array($nama, $namaArray))
                                        <option value="{{ $userId }}">
                                            {{ $nama }}
                                        </option>
                                        @php
                                            $namaArray[] = $nama;
                                        @endphp
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

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

            <div class="col-sm-6 d-flex justify-content-end align-items-center">
                <a href="{{ url('/admin-perencanaankerja/spktahunan/create') }}" type="button"
                    class="btn add-button">+ Tambah</a>
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

                            @forelse ($skptahunan as $skp)
                                <tr>
                                    <td class="searchable tahun">{{ $skp->tahun }}</td>
                                    <td class="searchable">{{ $skp->periode }}</td>
                                    <td class="searchable">{{ $skp->wilayah }}</td>
                                    <td class="searchable">{{ $skp->unit_kerja }}</td>
                                    <td class="searchable">{{ $skp->jabatan }}</td>
                                    <td>
                                        <button class="btn btn-icon btn-edit btn-sm">
                                            <a href="{{ route('spktahunan.edit', ['id' => $skp->id]) }}"
                                                class="action-link">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                        </button>
                                        |
                                        <button class="btn btn-icon btn-delete btn-sm" data-toggle="modal"
                                            data-target="#successModal">
                                            <a class="action-link btn-delete">
                                                <i class="fas fa-trash-can"></i>
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                                    aria-labelledby="successModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="successModalLabel">Yakin menghapus data?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <button class="btn btn-icon btn-modal btn-sm">
                                                    <a href="{{ route('spktahunan.delete', ['id' => $skp->id]) }}"
                                                        class="action-link btn-modal">Hapus</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <td colspan="6" class="text-center">Empty Data</td>
                            @endforelse

                        </tbody>

                        <tbody id="Content" class="searchdata"></tbody>

                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $skptahunan->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /.container-fluid -->

    <!-- Script -->

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var searchText = $(this).val().toLowerCase(); // Mendapatkan teks pencarian
                var selectedOption = $('#searchSelect').val(); // Mendapatkan nilai yang dipilih dari dropdown

                // Menyembunyikan semua baris data
                $('.alldata tr').hide();

                // Menampilkan baris data yang sesuai dengan kriteria pencarian
                $('.alldata tr').each(function() {
                    var rowData = $(this).text().toLowerCase(); // Mendapatkan teks pada baris
                    if (selectedOption == '' || $(this).find('.user_id').text() == selectedOption) { // Memeriksa apakah baris sesuai dengan opsi dropdown
                        if (rowData.includes(searchText)) { // Memeriksa apakah teks pencarian cocok dengan data pada baris
                            $(this).show(); // Menampilkan baris data jika cocok
                        }
                    }
                });
            });

            // Mengatur ulang pencarian saat opsi dropdown berubah
            $('#searchSelect').on('change', function() {
                $('#search').trigger('input'); // Memicu kembali peristiwa input untuk memperbarui hasil pencarian
            });
        });

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
@endsection
