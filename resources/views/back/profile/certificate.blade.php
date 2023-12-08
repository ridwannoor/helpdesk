<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>

    
<style>
    body {
      background-image: url('img/certificate.png');
      background-repeat: no-repeat;
      /* background-attachment: fixed; */
      background-size: cover;
      /* padding: 0 0 0 0; */
      /* width: 100%; */
      /* position: absolute; */
    }
    h3 {
        font-family: Calibri;
        font-size: 3rem;
        /* align-content: center; */
        /* top: 50%; */
        padding: 40%  0 40%;
        text-align: center;
    }
    h5 {
        font-family: Calibri;
        font-size: 1,75rem;
        /* align-content: center; */
        /* top: 50%; */
        padding: 88% 0 40%;
        text-align: center;
    }
</style>
</head>

<body>
    {{-- <div class="center"> --}}
        <h3>{{ Auth::user()->namaperusahaan }}</h3>
        {{-- <h5>{{ $bods-> }}</h5> --}}
    {{-- </div> --}}
</body>
</html>