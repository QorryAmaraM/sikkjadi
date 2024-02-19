@extends('layouts.kepalaBPS')

@section('content')
<!-- Begin Page Content -->

<div class = "container-fluid">

<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-black-800">Tambah Rencana Kinerja</h1>
</div>

<!-- Content Row -->

<form id="myForm" action="/admin-perencanaankerja/rencanakinerja/store" method="POST">
    @csrf
    <div class="row mb-8">
        <div class="col-sm-12">
            <div class="form-group d-flex align-items-center">
                <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                @foreach ($user as $users) @if ($users->id == $userid)
                <input
                    type="nama"
                    class="form-control col-sm-11"
                    id="nama"
                    placeholder="Lorem Ipsum"
                    name="nama"
                    value="{{ $users->nama }}"
                    disabled="disabled">
                    <input type="hidden" name="skp_tahunan_id" value="{{ $skptahunan->id }}">
                        @endif @endforeach
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label for="periode" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <input
                            type="periode"
                            class="form-control col-sm-11"
                            id="tahun"
                            value="{{ $skptahunan->tahun }}"
                            name="tahun"
                            disabled="disabled"></div>

                        <div class="form-group d-flex align-items-center">
                            <label for="periode" class="col-sm-1 pl-0 col-form-label">Periode</label>
                            <input
                                type="periode"
                                class="form-control col-sm-11"
                                id="periode"
                                value="{{ $skptahunan->periode }}"
                                name="periode"
                                disabled="disabled"></div>

                            <div class="form-group d-flex align-items-center">
                                <label for="periode" class="col-sm-1 pl-0 col-form-label">Wilayah</label>
                                <input
                                    type="periode"
                                    class="form-control col-sm-11"
                                    id="wilayah"
                                    value="{{ $skptahunan->wilayah }}"
                                    name="wilayah"
                                    disabled="disabled"></div>

                                <div class="form-group d-flex align-items-center">
                                    <label for="periode" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                                    <input
                                        type="periode"
                                        class="form-control col-sm-11"
                                        id="unit kerja"
                                        value="{{ $skptahunan->unit_kerja }}"
                                        name="unit_kerja"
                                        disabled="disabled"></div>

                                    <div class="form-group d-flex align-items-center">
                                        <label for="kinerja" class="col-sm-1 pl-0 col-form-label">Kinerja</label>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="kjutama"
                                                value="utama"
                                                name="kinerja"
                                                onclick="toggleCheckbox('kjutama')" required>
                                                <label class="form-check-label" for="inlineCheckbox1">Utama</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    id="kjtambahan"
                                                    value="tambahan"
                                                    name="kinerja"
                                                    onclick="toggleCheckbox('kjtambahan')" required>
                                                    <label class="form-check-label" for="inlineCheckbox2">Tambahan</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mb-8">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="rkatasan">Rencana Kinerja Atasan</label>
                                                <input
                                                    type="rkatasan"
                                                    class="form-control"
                                                    id="rkatasan"
                                                    placeholder="Lorem Ipsum Dolor Sit Amet"
                                                    name="rencana_kinerja_atasan" required></div>
                                                <div class="form-group">
                                                    <label for="rkpegawai">Rencana Kinerja</label>
                                                    <input
                                                        type="rkpegawai"
                                                        class="form-control"
                                                        id="rkpegawai"
                                                        placeholder="Lorem Ipsum Dolor Sit Amet"
                                                        name="rencana_kinerja" required></div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 mt-3 text-right">
                                                    <button
                                                        type="submit"
                                                        name="submit"
                                                        value="Save"
                                                        class="btn save-button"
                                                        onclick="checkFormAndShowModal()" >Simpan</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- /.container-fluid -->
<script>
    function toggleCheckbox(checkboxId) {
        var checkbox = document.getElementById(checkboxId);
        var otherCheckboxId = (checkboxId === 'kjutama')
            ? 'kjtambahan'
            : 'kjutama';
        var otherCheckbox = document.getElementById(otherCheckboxId);

        otherCheckbox.disabled = checkbox.checked;
    }
</script>

<script type="text/javascript">
    $('#parameter').on('change', function () {

        $value = $(this).val();

        $.ajax({
            type: 'get',
            url: '{{ URL::to(' search ') }}',
            data: {
                'search': $value
            },

            success: function (data) {
                console.log(data);
                $('#Content').html(data);
            }

        });

    })
</script>
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
            title: "Data berhasil ditambah!",
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