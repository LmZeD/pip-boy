<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pip Boy</title>

    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    @livewireStyles
    @stack('styles')


</head>
<body>

<div class="container">
    <main>
        {{ $slot }}
    </main>
</div>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@livewireScripts
@stack('scripts')

</body>
</html>
