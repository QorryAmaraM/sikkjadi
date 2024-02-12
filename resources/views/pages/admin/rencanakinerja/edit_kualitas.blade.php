@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Rencana Kinerja</h1>
        </div>

        <!-- Content Row -->

        <form action="/admin-perencanaankerja/rencanakinerja/{{ $rencanakinerja->id }}" method="POST">
            @csrf
            @method('put')
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                        @foreach ($result as $result)
                            @foreach ($user as $user)
                                @if ($user->id == $result->user_id)
                                    <input type="nama" class="form-control col-sm-11" value="{{ $user->nama }}"
                                        disabled>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tahun" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <input type="tahun" class="form-control col-sm-11" value="{{ $result->tahun }}" disabled>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="periode" class="col-sm-1 pl-0 col-form-label">Periode</label>
                        <input type="periode" class="form-control col-sm-11" value="{{ $result->periode }}" disabled>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="wilayah" class="col-sm-1 pl-0 col-form-label">Wilayah</label>
                        <input type="wilayah" class="form-control col-sm-11" value="{{ $result->wilayah }}" disabled>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="unitkerja" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                        <input type="unitkerja" class="form-control col-sm-11" value="{{ $result->unit_kerja }}" disabled>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label for="kinerja" class="col-sm-1 pl-0 col-form-label">Kinerja</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="kjutama" value="utama" name="kinerja"
                                onclick="toggleCheckbox('kjutama')" <?php echo $rencanakinerja->kinerja == 'utama' ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="inlineCheckbox1">Utama</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="kjtambahan" value="tambahan" name="kinerja"
                                onclick="toggleCheckbox('kjtambahan')" <?php echo $rencanakinerja->kinerja == 'tambahan' ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="inlineCheckbox2">Tambahan</label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="aspek">Aspek</label>
                        <input type="aspek" class="form-control" id="aspek" name="aspek" value="Kualitas" disabled>
                    </div>
                    <div class="form-group">
                        <label for="iki">IKI</label>
                        <input type="iki" class="form-control" id="kualitas_iki" name="kualitas_iki" value="{{ $rencanakinerja->kualitas_iki }}">
                    </div>
                    <div class="form-group">
                        <label for="targetmin">Target Min</label>
                        <input type="targetmin" class="form-control" id="kualitas_target_min" name="kualitas_target_min" value="{{ $rencanakinerja->kualitas_target_min }}">
                    </div>
                    <div class="form-group">
                        <label for="targetmix">Target Max</label>
                        <input type="targetmix" class="form-control" id="kualitas_target_max" name="kualitas_target_max" value="{{ $rencanakinerja->kualitas_target_max }}">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="satuan" class="form-control" id="kualitas_satuan" name="kualitas_satuan" value="{{ $rencanakinerja->kualitas_satuan }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-3 text-right">

                    <button type="submit" name="submit" value="Save" class="btn save-button">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Set initial state based on the value of $rencanakinerja->kinerja
            var utamaCheckbox = document.getElementById('kjutama');
            var tambahanCheckbox = document.getElementById('kjtambahan');

            utamaCheckbox.disabled = tambahanCheckbox.checked;
            tambahanCheckbox.disabled = utamaCheckbox.checked;
        });

        function toggleCheckbox(checkboxId) {
            var checkbox = document.getElementById(checkboxId);
            var otherCheckboxId = (checkboxId === 'kjutama') ? 'kjtambahan' : 'kjutama';
            var otherCheckbox = document.getElementById(otherCheckboxId);

            otherCheckbox.disabled = checkbox.checked;
        }
    </script>
@endsection
