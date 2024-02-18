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
                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                aria-labelledby="account-pill-general" aria-expanded="true">
                                <!-- header media -->
                                <!--/ header media -->

                                <!-- form -->
                                <form class="validate-form mt-2" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-nama">Role ID</label>
                                                <input type="text" class="form-control" name="name" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-username">Nama</label>
                                                <input type="text" class="form-control" name="username"
                                                    />
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">NIP</label>
                                                <input type="email" class="form-control" name="email"
                                                    />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Email</label>
                                                <input type="jabatan" class="form-control" name="jabatan" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Password</label>
                                                <input type="jabatan" class="form-control" name="jabatan" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Golongan</label>
                                                <input type="jabatan" class="form-control" name="jabatan" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-e-mail">Fungsional</label>
                                                <input type="jabatan" class="form-control" name="jabatan" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                            <!--/ general tab -->

                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary mt-2 mr-1">Simpan</button>
                            </div>



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
