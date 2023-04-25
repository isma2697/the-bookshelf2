
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>THE BOOKSHELF</title>
</head>
<body>
    <x-mycomp.navbar-full/>
    <x-mycomp.floating-box/>
    @yield('content')
    <x-mycomp.footer/>
    @livewireScripts
</body>
</html> 