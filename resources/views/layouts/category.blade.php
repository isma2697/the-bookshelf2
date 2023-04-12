
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <title>CATEGORY</title>
</head>
<body>
    <x-mycomp.navbar-full/>
    <x-mycomp.floating-box/>
    <x-mycomp.main-books :books="$books"/>
    <x-mycomp.footer/>

</body>
</html>