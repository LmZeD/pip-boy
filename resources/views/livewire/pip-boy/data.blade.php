<div style="{{$page == 'data' ?: 'display:none;'}}" id="data_screen">
    <nav class="">
        <div class="nav-top-row border-bottom">
            <span class="stat" wire:click="setPage('stats')" onclick="window.location.href = '/?page=stats'">{{__('Stats')}}</span>
            <span class="inv" wire:click="setPage('inventory')"  onclick="window.location.href = '/?page=inventory'">{{__('Inventory')}}</span>
            <span class="active data" wire:click="setPage('data')" onclick="window.location.href = '/?page=data'">{{__('Data')}}</span>
            <span class="map" wire:click="setPage('map')" onclick="window.location.href = '/?page=map'">{{__('Map')}}</span>
            <span class="radio" wire:click="setPage('radio')" onclick="window.location.href = '/?page=radio'">{{__('Radio')}}</span>
        </div>
    </nav>
</div>
