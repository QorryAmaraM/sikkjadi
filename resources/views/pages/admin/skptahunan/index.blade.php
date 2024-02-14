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
                    <select name="search_luar" id="search_luar" class="form-control">
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
                <a href="{{ url('/admin-perencanaankerja/spktahunan/create') }}" type="button" class="btn add-button">+
                    Tambah</a>
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
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="alldata">
                            @foreach ($skptahunan as $skp)
                                <tr>
                                    <td>{{ $skp->tahun }}</td>
                                    <td>{{ $skp->periode }}</td>
                                    <td>{{ $skp->wilayah }}</td>
                                    <td>{{ $skp->unit_kerja }}</td>
                                    <td>{{ $skp->jabatan }}</td>
                                    <td>{{ $skp->status }}</td>
                                    <td>
                                        <button class="btn btn-icon btn-edit btn-sm">
                                            <a href="{{ route('spktahunan.edit', ['id' => $skp->id]) }}"
                                                class="action-link"><i class="fas fa-edit"></i></a>

                                        </button> |
                                        <button class="btn btn-icon btn-delete btn-sm">
                                            <a href="{{ route('spktahunan.delete', ['id' => $skp->id]) }}"
                                                class="action-link btn-delete"><i class="fas fa-trash-can"></i></a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tbody id="Content" class="searchdata"> </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Script -->


    <script type="text/javascript">
        var savedValue = "";

        $('#search_luar').on('change', function() {

            $value = $(this).val();

            if ($value) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }

            $.ajax({
                type: 'get',
                url: '{{ URL::to('/admin-perencanaankerja/skptahunan/search') }}',
                data: {
                    'search': $value
                },

                success: function(data) {
                    console.log(data);
                    $('#Content').html(data);
                }

            });

        })

        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("search");

            searchInput.addEventListener("input", function() {
                const searchTerm = this.value.toLowerCase();
                const itemsToSearch = document.querySelectorAll('.item-to-search');

                itemsToSearch.forEach(function(item) {
                    const text = item.textContent.toLowerCase();
                    const parentElement = item.closest(".row");
                    if (text.includes(searchTerm)) {
                        parentElement.style.display = "block";
                    } else {
                        parentElement.style.display = "none";
                    }
                });
            });
        });
    </script>
@endsection
