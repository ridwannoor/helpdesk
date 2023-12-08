<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email Akun - Eproc APP</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Halo,</h1>
            {{-- <h6></h6> --}}
            <p><strong>Perhatian !!!</strong> ini Adalah Email Otomatis, Mohon untuk tidak membalas pesan ini.</p>
                    
            Thank you for signing up. 
            Your six-digit code is {{$pin}}

            Thanks,<br>
            {{-- {{ config('app.name') }} --}}
           <br>
          
        </div>

    </div>
    {{-- <h1>{{ $pref->email }}</h1> --}}
   
    
    
</body>
</html>