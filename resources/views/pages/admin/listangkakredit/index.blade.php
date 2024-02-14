@extends('layouts.admin') @section('content')
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
                    <input id="search" type="text" placeholder="Pencarian"/>
                    <div class="input-form-append align-items-center">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-end align-items-center">
            <a
                href="/masterangkakredit/listangkakredit/create"
                type="button"
                class="btn add-button">Urutkan</a>
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
                    <tbody>
                        @foreach ($angkakredit as $list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $list->jenis_fungsional }}</td>
                            <td>{{ $list->nama }}</td>
                            <td>{{ $list->kode_butir }}</td>
                            <td>{{ $list->isi_butir }}</td>
                            <td>{{ $list->angka_kredit }}</td>
                            <td>
                                <button class="btn btn-icon btn-edit btn-sm">
                                    <a
                                        href="{{ route('listangkakredit.edit', ['id' => $list->id]) }}"
                                        class="action-link">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                </button>
                                |
                                <button
                                    class="btn btn-icon btn-delete btn-sm"
                                    data-toggle="modal"
                                    data-target="#successModal">
                                    <a class="action-link btn-delete">
                                        <i class="fas fa-trash-can"></i>
                                    </a>
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
                                                href="{{ route('listangkakredit.delete', ['id' => $list->id]) }}"
                                                class="action-link btn-modal">Hapus</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
@endsection