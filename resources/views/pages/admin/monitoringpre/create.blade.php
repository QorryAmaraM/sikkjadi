      @extends('layouts.admin')

      @section('content')
         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800">Tambah Makanan</h1>
               <a href="{{ route('makanan.index') }}" class="btn btn-sm btn-primary shadow-sm">
                  Back</a>
            </div>
            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            @endif
            <div class="card shadow">
               <div class="card-body">
                  <form action="{{ route('makanan.store') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama"
                           value="{{ old('nama') }}">
                     </div>
                     <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" rows="5" class="d-block w-100 form-control">{{ old('deskripsi') }}</textarea>
                     </div>
                     <div class="form-group">
                        <label for="image">Gambar</label>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="image"
                              aria-describedby="inputGroupFileAddon01">
                           <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                     </button>
                  </form>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
      @endsection
