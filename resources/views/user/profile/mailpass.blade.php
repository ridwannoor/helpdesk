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
            <h1>E-Logistik Profile, </h1>
            <p>ini Adalah Email Otomatis, Mohon untuk tidak membalas pesan ini.</p>
            <p>Password : <h3> {{ $request->password }}</h3> </p>
            {{-- <p>Tanggal : {{ $request->tanggal }}</p> --}}
            <br>
            <p>Password berhasil diubah </p>
            {{-- <p>dibuat oleh : {{ Auth::user()->name }}</p> --}}
        </div>

    </div>
    {{-- <h1>{{ $pref->email }}</h1> --}}
   
    
    
</body>
</html>