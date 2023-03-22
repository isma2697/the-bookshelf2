
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <title>PRINCIPAL</title>
</head>
<body>

    {{-- <x-mycomp.first />  --}}
    
    <x-mycomp.navbar-full/>
    <x-mycomp.books-carousel />
    <x-mycomp.floating-box/>
    <x-mycomp.main-books/>
    <x-mycomp.footer/>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>