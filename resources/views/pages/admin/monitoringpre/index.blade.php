@extends('layouts.admin')

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
                    <div class="search form-group d-flex align-items-center">
                        <label for="searchSelect" class="col-sm-2 pl-0 col-form-label">Nama</label>
                        <select name="search" id="search" class="form-control">
                            <option value="">Pilih Pegawai</option>
                            @php
                                $namaArray = [];
                            @endphp
                            @foreach ($monitoringpresensi as $monitoring)
                                @php
                                    $userId = $monitoring->user_id;
                                    $nama = '';
                                @endphp
                                @foreach ($user as $users)
                                    @if ($userId == $users->id)
                                        @php
                                            $nama = $users->nama;
                                        @endphp
                                        @if (!in_array($nama, $namaArray))
                                            <option value="{{ $userId }}">
                                                {{ $nama }}
                                            </option>
                                            @php
                                                $namaArray[] = $nama;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                    </div>
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
            
            <div class="col-sm-12 d-flex justify-content-end align-items-center mb-2">
                <button type="button" class="btn btn-primary" onclick="sortTable()">Urutkan</button>
                <a href="/admin-monitoring/monitorinpre/create" type="button" class="btn add-button">+ Tambah</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="alldata">
                            @forelse ($monitoringpresensi as $presensi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $presensi->nama }}</td>
                                    <td>{{ $presensi->bulan }} {{ $presensi->tahun }}</td>
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
                                    <td>
                                       <button class="btn btn-icon btn-edit btn-sm">
                                           <a href="{{ route('monitoringpresensi.edit', ['id' => $presensi->id]) }}"
                                               class="action-link"><i class="fas fa-edit"></i></a>
                                       </button>
                                       <button class="btn btn-icon btn-delete btn-sm" data-delete-url="{{ route('monitoringpresensi.delete', ['id' => $presensi->id]) }}">
                                            <i class="fas fa-trash-can"></i>
                                        </button>
                                   </td>
                                </tr>

                                @empty
                            <td colspan="19" class="text-center">Empty Data</td>
                            @endforelse
                        </tbody>
                        <tbody id="Content" class="searchdata"></tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                    {{ $monitoringpresensi->links('vendor.pagination.bootstrap-4') }}
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
              url: '{{ URL::to('/admin-monitoring/monitorinpre/search') }}',
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

<script>
   document.addEventListener('DOMContentLoaded', function() {
    var sortButton = document.querySelector('.btn-primary'); // Memastikan ini mengacu pada tombol Urutkan
    if (sortButton) {
        sortButton.addEventListener('click', function() {
            sortTable();
        });
    }
});
function sortTable() {
    var table, rows, i, x, y, shouldSwitch;
    table = document.getElementById("dataTable");
    var switching = true;

    // Lakukan loop hingga tidak ada lagi baris yang perlu ditukar
    while (switching) {
        switching = false;
        rows = table.rows;

        // Loop melalui semua baris tabel kecuali header
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[1]; // Kolom Kode (bulan tahun)
            y = rows[i + 1].getElementsByTagName("td")[1];

            // Bandingkan dua baris
            if (shouldSwitchRows(x, y)) {
                shouldSwitch = true;
                break;
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}

function shouldSwitchRows(x, y) {
    var xContent = x.innerHTML.split(' ');
    var yContent = y.innerHTML.split(' ');

    var xMonth = getMonthNumber(xContent[0]);
    var yMonth = getMonthNumber(yContent[0]);

    var xYear = parseInt(xContent[1], 10);
    var yYear = parseInt(yContent[1], 10);

    // Bandingkan tahun, jika berbeda
    if (xYear > yYear) return true;
    if (xYear < yYear) return false;

    // Jika tahun sama, bandingkan bulan
    return xMonth > yMonth;
}


function getMonthNumber(month) {
    var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    return months.indexOf(month) + 1;
}



</script>


@endsection
