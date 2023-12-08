<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Logistik APP</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Halo,</h1>
            {{-- <h6></h6> --}}
            <p><strong>Perhatian !!!</strong> ini Adalah Email Otomatis, Mohon untuk tidak membalas pesan ini.</p>
            <p>Good Receive No : {{ $no_do }} <br>
               Nama Pengadaan : {{ $perihal }} <br>
               {{-- Status Delivery Order : 
               @if ( $publish == 1 )
                   <label for="is_published"> Publish</label>
               @endif 
               <br>
               Status Good Receive : 
               @if ( $publish1 == 1 )
                   <label for="is_published_ro"> Publish</label>
               @endif --}}
            </p>
            <p>Untuk Lebih lengkap tolong lihat di aplikasi E-Logistik </p>
            {{-- <p>Keranjang Belanja No : <h3> {{ $request->no_order }}</h3> </p> --}}
            {{-- <p>Tanggal : {{ $request->tanggal }}</p> --}}
            <br>
            {{-- <p>Transaksi berhasil. </p> --}}
            {{-- <p>dibuat oleh : {{ $do }}</p> --}}
        </div>

    </div>
    {{-- <h1>{{ $pref->email }}</h1> --}}
   
    
    
</body>
</html>