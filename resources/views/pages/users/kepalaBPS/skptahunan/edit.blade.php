@extends('layouts.kepalaBPS')

@section('content')
<!-- Begin Page Content -->

<div class = "container-fluid">

<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-black-800">Edit SKP Tahunan</h1>
</div>

<!-- Content Row -->

<form id="myForm"
    action="/admin-perencanaankerja/spktahunan/{{ $skptahunan->id }}"
    method="POST">
    @csrf @method('put')
    <div class="row mb-8">
        <div class="col-sm-6">
            <div class="form-group d-flex align-items-center">

                <label for="searchSelect" class="mb-0 mr-4">Pegawai</label>
                <select
                    class="form-control flex-grow-1"
                    data-width="75%"
                    data-live-search="true"
                    id="searchSelect"
                    name="user_id">
                    @foreach ($user as $users) @if ($users->id == $userid)
                    <option value="{{ $user_id = $userid }}">{{ $users->nama }}</option>
                    @endif @endforeach
                </select>

            </div>
        </div>
    </div>

    <div class="row mb-8 mt-3">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input
                    type="text"
                    class="form-control"
                    id="tahun"
                    placeholder="YYYY"
                    name="tahun"
                    value="{{ $skptahunan->tahun }}" placeholder="Masukkan Angka" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                </div>
                <div class="form-group">
                    <label for="periode">Periode</label>
                    <input
                        type="periode"
                        class="form-control"
                        id="periode"
                        placeholder="Periode"
                        name="periode"
                        value="{{ $skptahunan->periode }}" required>
                    </div>
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <input
                            type="wilayah"
                            class="form-control"
                            id="wilayah"
                            placeholder="wilayah"
                            name="wilayah"
                            value="{{ $skptahunan->wilayah }}" required>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Unit Kerja</label>
                            <input
                                type="unitkerja"
                                class="form-control"
                                id="unitkerja"
                                placeholder="Unit Kerja"
                                name="unit_kerja"
                                value="{{ $skptahunan->unit_kerja }}" required>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input
                                    type="jabatan"
                                    class="form-control"
                                    id="jabatan"
                                    placeholder="Jabatan"
                                    name="jabatan"
                                    value="{{ $skptahunan->jabatan }}" required>
                                </div>

                            <div class="col-12 mt-3 text-right">
                                    <button
                                        type="submit"
                                        name="submit"
                                        value="Save"
                                        class="btn save-button" onclick="checkFormAndShowModal()"
                                        >Simpan</button>
                            </div>
                    
                    </div>
                        </form>

            </form>

        
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function checkFormAndShowModal() {
    var form = document.getElementById('myForm');
    var allInputsFilled = true;

    // Loop untuk memeriksa setiap input dalam form
    for (var i = 0; i < form.length; i++) {
        if (form[i].type == "text" || form[i].type == "select-one") {
            if (form[i].value == "") {
                allInputsFilled = false;
                break;
            }
        }
    }

    // Jika semua input terisi, tampilkan modal
    if (allInputsFilled) {
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Data berhasil diedit!",
            showConfirmButton: false,
            timer: 10000
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                $('#successModal').modal('show');
            }
        });
    } else {
        // Tampilkan peringatan SweetAlert jika tidak semua data terisi
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap isi semua data sebelum melanjutkan.',
        });
    }
}

    </script>


@endsection