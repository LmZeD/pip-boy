<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pip Boy</title>

    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="screen">
        <div class="screen-reflection"></div>
        <div class="scan"></div>
        <nav>
            <div class="border-bottom">
                <span class="active stat"></span>
                <span class="inv"></span>
                <span class="data"></span>
                <span class="map"></span>
                <span class="radio"></span>
            </div>
            <div class="">
                <p>
                    <span class="status"></span>
                    <span class="off special"></span>
                </p>
            </div>
        </nav>
        <div class="vaultboy">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <div class="bar4"></div>
            <div class="bar5"></div>
            <div class="bar6"></div>
        </div>
        <div class="supplies"><span>Stimpak (0)</span><span>Radaway (0)</span><span>Stix</span>
        </div>
        <div class="info-bar">
            <span class="weapon"></span>
            <span class="aim"><p>21</p></span>
            <span class="helmet"></span>
            <span class="shield"><p>110</p></span>
            <span class="voltage"><p>126</p></span>
            <span class="nuclear"><p>35</p></span>
        </div>
        <div class="hud-bar">
            <div class="hp"></div>
            <div class="exp"></div>
            <div class="ap"></div>
        </div>
    </div>
</div>
</body>
</html>
