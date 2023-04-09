
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>THE BOOKSHELF</title>
    @livewireStyles
</head>
<body>
    <x-mycomp.navbar-full/>
    <x-mycomp.floating-box/>
    <livewire:book-search>

    <x-mycomp.books-carousel  :books="$books"/>
    <x-mycomp.main-books :books="$books"/>
    <x-mycomp.footer/>
    @livewireScripts
</body>
</html>