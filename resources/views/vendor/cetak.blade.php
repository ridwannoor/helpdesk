<!DOCTYPE html>
<html>
<head>
	<title>DATA PERUSAHAAN {{ $vendors->namaperusahaan . ", " .  $vendors->badanusaha->kode }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 8pt;
      border : 0 0 0 0;
		}
	</style>
	{{-- <center> --}}

	{{-- </center> --}}
<div class="container">
    {{-- <h5>DATA PERUSAHAAN {{ $vendors->namaperusahaan . ", " .  $vendors->badanusaha->kode }}</h4>
      <br> --}}
		{{-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5> --}}
      <div class="col-lg-12">
  <table class="table">
    <thead>
      <tr>
        <th colspan="2">DETAIL PERUSAHAAN</th>
      </tr>

    </thead>
      <tbody>
        <tr>
            <td >Kode Perusahaan</td>
            <td>{{ $vendors->kode }}</td>
        </tr>
        <tr>
          <td width="150px">Nama Perusahaan</td>
          <td> <strong>{{  $vendors->namaperusahaan . ", " . $vendors->badanusaha->kode }}</strong> <br>
              @if ( $vendors->is_published == null)
                  <span class="m-badge m-badge--danger m-badge--wide">Belum Verifikasi</span>
                  @if ($vendors->terms == 1)
                      <span class="m-badge m-badge--warning m-badge--wide">Menunggu Verifikasi</span>
                  @endif
              @else
                  <span class="m-badge m-badge--success m-badge--wide">Verified</span>
              @endif
          </td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>{{ $vendors->alamat }} <br>
            {{ $vendors->provinsi ? $vendors->provinsi->name : $vendors->cities->provinsi_name }}
          </td>
        </tr>
        <tr>
          <td>NPWP</td>
          <td>{{ $vendors->npwp }}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>
              @if ( $vendors->is_email_verified == null)
            <span class="m--font-warning"> <strong> {{ $vendors->email }}</strong></span>  <br>
            <span class="m-badge m-badge--warning m-badge--wide">Unverified</span>
              @else
                  <span class="m--font-success"> <strong> {{ $vendors->email }}</strong></span> <br>
                  <span class="m-badge m-badge--success m-badge--wide">Verified</span>
              @endif
          </td>
        </tr>
        <tr>
          <td>Telephone</td>
          <td>{{ $vendors->notelp }}</td>
        </tr>
        <tr>
          <td>Website</td>
          <td>{{ $vendors->website }}</td>
        </tr>
        <tr>
          <td>Kontak Person</td>
          <td>{{ $vendors->contactperson . " - " . $vendors->handphone  }} <br>
            {{ $vendors->alternative_person . " - " . $vendors->alternative_phone }}
          </td>
        </tr>
        <tr>
          <td>Bidang Pekerjaan/ <br> Bidang Usaha/ <br> Kategori Usaha</td>
          <td>
              @foreach ($vendors->jenispekerjaans as $item)
              {{ $item->name . " , " }} <br>
              @endforeach
              <br>
              @foreach ($vendors->jenisusahas as $item)
              {{ $item->detail . " , " }} <br>
              @endforeach
              <br>
              @foreach ($vendors->categories as $item)
              {{ $item->detail . " , " }} <br>
              @endforeach
          </td>
        </tr>
        <tr>
          <td>Produk</td>
          <td>{{ $vendors->product }}</td>
        </tr>

        <tr>
          <td>Bank</td>
          <td>
            @foreach ($vendors->vendorbank as $vb)
              <tr>
                <td> {{ $vb->bank->name . ", " . $vb->bank->code }}</td>
                <td>{{ $vb->nomor_rek }} <br>
                  {{ $vb->nama_pemilik }}</td>
              </tr>
            @endforeach
          </td>
        </tr>
        <tr>
          <td>Catatan</td>
          <td>{{ $vendors->catatan }}</td>
        </tr>
        </tbody>
    </div>
  </table>
</div>
  <div class="col-lg-12">
    <span>LISENSI</span>
  <table class="table">
    <thead>
        <tr>
            <th>NO</th>
            <th>DOKUMEN</th>
            <th>NOMOR</th>
            <th>KETERANGAN</th>
            {{-- <th>ACTION</th> --}}
        </tr>
    </thead>
    @php
    $no = 1 ;
    @endphp
    <tbody>
        @foreach ($vendors->vendorlisensi as $vl)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $vl->vendorjenis->keterangan }}<br>
                @if ($vl->is_published == 0)
                <span
                    class="m-badge m-badge--warning m-badge--wide">unverified</span>
                @else
                <span
                    class="m-badge m-badge--success m-badge--wide">verified</span>
                @endif
            </td>
            <td>{{ $vl->nomor }}</td>
            <td>{{ $vl->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
 <div class="col-lg-12">
    <span>PENGURUS</span>
  <table class="table">
    <thead>
        <tr>
          <th>NO</th>
          <th>NAMA</th>
          <th>POSISI</th>
        </tr>
    </thead>
    @php
    $no = 1 ;
    @endphp
    <tbody>
        @foreach ($vendors->vendorpengurus as $vp)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $vp->nama }}
            </td>
            <td>{{ $vp->posisi . " - " . $vp->jabatan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</body>
</html>
