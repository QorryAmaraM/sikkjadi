      @extends('layouts.admin')

      @section('content')
          <!-- Begin Page Content -->
          <div class="container-fluid">

              <!-- Page Heading -->
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-black-800">Penilaian Capaian Kinerja Karyawan Realisasi</h1>
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
                                  @foreach ($result as $penilaian)
                                      @php
                                          $userId = $penilaian->user_id;
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
                              <select class="form-control col-sm-10" data-width="75%" data-live-search="true"
                                  id="tahun">
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
                              <select class="form-control col-sm-10" data-width="75%" data-live-search="true"
                                  id="bulan">
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
                  <div class="col-sm-6">
                      <div class="inner-form">
                          <div class="input-form">
                              <input id="search" type="text" placeholder="Pencarian" />
                              <div class="input-form-append align-items-center">
                                  <i class="fas fa-search"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 d-flex justify-content-end align-items-center">
                      <a href="/admin-ckp/penilaianckpr/create-index" type="button" class="btn add-button">+ Tambah</a>
                      <button class="btn btn-icon btn-print btn-sm">
                          <i class="fas fa-print"></i>
                      </button>
                  </div>
              </div>

              <div class="row">
                  <div class="col-sm-12">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Periode</th>
                                      <th>Uraian Kegiatan</th>
                                      <th>Satuan</th>
                                      <th>Target</th>
                                      <th>Realisasi</th>
                                      <th>Persen (%)</th>
                                      <th>Nilai</th>
                                      <th>Kode Butir</th>
                                      <th>Angka Kredit</th>
                                      <th>Kode</th>
                                      <th>Keterangan Staf</th>
                                      <th>Keterangan Penilai</th>
                                      <th>Penilai</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($result as $nilaickpr)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $nilaickpr->periode }}</td>
                                          <td>{{ $nilaickpr->uraian_kegiatan }}</td>
                                          <td>{{ $nilaickpr->satuan }}</td>
                                          <td>{{ $nilaickpr->target }}</td>
                                          <td>{{ $nilaickpr->realisasi }}</td>
                                          <td>{{ $nilaickpr->persen }}</td>
                                          <td>{{ $nilaickpr->nilai }}</td>
                                          <td>{{ $nilaickpr->kode_butir }}</td>
                                          <td>{{ $nilaickpr->angka_kredit }}</td>
                                          <td>{{ $nilaickpr->kode }}</td>
                                          <td>{{ $nilaickpr->keterangan }}</td>
                                          <td>{{ $nilaickpr->keterangan_penilai }}</td>
                                          <td>{{ $nilaickpr->penilai }}</td>
                                          <td>
                                             <button class="btn btn-icon btn-edit btn-sm">
                                                 <a href="{{ route('penilaianckpr.edit', ['id' => $nilaickpr->id]) }}" class="action-link"><i
                                                         class="fas fa-edit"></i></a>
                                             </button>
                                             <button class="btn btn-icon btn-delete btn-sm">
                                                 <a href="{{ route('penilaianckpr.delete', ['id' => $nilaickpr->id]) }}"
                                                     class="action-link btn-delete"><i class="fas fa-trash-can"></i></a>
                                             </button>
                                         </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.container-fluid -->
      @endsection
