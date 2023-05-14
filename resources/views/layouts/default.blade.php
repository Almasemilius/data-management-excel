<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body>
    <div class="h-20 bg-black w-full fixed">

    </div>
    <div class="py-20">
        @yield('content')
    </div>
    
</body>

</html>