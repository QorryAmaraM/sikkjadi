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
    <title>Cetak Penilaian CKPR | SIKK</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://bpskotabukittinggi.id/sanjai/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://bpskotabukittinggi.id/sanjai/template/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://bpskotabukittinggi.id/sanjai/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
                            <img src="/assets/img/bps.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8 ;width: 50px">
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
                        CKP
                    </b>
                </div>
            </div>
        </div>
    </header>
    <div class="form-group">
        <h5 class="text-center">
            <b>PENILAIAN CAPAIAN KINERJA KARYAWAN </b>
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
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">No</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Nama Pegawai</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Periode</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Uraian Kegiatan</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Satuan</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Target</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Realisasi</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Persen (%)</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Nilai</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kode Butir</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Angka Kredit</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Kode</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Keterangan Staf</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Keterangan Penilai</th>
                            <th rowspan="2" style="padding:0.2rem; vertical-align: middle">Penilai</th>
                        </tr>
                    </thead>

                    <tbody class="alldata">
                        @forelse ($resultrole as $nilaickpr)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $nilaickpr->nama }}</td>
                                <td>{{ $nilaickpr->bulan }} {{ $nilaickpr->tahun }}</td>
                                <td>{{ $nilaickpr->uraian_kegiatan }}</td>
                                <td>{{ $nilaickpr->satuan }}</td>
                                <td>{{ $nilaickpr->target }}</td>
                                <td>{{ $nilaickpr->realisasi }}</td>
                                <td>{{ $nilaickpr->persen }} %</td>
                                <td>{{ $nilaickpr->nilai }}</td>
                                <td>{{ $nilaickpr->kode_butir }}</td>
                                <td>{{ $nilaickpr->angka_kredit }}</td>
                                <td>{{ $nilaickpr->kode }}</td>
                                <td>{{ $nilaickpr->keterangan }}</td>
                                <td>{{ $nilaickpr->keterangan_penilai }}</td>
                                <td>{{ $nilaickpr->penilai }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="15">Tidak ada data untuk ditampilkan.</td>
                            </tr>
                        @endforelse
                    </tbody>


                </table>

                <div class="card-body">
                    <table class="table table-borderless text-center">
                        <tr>
                            <td class="pb-5">Pegawai yang dinilai</td>
                            <td class="pb-5">Pejabat penilai</td>
                        </tr>
                        <tr>
                            <td class="pb-0 pt-5"><u>{{ $user->nama }}</u></td>
                            <td class="pb-0 pt-5"><u>{{ $pejabatNama }}</u></td>
                        </tr>
                        <tr>
                            <td class="pt-0">{{ $user->nip }}</td>
                            <td class="pt-0">{{ $pejabatId }}</td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>

        <footer class="container-fluid bottom-0 text-center">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>
