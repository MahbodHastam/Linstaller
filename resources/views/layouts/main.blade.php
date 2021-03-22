<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Linstaller') }} @isset($title) - {{ $title }} @endisset</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('vendor/linstaller/css/style.css') }}" type="text/css">
    <script src="{{ asset('vendor/linstaller/js/script.js') }}" defer></script>
    @yield('header')
</head>
<body>
    @include('linstaller::includes.stepper', ['step' => $step])
    <main id="linstaller">
        @yield('content')
    </main>
    @yield('footer')
</body>
</html>
