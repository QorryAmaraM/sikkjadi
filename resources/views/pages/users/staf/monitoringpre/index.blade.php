@extends('layouts.staf')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-black-800">Monitoring Presensi</h1>
        </div>

        <!-- Content Row -->

        <form>
            <div class="row mb-8">
                <div class="col-sm-7">
                    
                    <div class="form-group d-flex align-items-center">
                        <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Tahun</label>
                        <select class="form-control col-sm-10" data-width="75%" data-live-search="true" id="tahun" name="tahun">
                            <option value="">Pilih tahun</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                        </select>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Bulan</label>
                        <select class="form-control col-sm-10" data-width="75%" data-live-search="true" id="bulan" name="tahun">
                            <option value="">Pilih Bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="July">July</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>

                        </select>
                    </div>
                </div>
            </div>
        </form>

        

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>CP</th>
                                <th>CT</th>
                                <th>CB</th>
                                <th>CS</th>
                                <th>CM</th>
                                <th>CLTN</th>
                                <th>S</th>
                                <th>PSW1</th>
                                <th>PSW2</th>
                                <th>PSW3</th>
                                <th>PSW4</th>
                                <th>TL1</th>
                                <th>TL2</th>
                                <th>TL3</th>
                                <th>TL4</th>
                                <th>JHK</th>
                            </tr>
                        </thead>
                        <tbody class="alldata">
                            @forelse ($monitoringpresensirole as $presensi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $presensi->tahun }} {{ $presensi->bulan }}</td>
                                    <td>{{ $presensi->cp }}</td>
                                    <td>{{ $presensi->ct }}</td>
                                    <td>{{ $presensi->cb }}</td>
                                    <td>{{ $presensi->cs }}</td>
                                    <td>{{ $presensi->cm }}</td>
                                    <td>{{ $presensi->ctln }}</td>
                                    <td>{{ $presensi->s }}</td>
                                    <td>{{ $presensi->psw1 }}</td>
                                    <td>{{ $presensi->psw2 }}</td>
                                    <td>{{ $presensi->psw3 }}</td>
                                    <td>{{ $presensi->psw4 }}</td>
                                    <td>{{ $presensi->tl1 }}</td>
                                    <td>{{ $presensi->tl2 }}</td>
                                    <td>{{ $presensi->tl3 }}</td>
                                    <td>{{ $presensi->tl4 }}</td>
                                    <td>{{ $presensi->jhk }}</td>
                                    
                                </tr>

                                @empty
                            <td colspan="16" class="text-center">Empty Data</td>
                            @endforelse
                        </tbody>
                        <tbody id="Content" class="searchdata"></tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                    {{ $monitoringpresensirole->links('vendor.pagination.bootstrap-4') }}
            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script>
      var savedValue = "";
      var savedTahunValue = "";
      var savedBulanValue = "";

      $('#search').on('input', function() {
          savedValue = $(this).val();

          if (savedValue) {
              $('.alldata').hide();
              $('.searchdata').show();
          } else if (savedTahunValue) {
              $('.alldata').hide();
              $('.searchdata').show();
          } else if (savedBulanValue) {
              $('.alldata').hide();
              $('.searchdata').show();
          } else {
              $('.alldata').show();
              $('.searchdata').hide();
          }

          handleSearch(savedValue, savedTahunValue, savedBulanValue);
      });

      $('#tahun').on('input', function() {
          savedTahunValue = $(this).val();

          if (savedTahunValue) {
              $('.alldata').hide();
              $('.searchdata').show();
          } else if (savedValue) {
              $('.alldata').hide();
              $('.searchdata').show();
          } else if (savedBulanValue) {
              $('.alldata').hide();
              $('.searchdata').show();
          } else {
              $('.alldata').show();
              $('.searchdata').hide();
          }

          handleSearch(savedValue, savedTahunValue, savedBulanValue);
      });

      $('#bulan').on('input', function() {
          savedBulanValue = $(this).val();

          if (savedBulanValue) {
              $('.alldata').hide();
              $('.searchdata').show();
          } else if (savedTahunValue) {
              $('.alldata').hide();
              $('.searchdata').show();
          } else if (savedValue) {
              $('.alldata').hide();
              $('.searchdata').show();
          } else {
              $('.alldata').show();
              $('.searchdata').hide();
          }

          handleSearch(savedValue, savedTahunValue, savedBulanValue);
      });

      function handleSearch(value, tahunvalue, bulanvalue) {
          $.ajax({
              type: 'get',
              url: '{{ URL::to('/staf-monitoring/monitorinpre/search') }}',
              data: {
                  'search': value,
                  'tahun': tahunvalue,
                  'bulan': bulanvalue
              },
              success: function(data) {
                  console.log(data);
                  $('#Content').html(data);
              }
          });
      }

  </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Event delegation untuk tombol hapus
            $(document).on('click', '.btn-delete', function() {
                var deleteUrl = $(this).data('delete-url');

                Swal.fire({
                    title: "Anda Yakin?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl; // Redirect ke URL penghapusan
                    }
                });
            });
        });
    </script>

@endsection
