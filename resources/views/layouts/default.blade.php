<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <div class="h-20 bg-black w-full fixed">

    </div>
    <div class="py-20">
        <div class="">
            @if (session()->has('uploadStarted'))
            <div class="notification-container">
                <div class="notification">
                    <span>Upload Process started</span>
                </div>
            </div>
            @endif
            @if (session()->has('downloadStarted'))
            <div class="notification-container">
                <div class="notification">
                    <span>Downloading Process started</span>
                </div>
            </div>
            @endif
        </div>
        @yield('content')
    </div>
</body>

</html>