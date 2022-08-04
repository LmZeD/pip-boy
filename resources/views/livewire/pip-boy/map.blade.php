<div style="{{$page == 'map' ?: 'display:none;'}}" id="map_screen" wire:poll>
    @push('styles')
        <link href="{{ asset('css/map.css') }}" rel="stylesheet">
    @endpush
    <nav class="">
        <div class="nav-top-row border-bottom">
            <span class="stat" wire:click="setPage('stats')"
                  onclick="window.location.href = '/?page=stats'">{{__('Stats')}}</span>
            <span class="inv" wire:click="setPage('inventory')"
                  onclick="window.location.href = '/?page=inventory'">{{__('Inventory')}}</span>
            <span class="data" wire:click="setPage('data')"
                  onclick="window.location.href = '/?page=data'">{{__('Data')}}</span>
            <span class="active map" wire:click="setPage('map')"
                  onclick="window.location.href = '/?page=map'">{{__('Map')}}</span>
            <span class="radio" wire:click="setPage('radio')"
                  onclick="window.location.href = '/?page=radio'">{{__('Radio')}}</span>
        </div>
    </nav>

    <div class="map-holder">
        <canvas id="map_canvas">

        </canvas>
        <span id="distance_value" class="distance-display"></span>
    </div>

    @push('scripts')
        <script>
            var lat = null;
            var long = null;
            var deviceWidth = window.outerWidth;
            var deviceHeight = window.outerHeight;

            function getCoordinates() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(setPosition);
                }

                function setPosition(position) {
                    lat = position.coords.latitude;
                    long = position.coords.longitude;
                }

                setTimeout(getCoordinates, 1000);
            }

            getCoordinates();
            drawMap();

            //canvas

            var c = document.getElementById("map_canvas");
            var ctx = c.getContext("2d");
            ctx.canvas.width  = window.innerWidth;
            ctx.canvas.height = window.innerHeight;

            var cityImg = new Image;
            cityImg.src = '{{asset('images/map/city.png')}}';

            var cityNotDiscoveredImg = new Image;
            cityNotDiscoveredImg.src = '{{asset('images/map/city_not_discovered.png')}}';

            var houseImg = new Image;
            houseImg.src = '{{asset('images/map/house.png')}}';

            var houseNotDiscoveredImg = new Image;
            houseNotDiscoveredImg.src = '{{asset('images/map/house_not_discovered.png')}}';

            function drawMap() {
                if (!lat || !long) {
                    setTimeout(drawMap, 100);
                    return;
                }

                ctx.clearRect(0, 0, c.width, c.height);
                ctx.beginPath();
                ctx.lineWidth = 3;
                ctx.strokeStyle = 'lightgreen';
                ctx.moveTo(deviceWidth/2, deviceHeight/2);
                ctx.lineTo(deviceWidth/2-5, deviceHeight/2);
                ctx.lineTo(deviceWidth/2, deviceHeight/2-10);
                ctx.lineTo(deviceWidth/2+5, deviceHeight/2);
                ctx.lineTo(deviceWidth/2, deviceHeight/2);
                ctx.stroke();
                ctx.closePath();


                @foreach($quests as $quest)
                    @if(!$quest['latitude'] || !$quest['progress']->is_active)
                        @continue
                    @endif
                    var quest{{$quest['id']}}Lat = '{{$quest['latitude']}}'
                    var quest{{$quest['id']}}Long = '{{$quest['longitude']}}'

                    var quest{{$quest['id']}}LatDiff = lat - {{$quest['latitude']}};
                    var quest{{$quest['id']}}LongDiff = long - {{$quest['longitude']}};

                    var drawCoordsLat = Math.round(deviceWidth/2 - (quest{{$quest['id']}}LatDiff*3500))
                    var drawCoordsLong = Math.round(deviceHeight/2 - (quest{{$quest['id']}}LongDiff*2800))

                    @if($quest['progress']->quest_finished)
                        @if($quest['map_icon'] == 'house')
                            ctx.drawImage(houseImg, drawCoordsLat, drawCoordsLong, 20, 20);
                        @else
                            ctx.drawImage(cityImg, drawCoordsLat, drawCoordsLong, 20, 20);
                        @endif
                    @else
                        @if($quest['map_icon'] == 'house')
                           ctx.drawImage(houseNotDiscoveredImg, drawCoordsLat, drawCoordsLong, 20, 20);
                        @else
                            ctx.drawImage(cityNotDiscoveredImg, drawCoordsLat, drawCoordsLong, 20, 20);
                        @endif
                    @endif

                    @if($quest['progress']->is_active && !$quest['progress']->quest_finished)
                        ctx.moveTo(deviceWidth/2, deviceHeight/2);
                        ctx.lineTo(drawCoordsLat+10, drawCoordsLong+10);
                        ctx.stroke();
                        document.getElementById('distance_value').innerText = 'Distance To Quest: '
                            + Math.round(getDistanceFromLatLonInKm(lat, long, {{$quest['latitude']}}, {{$quest['longitude']}})*100) / 100
                            + ' km';
                    @endif
                @endforeach
                setTimeout(drawMap, 50);
            }

            //end canvas

            function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
                var R = 6371; // Radius of the earth in km
                var dLat = deg2rad(lat2-lat1);  // deg2rad below
                var dLon = deg2rad(lon2-lon1);
                var a =
                    Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                    Math.sin(dLon/2) * Math.sin(dLon/2)
                ;
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                var d = R * c; // Distance in km
                return d;
            }

            function deg2rad(deg) {
                return deg * (Math.PI/180)
            }
        </script>
    @endpush
</div>
