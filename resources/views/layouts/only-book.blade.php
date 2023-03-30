<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
   
    <title>THE BOOKSHELF</title>
</head>
<body>
    <x-mycomp.navbar-full/>
    <x-mycomp.book-info :book="$book"/>
    <x-mycomp.footer/>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>