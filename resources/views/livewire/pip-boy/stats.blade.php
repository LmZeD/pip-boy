<div class="livewire-holder" style="{{$page == 'stats' ?: 'display:none;'}}" id="stats_screen">
    @push('styles')
        <link href="{{ asset('css/stats.css') }}" rel="stylesheet">
    @endpush
    <nav class="">
        <div class="nav-top-row border-bottom">
            <span class="active stat" wire:click="setPage('stats')" onclick="window.location.href = '/?page=stats'">{{__('Stats')}}</span>
            <span class="inv" wire:click="setPage('inventory')"  onclick="window.location.href = '/?page=inventory'">{{__('Inventory')}}</span>
            <span class="data" wire:click="setPage('data')" onclick="window.location.href = '/?page=data'">{{__('Data')}}</span>
            <span class="map" wire:click="setPage('map')" onclick="window.location.href = '/?page=map'">{{__('Map')}}</span>
            <span class="radio" wire:click="setPage('radio')" onclick="window.location.href = '/?page=radio'">{{__('Radio')}}</span>
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
