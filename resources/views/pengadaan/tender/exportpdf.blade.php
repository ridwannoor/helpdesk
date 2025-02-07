<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- <title>Pengumuman</title> --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<style>
  body {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      color: #333;
      text-align: left;
      font-size: 20px;
      margin: 0;
  }

  .page-break {
      page-break-after: always;
  }

  .container {
      margin: 0 auto;
      margin-top: 100px;
      margin-bottom: 50px;
      padding: 40px;
      width: 960px;
      height: auto;
      background-color: #fff;
  }

  caption {
      font-size: 28px;
      margin-bottom: 15px;
  }


  table {
      /* border: 1px solid #333; */
      border-collapse: collapse;
      margin: 0 auto;
      width: 960px;
  }

  .table, td, tr, th {
      padding: 12px;
      /* border: 1px solid #333; */
      /* width: 100%; */
  }
  row  {
    padding: 50px;
  }

  header {
              position: fixed;
              top: 0cm;
              left: 0cm;
              right: 0cm;
              height: 3cm;
          }

  footer {
              position: fixed;
              bottom: 0cm;
              left: 0cm;
              right: 0cm;
              height: 2cm;
          }

  h4,
  p {
      text-align: "justify"
          margin:15px;
  }

</style>
<body>
  <div class="container">
  <header class="mt-0">
    <p style="text-align: right; font-size: 8pt"><img src="{{ public_path('data_file/'.$pref->image) }}" width="300px" alt=""></p>
  </header>
</div>
    <div class="row">
      <div class="col-lg-12">
        <p style="text-align: center; padding-top: 7em">
          <span>PENGUMUMAN PENGADAAN TENDER</span> <br>
          <strong>Nomor : {{ $tenders->nomor_pr }}</strong>
        </p>
        <p>
          PT a mengundang Calon Penyedia Barang dan/atau Jasa untuk mengikuti
          Pengadaan Pekerjaan sebagai berikut :
        </p>
        <table class="table" style="border: 1px; border-color: black">
          <thead>
            <tr>
              <th>No</th>
              <th>Paket Pekerjaan</th>
              <th>Lokasi Pekerjaan</th>
              <th>{{$tenders->dasar->detail}}</th>
              <th>Klasifikasi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">1</td>
              <td>{{ $tenders->nama_paket }}</td>
              <td>{{ $tenders->lokasi_pekerjaan }}</td>
              <td>{{ "Rp " . number_format($tenders->pagu)  }}</td>
              <td>
                @foreach ($tenders->tenderdetail as $item)
                {{ $item->vendorklasifikasi->kode }}
               {{ $item->vendorklasifikasi->name }} <br>

                @endforeach
              </td>
            </tr>
          </tbody>
        </table>
        <p>Syarat – syarat Peserta {{ $tenders->metodepengadaan->name }}:</p>

          <ol type="1">
            <li>Calon Peserta harus memiliki klasifikasi dan kualifikasi usaha yang
              dipersyaratkan;
              </li>
              <li>Calon Peserta wajib terverifikasi di e-procurement PT a
                pada website: http://eproc.approperti.co.id bagi perusahaan yang belum mendaftar,
                dipersilahkan mendaftar terlebih dahulu;</li>
                <li>Pelelangan ini menggunakan Peraturan berdasarkan Keputusan Direksi PT Angkasa Pura
                  Properti : <br>
                {{ $tenders->statustender->name }}
                  </li>
                  @if ( $tenders->catatan )
                  <li>

                    <p>{{ $tenders->catatan }} </p>
                 </li>
                 @endif
                  <li>
                    Melakukan registrasi pekerjaan sebagai tanda keikutsertaan {{ $tenders->nama_paket }}, pada sistem e-Procurement PT a yang dapat diakses di website: <strong> http://eproc.approperti.co.id/pengumuman</strong> selambat-lambatnya hari <strong>
                      {{ hariIndo(date('l', strtotime($tenders->tgl_daftar))) }},
                      {{ date('d M Y', strtotime($tenders->tgl_daftar)) }}
                      Pukul
                      {{ date('H:i:s', strtotime($tenders->tgl_daftar)) }} WIB;</p> </strong>

                  </li>
                  <li>Demikian, untuk diketahui dan atas perhatiannya diucapkan terimakasih.</p>
                </li>

          </ol>
          <p>Jakarta,  {{ date('d M Y', strtotime($tenders->tgl_paket)) }}</p>

        <p> Vice President Supply Chain Management <br>
        PT a <br>
        TTD
      </p>
      <div class="page-break"></div>
      <h5>TENDER DETAIL</h5>
      <table class="table" style="font-size: 16px">
        <tbody>
          <tr>
            <td>No Pengumuman</td>
            <td>{{ date('d-m-Y', strtotime($tenders->tgl_paket))  }} <br>
            {{ $tenders->nomor_pr }}
            </td>
          </tr>

          <tr>
          <td>Jenis Pekerjaan</td>
          <td>
              @foreach ($tenders->jenispekerjaans as $item)
              {{ $item->name . " , " }} <br>
              @endforeach
          </td>
        </tr>
        <tr>
          <td>Nama Paket</td>
          <td>{{$tenders->nama_paket}}</td>
        </tr>
        <tr>
          <td>Uraian Pekerjaan</td>
          <td>{!! $tenders->uraian_pek !!}</td>
        </tr>
        <tr>
          <td>Lokasi Pekerjaan</td>
          <td>{{$tenders->lokasi_pekerjaan}} </td>
        </tr>
        <tr>
          <td>Lokasi</td>
          <td>{{$tenders->lokasi->kode}} </td>
        </tr>
        <tr>
          <td>Anggaran</td>
          <td>{{$tenders->anggaran->kode}}</td>
        </tr>
        <tr>
          <td>Dasar Anggaran</td>
          <td>{{$tenders->dasar->detail}}</td>
        </tr>
        <tr>
          <td>Metode Pengadaan</td>
          <td>{{ $tenders->metodepengadaan->name}}</td>
        </tr>
        <tr>
          <td>Evaluasi Pekerjaan</td>
          <td>{{$tenders->metodeevaluasi->name}}</td>
        </tr>
        <tr>
          <td>Tanggal Tutup Pendaftaran</td>
          <td>{{$tenders->tgl_daftar}}</td>
        </tr>
        <tr>
          <td>Tanggal Tutup Penawaran</td>
          <td>{{$tenders->tgl_tutup}}</td>
        </tr>
        <tr>
          <td>HPS / RAP</td>
          <td>{{"Rp " . number_format($tenders->pagu) }}</td>
        </tr>
        <tr>
          <td>Waktu Pelaksanaan</td>
          <td>{{$tenders->jangka_pelaksanaan}}</td>
        </tr>
        <tr>
          <td>Waktu Pemeliharaan</td>
          <td>{{ $tenders->jangka_pemeliharaan}}</td>
        </tr>
        <tr>
          <td>Jaminan Pelaksanaan</td>
          <td>{{$tenders->jaminan_pelaksanaan}}</td>
        </tr>
        <tr>
          <td>Dasar Peraturan</td>
          <td><strong> {{$tenders->statustender->name}}</strong></td>
        </tr>
        <tr>
          <td>Catatan</td>
          <td><strong> {{$tenders->catatan}}</strong></td>
        </tr>
      </tbody>
      </table>
      <h5>Klarifikasi / Sertifikasi</h5>
      <table class="table" style="font-size: 18px">
          <thead class="thead-inverse">
              <tr>
                  <th>Kode</th>
                  <th>Keterangan</th>
              </tr>
              </thead>
              <tbody>
                  @foreach ($tenders->tenderdetail as $item)
                  <tr>
                      <td scope="row">{{ $item->vendorklasifikasi->kode }}</td>
                      <td>{{ $item->vendorklasifikasi->name }}</td>
                  </tr>

                  @endforeach

              </tbody>
      </table>
      <h5>Syarat Tender</h5>
      <table class="table" style="font-size: 18px">
          <thead class="thead-inverse">
              <tr>
                  <th>Kode</th>
                  <th>Keterangan</th>
                  {{-- <th>File Upload</th> --}}
              </tr>
              </thead>
              <tbody>
                  @foreach ($tenders->tendersyarat as $item)
                  <tr>
                      <td scope="row">{{ $item->syarattender->kode_syarat }}</td>
                      <td>{{ $item->syarattender->detail_syarat }}</td>
                      {{-- <td>
                          <a href="{{ url('data_file/pdf/'.$item->file_syarat) }}" target="_blank"><span class="m-widget4__text">  {{ $item->syarattender->file_syarat }}</span></a>
                      </td> --}}
                  </tr>
                  @endforeach

              </tbody>
      </table>
      @foreach ($tenders->tenderpenawaran as $v)
      <div class="page-break"></div>

      <h5 style="align-items: center"> {{ $tenders->nama_paket }} </h5>
      {{-- <ol type="I"> --}}
        <span>I. PEMBUKAAN ADMINISTRASI, TEKNIS & HARGA</span>
        <table class="table" style="font-size: 18px">
          <thead>
            <tr>
              <th colspan="2">INFORMASI PESERTA PENGADAAN</th>
              <th>KETERANGAN</th>
              {{-- <th></th> --}}
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width: 50px">1</td>
              <td>Nama Perusahaan</td>
              <td>{{ $v->vendor->namaperusahaan . ", " .  $v->vendor->badanusaha->kode   }} </td>
            </tr>
            <tr>
              <td scope="row">2</td>
              <td>Nilai Penawaran</td>
              <td>{{ $v->nilai_penawaran }}</td>
            </tr>
            <tr>
              <td scope="row">3</td>
              <td>Pimpinan/Penanggung Jawab Perusahaan</td>
              <td></td>
            </tr>
            <tr>
              <td scope="row">4</td>
              <td>No Telp</td>
              <td>{{ $v->vendor->notelp }}</td>
            </tr>
            <tr>
              <td scope="row">5</td>
              <td>Alamat Perusahaan</td>
              <td>{{ $v->vendor->alamat }}</td>
            </tr>
          </tbody>
        </table>
      {{-- </ol> --}}

      <table class="table" style="font-size: 18px">
        <thead>
            <tr>
              {{-- <th>No</th> --}}
                <th>No</th>
                <th>Uraian</th>
                {{-- <th>File Upload</th> --}}
                <th>Ada / Tidak Ada</th>
                <th>Catatan</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($sorted as $item)
                @if ($v->vendor_id == $item->vendor_id)
                    <tr>
                        <td>
                            {{ $item->syarattender->kode_syarat }}</td>
                        <td >{{ $item->syarattender->detail_syarat }}</td>
                        {{-- <td>{{ $item->file_pdf }}</td> --}}
                        <td>
                          {{ $item->adaatautidak }}
                        </td>
                        <td>
                          {{ $item->catatan }}
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style=""><strong> Kesimpulan</strong></td>

                </tr>
                <tr>
                    <td colspan="3" style="">Dokumen Teknis</td>
                    <td>
                      {{ $v->dok_teknis }}

                        {{-- <input type="hidden" name="vendor_id" value="{{ $v->vendor_id }}">
                        <textarea class="form-control"  name="dok_teknis" id="" cols="30" rows="3" required>{{ $v->dok_teknis }}</textarea> --}}
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="">Dokumen Administrasi</td>
                    <td>
                      {{ $v->dok_administrasi }}
                        {{-- <textarea class="form-control"  name="dok_administrasi" id="" cols="30" rows="3" required>{{ $v->dok_administrasi }}</textarea> --}}
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="">Dokumen Harga</td>
                    <td>
                      {{ $v->dok_harga }}
                        {{-- <textarea class="form-control"  name="dok_harga" id="" cols="30" rows="3" required>{{ $v->dok_harga }}</textarea> --}}
                    </td>
                </tr>
            </tfoot>
    </table>
    @endforeach
{{--
    <div class="page-break"></div>
    <table class="table" style="font-size: 18px; border-color: #333">
      <thead>
        <tr>
          <th colspan="5">Timeline Tender (Metode 1 Sampul)</th>
        </tr>
        <tr>
          <th>No</th>
          <th>Dokumen</th>
          <th>Tanggal</th>
          <th>Checklist</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row">1</td>
          <td>Pengumuman Tender</td>
          <td>{{ date('d M Y', strtotime($tenders->tgl_paket))  }}</td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">2</td>
          <td>Pendaftaran Peserta	</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">3</td>
          <td>Undangan Aanwijzing</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">4</td>
          <td>Rapat Penjelasan Pekerjaan (Aanwijzing)</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">5</td>
          <td>Dokumen Pengadaan (SBD)</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">6</td>
          <td>Surat Penawaran Harga</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">7</td>
          <td>Rapat Pembukaan Penawaran</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">8</td>
          <td>Pengumuman Hasil Evaluasi & Undangan Negosiasi Harga</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">9</td>
          <td>Rapat Klarifikasi & Negosiasi Harga</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">10</td>
          <td>Surat Penawaran Harga Negosiasi</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">11</td>
          <td>Surat Penunjukan Pemenang</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
        <tr>
          <td scope="row">12</td>
          <td>Kontrak/SPK</td>
          <td></td>
          <td><input type="checkbox" name="" id=""></td>
          <td></td>
        </tr>
      </tbody>
    </table>
      </div> --}}


    </div>
</body>
</html>