@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Edit Pengguna</h1>
        </div>

        <!-- account setting page -->

        <div class="row">

            <!-- right content section -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- general tab -->
                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                <!-- header media -->
                                <!--/ header media -->

                                <!-- form -->
                                <form action="/admin-monitoring/monitoringuser/{{ $monitoringuser->id }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-nama">Jabatan</label>
                                                <select class="form-control col-sm-12" data-width="75%" data-live-search="true" id="role_id" name="role_id" required>
                                                    <option value="{{ $monitoringuser->role_id }}">
                                                        @switch($monitoringuser->role_id)
                                                            @case(1)
                                                                Admin
                                                            @break

                                                            @case(2)
                                                                Kepala BPS
                                                            @break

                                                            @case(3)
                                                                Kepala BU
                                                            @break

                                                            @case(4)
                                                                Koordinator Fungsi
                                                            @break

                                                            @case(5)
                                                                Staf
                                                            @break
                                                        @endswitch
                                                    </option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Kepala BPS</option>
                                                    <option value="3">Kepala Bagian Umum</option>
                                                    <option value="4">Koordinator Fungsi</option>
                                                    <option value="5">Staf</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-username">Nama</label>
                                                <input type="nama" class="form-control" name="nama" id="nama" value="{{ $monitoringuser->nama }}" />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">NIP</label>
                                                <input type="nip" class="form-control" name="nip" id="nip" value="{{ $monitoringuser->nip }}" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" value="{{ $monitoringuser->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Password Baru</label>
                                                <input type="password" class="form-control" name="password" id="password" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Golongan</label>
                                                <input type="golongan" class="form-control" name="golongan" id="golongan" value="{{ $monitoringuser->golongan }}" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Fungsional</label>
                                                <input type="fungsional" class="form-control" name="fungsional" id="fungsional" value="{{ $monitoringuser->fungsional }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 text-right">
                                        <button type="submit" name="submit" value="Save" class="btn btn-primary mt-2 mr-1">Simpan</button>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                            <!--/ general tab -->



                        </div>
                    </div>
                </div>
            </div>
            <!--/ right content section -->
        </div>
        </section>
        <!-- / account setting page -->

    </div>
@endsection
<!-- /.container-fluid -->
