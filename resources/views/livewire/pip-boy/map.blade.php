<div style="{{$page == 'map' ?: 'display:none;'}}" id="map_screen" wire:poll>
    <nav class="">
        <div class="nav-top-row border-bottom">
            <span class="stat" wire:click="setPage('stats')" onclick="window.location.href = '/?page=stats'">{{__('Stats')}}</span>
            <span class="inv" wire:click="setPage('inventory')"  onclick="window.location.href = '/?page=inventory'">{{__('Inventory')}}</span>
            <span class="data" wire:click="setPage('data')" onclick="window.location.href = '/?page=data'">{{__('Data')}}</span>
            <span class="active map" wire:click="setPage('map')" onclick="window.location.href = '/?page=map'">{{__('Map')}}</span>
            <span class="radio" wire:click="setPage('radio')" onclick="window.location.href = '/?page=radio'">{{__('Radio')}}</span>
        </div>
    </nav>

    @push('scripts')
        <script>
            function getCoordinates(){
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(setPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
                function setPosition(position) {
                    // console.log(position.coords.latitude);
                    // console.log(position.coords.longitude);
                }

                setTimeout(getCoordinates, 1000);
            }

            getCoordinates();
        </script>
    @endpush
</div>
