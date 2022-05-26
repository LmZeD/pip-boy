<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pip Boy</title>

    <link href="{{ asset('css/inventory.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="screen">
        <div class="screen-reflection"></div>
        <div class="scan"></div>
        <nav class="">
            <div class="nav-top-row border-bottom">
                <span class="stat" onclick="window.location = '{{route('stats')}}'">{{__('Stats')}}</span>
                <span class="active inv" onclick="window.location = '{{route('inventory')}}'">{{__('Inventory')}}</span>
                <span class="data" onclick="window.location = '{{route('data')}}'">{{__('Data')}}</span>
                <span class="map" onclick="window.location = '{{route('map')}}'">{{__('Map')}}</span>
                <span class="radio" onclick="window.location = '{{route('radio')}}'">{{__('Radio')}}</span>
            </div>
            <div class="nav-bottom-row">
                <span class="status">{{__('WEAPONS')}}</span>
                <span class="off special">{{__('APPAREL')}}</span>
                <span class="off-darker special">{{__('AID')}}</span>
            </div>
        </nav>

    </div>
</div>
</body>
</html>
