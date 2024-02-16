@extends('layouts.admin')

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
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
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
                                                        <input type="text" class="form-control" name="name" placeholder="Nama"  />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-username">Username</label>
                                                        <input type="text" class="form-control" name="username" placeholder="Username"  />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-username">NIP</label>
                                                        <input type="text" class="form-control" name="username" placeholder="Username"  />
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-e-mail">E-mail</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Email" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-e-mail">Jabatan</label>
                                                        <input type="jabatan" class="form-control" name="jabatan" placeholder="Jabatan" />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-2 mr-1">Update</button>
                                                    <a href="/admin-dashboard" class="btn btn-outline-secondary mt-2">Batal</a>
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