<div style="{{$page == 'inventory' ?: 'display:none;'}}" id="inventory_screen">
    <nav class="">
        <div class="nav-top-row border-bottom">
            <span class="stat" wire:click="setPage('stats')" onclick="window.location.href = '/?page=stats'">{{__('Stats')}}</span>
            <span class="active inv" wire:click="setPage('inventory')"  onclick="window.location.href = '/?page=inventory'">{{__('Inventory')}}</span>
            <span class="data" wire:click="setPage('data')" onclick="window.location.href = '/?page=data'">{{__('Data')}}</span>
            <span class="map" wire:click="setPage('map')" onclick="window.location.href = '/?page=map'">{{__('Map')}}</span>
            <span class="radio" wire:click="setPage('radio')" onclick="window.location.href = '/?page=radio'">{{__('Radio')}}</span>
        </div>
        <div class="nav-bottom-row">
            <span class="status">{{__('WEAPONS')}}</span>
            <span class="off special">{{__('APPAREL')}}</span>
            <span class="off-darker special">{{__('AID')}}</span>
        </div>
    </nav>
</div>
