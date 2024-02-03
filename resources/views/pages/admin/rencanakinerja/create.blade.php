@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Rencana Kinerja</h1>
        </div>

        <!-- Content Row -->

        <form action="/admin-perencanaankerja/rencanakinerja/store" method="POST">
            @csrf
            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group d-flex align-items-center">
                        <label for="nama" class="col-sm-1 pl-0 col-form-label">Nama</label>
                        @foreach ($user as $users)
                            @if ($users->id == $userid)
                                <input type="nama" class="form-control col-sm-11" id="nama"
                                    placeholder="Lorem Ipsum" name="nama" value="{{ $users->nama }}" disabled>
                                <input type="hidden" name="skp_tahunan_id" value="{{ $skptahunan->id }}">
                            @endif
                        @endforeach
                    </div>                    

                    <div class="form-group d-flex align-items-center">
                        <label for="periode" class="col-sm-1 pl-0 col-form-label">Tahun</label>
                        <input type="periode" class="form-control col-sm-11" id="tahun" value="{{ $skptahunan->tahun }}" name="tahun" disabled>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label for="periode" class="col-sm-1 pl-0 col-form-label">Periode</label>
                        <input type="periode" class="form-control col-sm-11" id="periode" value="{{ $skptahunan->periode }}" name="periode" disabled>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <label for="periode" class="col-sm-1 pl-0 col-form-label">Wilayah</label>
                        <input type="periode" class="form-control col-sm-11" id="wilayah" value="{{ $skptahunan->wilayah }}" name="wilayah" disabled>
                    </div>                    

                    <div class="form-group d-flex align-items-center">
                        <label for="periode" class="col-sm-1 pl-0 col-form-label">Unit Kerja</label>
                        <input type="periode" class="form-control col-sm-11" id="unit kerja" value="{{ $skptahunan->unit_kerja }}" name="unit_kerja" disabled>
                    </div>
                    
                    <div class="form-group d-flex align-items-center">
                        <label for="kinerja" class="col-sm-1 pl-0 col-form-label">Kinerja</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="kjutama" value="utama" name="kinerja" onclick="toggleCheckbox('kjutama')">
                            <label class="form-check-label" for="inlineCheckbox1">Utama</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="kjtambahan" value="tambahan" name="kinerja" onclick="toggleCheckbox('kjtambahan')">
                            <label class="form-check-label" for="inlineCheckbox2">Tambahan</label>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="rkatasan">Rencana Kinerja Atasan</label>
                        <input type="rkatasan" class="form-control" id="rkatasan" placeholder="Lorem Ipsum Dolor Sit Amet"
                            name="rencana_kinerja_atasan">
                    </div>
                    <div class="form-group">
                        <label for="rkpegawai">Rencana Kinerja</label>
                        <input type="rkpegawai" class="form-control" id="rkpegawai"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="rencana_kinerja">
                    </div>
                    <div class="form-group">
                        <label for="aspek">Aspek</label>
                        <input type="aspek" class="form-control" id="aspek"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="aspek">
                    </div>
                    <div class="form-group">
                        <label for="iki">IKI</label>
                        <input type="iki" class="form-control" id="iki"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="iki">
                    </div>
                    <div class="form-group">
                        <label for="targetmin">Target Min</label>
                        <input type="targetmin" class="form-control" id="targetmin"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="target_min">
                    </div>
                    <div class="form-group">
                        <label for="targetmix">Target Max</label>
                        <input type="targetmix" class="form-control" id="targetmix"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="target_max">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="satuan" class="form-control" id="satuan"
                            placeholder="Lorem Ipsum Dolor Sit Amet" name="satuan">
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
        function toggleCheckbox(checkboxId) {
            var checkbox = document.getElementById(checkboxId);
            var otherCheckboxId = (checkboxId === 'kjutama') ? 'kjtambahan' : 'kjutama';
            var otherCheckbox = document.getElementById(otherCheckboxId);
    
            otherCheckbox.disabled = checkbox.checked;
        }
    </script>

    <script type="text/javascript">
        $('#parameter').on('change', function() {

            $value = $(this).val();

            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
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
