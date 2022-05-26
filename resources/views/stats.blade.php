<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pip Boy</title>

    <link href="{{ asset('css/stats.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="screen">
        <div class="screen-reflection"></div>
        <div class="scan"></div>
        <nav class="">
            <div class="nav-top-row border-bottom">
                <span class="active stat" onclick="window.location = '{{route('stats')}}'">{{__('Stats')}}</span>
                <span class="inv" onclick="window.location = '{{route('inventory')}}'">{{__('Inventory')}}</span>
                <span class="data" onclick="window.location = '{{route('data')}}'">{{__('Data')}}</span>
                <span class="map" onclick="window.location = '{{route('map')}}'">{{__('Map')}}</span>
                <span class="radio" onclick="window.location = '{{route('radio')}}'">{{__('Radio')}}</span>
            </div>
            <div class="nav-bottom-row">
                <span class="status">{{__('Status')}}</span>
                <span class="off special">{{__('Special')}}</span>
                <span class="off-darker special">{{__('Perks')}}</span>
            </div>
        </nav>
        <div class="vault-boy-holder">
            <div class="vaultboy">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
                <div class="bar5"></div>
                <div class="bar6"></div>
            </div>
        </div>
        <div class="pip-boy-bottom">
            <div class="info-bar">
                <span class="weapon"></span>
                <span class="aim"><p>21</p></span>
                <span class="helmet"></span>
                <span class="shield"><p>110</p></span>
                <span class="voltage"><p>126</p></span>
                <span class="nuclear"><p>35</p></span>
            </div>
            <div class="hud-holder">
                <div class="supplies">
                    <span>{{__('Stimpak')}} (0)</span>
                    <span>{{__('Radaway')}} (0)</span>
                </div>
                <div class="hud-bar">
                    <div class="hp">
                        {{__('HP')}} {{$hp ?? '365/365'}}
                    </div>
                    <div class="exp">
                        {{__('Level')}} {{$level ?? '26'}}
                        <span class="xp-bar"></span>
                    </div>
                    <div class="ap">
                        {{__('AP')}} {{$ap ?? '100/100'}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
