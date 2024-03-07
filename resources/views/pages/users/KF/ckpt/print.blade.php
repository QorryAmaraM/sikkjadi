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
            writing-mode: initial;;
        }


        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak CKP-T | SIKK</title>
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
                        CKP-T
                    </b>
                </div>
            </div>
        </div>
    </header>
    <div class="form-group">
        <h5 class="text-center">
            <b>TARGET CAPAIAN KINERJA PEGAWAI TAHUN </b>
        </h5>
        <p align="center"><b>TARGET CAPAIAN KINERJA PEGAWAI TAHUN </b></p>
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
                            <th scope="col" class="align-middle">No</th>
                            <!-- <th scope="col" class="align-middle">Fungsi</th> -->
                            <th scope="col" class="align-middle">Periode</th>
                            <th scope="col" class="align-middle">Uraian Kegiatan</th>
                            <th scope="col" class="align-middle">Satuan</th>
                            <th scope="col" class="align-middle">Target</th>
                            <!-- <th scope="col" class="align-middle">Target Rev</th> -->
                            <th scope="col" class="align-middle">Kode Butir</th>
                            <th scope="col" class="align-middle">Angka Kredit</th>
                            <th scope="col" class="align-middle">Kode</th>
                            <th scope="col" class="align-middle">Keterangan</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resultrole as $ckpt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ckpt->bulan }} {{ $ckpt->tahun }}</td>
                                <td>{{ $ckpt->uraian_kegiatan }}</td>
                                <td>{{ $ckpt->satuan }}</td>
                                <td>
                                    @if ($ckpt->target_rev !== null)
                                        {{ $ckpt->target_rev }}
                                    @else
                                        {{ $ckpt->target }}
                                    @endif
                                </td>
                                <td>{{ $ckpt->kode_butir }}</td>
                                <td>{{ $ckpt->angka_kredit }}</td>
                                <td>{{ $ckpt->kode }}</td>
                                <td>{{ $ckpt->keterangan }}</td>
                            </tr>
                        @endforeach


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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>


</body>

</html>
