@extends('layouts.kepalabu')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- account setting page -->

        <div class="row">

            <!-- right content section -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- general tab -->
                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                aria-labelledby="account-pill-general" aria-expanded="true">
                                <!-- header media -->
                                <!--/ header media -->

                                <!-- form -->
                                <form class="validate-form mt-2" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-nama">Nama</label>
                                                <input type="text" class="form-control" name="name" value="{{ $user->nama }}" disabled />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-username">NIP</label>
                                                <input type="text" class="form-control" name="username"
                                                    value="{{ $user->nip }}" disabled/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">E-mail</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $user->email }}" disabled/>
                                            </div>
                                        </div>

                                        @php
                                            switch ($user->role_id) {
                                                case 1:
                                                    $jabatan = 'Admin';
                                                    break;

                                                case 2:
                                                    $jabatan = 'Kepala BPS';
                                                    break;

                                                case 3:
                                                    $jabatan = 'Kepala BU';
                                                    break;

                                                case 4:
                                                    $jabatan = 'Koordinator Fungsi';
                                                    break;

                                                case 5:
                                                    $jabatan = 'Staf';
                                                    break;
                                            }
                                        @endphp

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Jabatan</label>
                                                <input type="jabatan" class="form-control" name="jabatan" value="{{ $jabatan }}" disabled/>
                                            </div>
                                        </div>
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
