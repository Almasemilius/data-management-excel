<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    <div class="h-20 bg-black w-full fixed">

    </div>
    <div class="py-20">
        {{$slot}}
    </div>
    @stack('scripts')
    @livewireScripts
</body>

</html>