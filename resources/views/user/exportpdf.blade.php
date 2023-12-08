<!DOCTYPE html>
<html>
<head>
	<title>USER LOGIN PERIODE {{ date('d-m-Y', strtotime($start))  . " - " . date('d-m-Y', strtotime($end)) }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 8pt;
		}
	</style>
	{{-- <center>
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
	</center> --}}
<div class="row">
  <table class="table">
      <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>                        
            {{-- <th>Lokasi</th> --}}
            {{-- <th>Pajak</th> --}}
            <th>Status</th>         
          </tr>
      </thead>
      @php
          $no = 1 ;
      @endphp
      <tbody>
        @foreach ($users as $item)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $item->name  }}</td>
              <td>{{ $item->email  }}</td>
              {{-- <td>{{ $item }}</td> --}}
              <td>
                @if ($item->status == 'active')
                    <span>Active</span>
                @else
                    <span>Non Active</span>
                @endif
              </td>
            </tr>
        @endforeach
        
            
      </tbody>
     
    </div>
  </table>
</body>
</html>