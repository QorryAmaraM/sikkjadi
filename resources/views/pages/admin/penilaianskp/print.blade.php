<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css" media="print">
        @page {
            size: A4 portrait;
        }

        body {
            writing-mode: initial;
            ;
        }


        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Penilaian SKP | SIKK</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://bpskotabukittinggi.id/sanjai/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://bpskotabukittinggi.id/sanjai/template/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="https://bpskotabukittinggi.id/sanjai/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://bpskotabukittinggi.id/sanjai/template/plugins/toastr/toastr.min.css">


</head>

<body class="position-relative">


    <header class="container-fluid ">
        <div class="d-flex justify-content-between">

            <div class="p-auto">

                <table class="table table-borderless">
                    <tr>
                        <td rowspan="2">
                            <img src="/assets/img/bps.png" alt="AdminLTE Logo" class="brand-image"
                                style="opacity: .8 ;width: 50px">
                        </td>
                        <td class="pb-0 pt-2 text-blue"><b>BADAN PUSAT STATISTIK</b></td>
                    </tr>
                    <tr>
                        <td class="pt-0 text-blue"><b>KOTA BUKITTINGGI</b></td>
                    </tr>
                </table>
            </div>
            <div class="p-auto pt-3">
                <div class="border border-dark border-1 p-2 mb-2 pb-0">
                    <b>
                        SKP
                    </b>
                </div>
            </div>
        </div>
    </header>
    <div class="form-group">
        <h5 class="text-center">
            <b>PENILAIAN SASARAN KINERJA PEGAWAI TAHUNAN </b>
        </h5>
        <p align="center"><b>PENILAIAN SASARAN KINERJA PEGAWAI TAHUNAN</b></p>
        <div class="card-body">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $user->nama }} </td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>: {{ $user->nip }} </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:
                        @switch($user->role_id)
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
                    </td>
                    <td>Periode</td>
                    <td>:
                </tr>

            </table>
        </div>

        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">

        </table>

        <div class="card-body ">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Periode</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Jenis</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Rencana Kinerja Atasan
                            </th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Rencana Kinerja</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Aspek</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">IKI</th>
                            <th colspan="2" style="padding:0.2rem; border-bottom: none">Target</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Satuan</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Realisasi</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kondisi</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Capaian IKI</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kategori Capaian IKI
                            </th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kategori Capaian
                                Rencana</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Nilai Capaian Rencana
                            </th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Nilai Tertimbang</th>
                        </tr>
                        <tr>
                            <th style="border-top: none">Min</th>
                            <th style="border-top: none">Max</th>
                        </tr>
                    </thead>
                    <tbody class="tabel_utama">
                        @forelse ($result as $skp)
                            @if ($skp->kinerja == 'utama')
                                <tr>
                                    <td rowspan="3">{{ $skp->tahun }}</td>
                                    <td rowspan="3">{{ $skp->kinerja }}</td>
                                    <td rowspan="3">{{ $skp->rencana_kinerja_atasan }}</td>
                                    <td rowspan="3">{{ $skp->rencana_kinerja }}</td>

                                    <td>Kuantitas</td>
                                    <td>{{ $skp->kuantitas_iki }}</td>
                                    <td>{{ $skp->kuantitas_target_min }}</td>
                                    <td>{{ $skp->kuantitas_target_max }}</td>
                                    <td>{{ $skp->kuantitas_satuan }}</td>
                                    <td>{{ $skp->kuantitas_realisasi }}</td>
                                    <td>{{ $skp->kuantitas_kondisi }}</td>
                                    <td>{{ $skp->kuantitas_capaian_iki }}</td>
                                    <td>{{ $skp->kuantitas_kategori_capaian_iki }}</td>

                                    <td rowspan="3">{{ $skp->kategori_capaian_rencana }}</td>
                                    <td rowspan="3">{{ $skp->nilai_capaian_rencana }}</td>
                                    <td rowspan="3">{{ $skp->nilai_tertimbang }}</td>
                                <tr>
                                    <td>Kualitas</td>
                                    <td>{{ $skp->kualitas_iki }}</td>
                                    <td>{{ $skp->kualitas_target_min }}</td>
                                    <td>{{ $skp->kualitas_target_max }}</td>
                                    <td>{{ $skp->kualitas_satuan }}</td>
                                    <td>{{ $skp->kualitas_realisasi }}</td>
                                    <td>{{ $skp->kualitas_kondisi }}</td>
                                    <td>{{ $skp->kualitas_capaian_iki }}</td>
                                    <td>{{ $skp->kualitas_kategori_capaian_iki }}</td>
                                </tr>
                                <tr>
                                    <td>Waktu</td>
                                    <td>{{ $skp->waktu_iki }}</td>
                                    <td>{{ $skp->waktu_target_min }}</td>
                                    <td>{{ $skp->waktu_target_max }}</td>
                                    <td>{{ $skp->waktu_satuan }}</td>
                                    <td>{{ $skp->waktu_realisasi }}</td>
                                    <td>{{ $skp->waktu_kondisi }}</td>
                                    <td>{{ $skp->waktu_capaian_iki }}</td>
                                    <td>{{ $skp->waktu_kategori_capaian_iki }}</td>

                                </tr>
                            @endif
                        @empty
                            <td colspan="16" class="text-center">Empty Data</td>
                        @endforelse
                    </tbody>

                    <tbody class="tabel_tambahan">
                        @forelse ($result as $skp)
                            @if ($skp->kinerja == 'tambahan')
                                <tr>
                                    <td rowspan="3">{{ $skp->tahun }}</td>
                                    <td rowspan="3">{{ $skp->kinerja }}</td>
                                    <td rowspan="3">{{ $skp->rencana_kinerja_atasan }}</td>
                                    <td rowspan="3">{{ $skp->rencana_kinerja }}</td>

                                    <td>Kuantitas</td>
                                    <td>{{ $skp->kuantitas_iki }}</td>
                                    <td>{{ $skp->kuantitas_target_min }}</td>
                                    <td>{{ $skp->kuantitas_target_max }}</td>
                                    <td>{{ $skp->kuantitas_satuan }}</td>
                                    <td>{{ $skp->kuantitas_realisasi }}</td>
                                    <td>{{ $skp->kuantitas_kondisi }}</td>
                                    <td>{{ $skp->kuantitas_capaian_iki }}</td>
                                    <td>{{ $skp->kuantitas_kategori_capaian_iki }}</td>

                                    <td rowspan="3">{{ $skp->kategori_capaian_rencana }}</td>
                                    <td rowspan="3">{{ $skp->nilai_capaian_rencana }}</td>
                                    <td rowspan="3">{{ $skp->nilai_tertimbang }}</td>
                                <tr>
                                    <td>Kualitas</td>
                                    <td>{{ $skp->kualitas_iki }}</td>
                                    <td>{{ $skp->kualitas_target_min }}</td>
                                    <td>{{ $skp->kualitas_target_max }}</td>
                                    <td>{{ $skp->kualitas_satuan }}</td>
                                    <td>{{ $skp->kualitas_realisasi }}</td>
                                    <td>{{ $skp->kualitas_kondisi }}</td>
                                    <td>{{ $skp->kualitas_capaian_iki }}</td>
                                    <td>{{ $skp->kualitas_kategori_capaian_iki }}</td>
                                </tr>
                                <tr>
                                    <td>Waktu</td>
                                    <td>{{ $skp->waktu_iki }}</td>
                                    <td>{{ $skp->waktu_target_min }}</td>
                                    <td>{{ $skp->waktu_target_max }}</td>
                                    <td>{{ $skp->waktu_satuan }}</td>
                                    <td>{{ $skp->waktu_realisasi }}</td>
                                    <td>{{ $skp->waktu_kondisi }}</td>
                                    <td>{{ $skp->waktu_capaian_iki }}</td>
                                    <td>{{ $skp->waktu_kategori_capaian_iki }}</td>

                                </tr>

                                
                            @endif
                        @empty
                            <td colspan="16" class="text-center">Empty Data</td>
                        @endforelse
                    </tbody>
                </table>

                <div class="card-body">
                    <table class="table table-borderless text-center">
                        <tr>
                            <td class="pb-5">Pegawai yang dinilai</td>
                        </tr>
                        <tr>
                            <td class="pb-0 pt-5"><u>{{ $user->nama }}</u></td>
                        </tr>
                        <tr>
                            <td class="pt-0">{{ $user->nip }}</td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>

        <footer class="container-fluid position-absolute margin-bottom-0   text-center">
            <h6>Jl. Perwira No. 50, Belakang Balok, Bukittinggi Telp (62-752) 21521, Faks (62-752) 624629, Mailbox :
                bps1375@bps.go.id</h6>
        </footer>

        <script type="text/javascript">
            window.print();
        </script>





        <!-- jQuery -->
        <script src="https://bpskotabukittinggi.id/sanjai/template/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://bpskotabukittinggi.id/sanjai/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://bpskotabukittinggi.id/sanjai/template/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="https://bpskotabukittinggi.id/sanjai/template/dist/js/demo.js"></script>
        <!-- Toastr -->
        <script src="https://bpskotabukittinggi.id/sanjai/template/plugins/toastr/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>


</body>

</html>
