
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
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