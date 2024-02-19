@extends('layouts.kepalabu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Pilih SKP Tahunan</h1>
        </div>

        <!-- Content Row -->
        <div class="row mb-8">
            <div class="col-sm-6">
                <div class="search form-group d-flex align-items-center">
                    <label for="searchSelect" class="mb-0 mr-4">Pegawai</label>
                    <select name="search" id="search" class="form-control" disabled>
                        @foreach ($user as $users)
                            @if ($userid == $users->id)
                                <option value="{{ $userid }}">{{ $users->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


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
                            @foreach ($skptahunan as $skp)
                                @if ($userid == $skp->user_id)
                                    <tr>
                                        <td>{{ $skp->tahun }}</td>
                                        <td>{{ $skp->periode }}</td>
                                        <td>{{ $skp->wilayah }}</td>
                                        <td>{{ $skp->unit_kerja }}</td>
                                        <td>{{ $skp->jabatan }}</td>
                                        <td>
                                            <button class="btn btn-icon btn-edit btn-sm">
                                                <a href="/kepalabu-perencanaankerja/rencanakinerja/create/{{ $skp->id }}" type="button" class="btn add-button">+ Tambah</a>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
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
        $('#search').on('change', function() {

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
                url: '{{ URL::to('kepalabu-perencanaankerja/rencanakinerja/create/search') }}',
                data: {
                    'search': $value
                },

                success: function(data) {
                    console.log(data);
                    $('#Content').html(data);
                }

            });

        })
    </script>
@endsection
