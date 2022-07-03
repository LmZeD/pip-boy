<div style="{{$page == 'inventory' ?: 'display:none;'}}" id="inventory_screen">
    @push('styles')
        <link href="{{ asset('css/inventory.css') }}" rel="stylesheet">
    @endpush

    <nav class="">
        <div class="nav-top-row border-bottom">
            <span class="stat" wire:click="setPage('stats')" onclick="window.location.href = '/?page=stats'">{{__('Stats')}}</span>
            <span class="active inv" wire:click="setPage('inventory')"  onclick="window.location.href = '/?page=inventory'">{{__('Inventory')}}</span>
            <span class="data" wire:click="setPage('data')" onclick="window.location.href = '/?page=data'">{{__('Data')}}</span>
            <span class="map" wire:click="setPage('map')" onclick="window.location.href = '/?page=map'">{{__('Map')}}</span>
            <span class="radio" wire:click="setPage('radio')" onclick="window.location.href = '/?page=radio'">{{__('Radio')}}</span>
        </div>

        <div class="nav-bottom-row">
            <span class="status" id="weapons_subpage_nav" onclick="showWeaponsSubpage()">{{__('WEAPONS')}}</span>
            <span class="off special" id="apparel_subpage_nav" onclick="showApparelSubpage()">{{__('APPAREL')}}</span>
            <span class="off-darker special" id="aid_subpage_nav" onclick="showAidSubpage()">{{__('AID')}}</span>
            <span class="hidden special" id="misc_subpage_nav" onclick="showMiscSubpage()">{{__('MISC')}}</span>
            <span class="hidden special" id="junk_subpage_nav" onclick="showJunkSubpage()">{{__('JUNK')}}</span>
            <span class="hidden special" id="mods_subpage_nav" onclick="showModsSubpage()">{{__('MODS')}}</span>
            <span class="hidden special" id="ammo_subpage_nav" onclick="showAmmoSubpage()">{{__('AMMO')}}</span>
        </div>
    </nav>

        <div class="inventory-holder">
            <div class="inventory-displays-holder">
                <div class="weapons-holder inventory-subpage" id="weapons_subpage">
                    @livewire('inventory.item-section', ['items' => $inventoryItems->where('type', 'weapon'), 'itemType' => 'weapon'])
                </div>

                <div class="apparel-holder inventory-subpage hidden" id="apparel_subpage">
                    @livewire('inventory.item-section', ['items' => $inventoryItems->where('type', 'apparel'), 'itemType' => 'apparel'])
                </div>

                <div class="aid-holder inventory-subpage hidden" id="aid_subpage">
                    @livewire('inventory.item-section', ['items' => $inventoryItems->where('type', 'aid'), 'itemType' => 'aid'])
                </div>

                <div class="junk-holder inventory-subpage hidden" id="junk_subpage">
                    @livewire('inventory.item-section', ['items' => $inventoryItems->where('type', 'junk'), 'itemType' => 'junk'])
                </div>

                <div class="misc-holder inventory-subpage hidden" id="misc_subpage">
                    @livewire('inventory.item-section', ['items' => $inventoryItems->where('type', 'misc'), 'itemType' => 'misc'])
                </div>

                <div class="mods-holder inventory-subpage hidden" id="mods_subpage">
                    @livewire('inventory.item-section', ['items' => $inventoryItems->where('type', 'mods'), 'itemType' => 'mods'])
                </div>

                <div class="ammo-holder inventory-subpage hidden" id="ammo_subpage">
                    @livewire('inventory.item-section', ['items' => $inventoryItems->where('type', 'ammo'), 'itemType' => 'ammo'])
                </div>
            </div>
            <div class="inventory-stats-row">
                <div class="inventory-stats-row__weight-holder">
                    <img src="{{asset('images/inventory/weight.png')}}" alt="">
                    {{$weight}}/265
                </div>
                <div class="inventory-stats-row__caps-holder">
                    <img src="{{asset('images/inventory/misc/caps.png')}}" alt="">
                    {{auth()->user()->getInventoryItemQuantity('caps')}}
                </div>
                <div class="inventory-stats-row__ammo-holder">
                    <img src="{{asset('images/gun.png')}}" alt="">
                    <img class="target-image" src="{{asset('images/aim.png')}}" alt="">
                    {{auth()->user()->getInventoryItemQuantity('10mm')}}
                </div>
            </div>
        </div>
    @push('scripts')
        <script>
            var weaponsNav = document.getElementById('weapons_subpage_nav');
            var apparelNav = document.getElementById('apparel_subpage_nav');
            var aidNav = document.getElementById('aid_subpage_nav');
            var miscNav = document.getElementById('misc_subpage_nav');
            var junkNav = document.getElementById('junk_subpage_nav');
            var modsNav = document.getElementById('mods_subpage_nav');
            var ammoNav = document.getElementById('ammo_subpage_nav');

            function showWeaponsSubpage()
            {
                weaponsNav.classList.remove('off');
                weaponsNav.classList.remove('off-darker');

                apparelNav.classList.add('off');
                aidNav.classList.add('off-darker');

                switchSubpage('weapons_subpage');
            }

            function showApparelSubpage()
            {
                weaponsNav.classList.add('off');
                weaponsNav.classList.remove('hidden');

                apparelNav.classList.remove('off');
                apparelNav.classList.remove('off-darker');

                aidNav.classList.remove('off-darker');
                aidNav.classList.add('off');

                miscNav.classList.add('hidden');

                junkNav.classList.add('hidden');

                switchSubpage('apparel_subpage');
            }

            function showAidSubpage()
            {
                weaponsNav.classList.add('hidden');

                apparelNav.classList.remove('off-darker');
                apparelNav.classList.add('off');
                apparelNav.classList.remove('hidden');

                aidNav.classList.remove('off-darker');
                aidNav.classList.remove('off');

                miscNav.classList.remove('hidden');
                miscNav.classList.add('off');
                miscNav.classList.remove('off-darker');

                junkNav.classList.remove('hidden');
                junkNav.classList.add('off-darker');

                modsNav.classList.add('hidden');
                ammoNav.classList.add('hidden');

                switchSubpage('aid_subpage');
            }

            function showMiscSubpage()
            {
                apparelNav.classList.add('hidden');

                aidNav.classList.remove('off-darker');
                aidNav.classList.add('off');
                aidNav.classList.remove('hidden');

                miscNav.classList.remove('off');
                miscNav.classList.remove('off-darker');

                junkNav.classList.remove('off-darker');
                junkNav.classList.add('off');

                modsNav.classList.remove('hidden');
                modsNav.classList.add('off-darker');

                ammoNav.classList.add('hidden');

                switchSubpage('misc_subpage');
            }

            function showJunkSubpage()
            {
                aidNav.classList.add('off-darker');

                miscNav.classList.add('off');

                junkNav.classList.remove('off');
                junkNav.classList.remove('off-darker');

                modsNav.classList.remove('off-darker');
                modsNav.classList.add('off');

                ammoNav.classList.remove('hidden');
                ammoNav.classList.add('off-darker');

                apparelNav.classList.add('hidden');

                modsNav.classList.remove('hidden');
                aidNav.classList.remove('hidden');

                switchSubpage('junk_subpage');
            }

            function showModsSubpage()
            {
                junkNav.classList.add('off');

                miscNav.classList.remove('off');
                miscNav.classList.add('off-darker');

                modsNav.classList.remove('off');
                modsNav.classList.remove('off-darker');

                ammoNav.classList.remove('hidden');
                ammoNav.classList.remove('off-darker');
                ammoNav.classList.add('off');

                aidNav.classList.add('hidden');

                switchSubpage('mods_subpage');
            }

            function showAmmoSubpage()
            {
                aidNav.classList.add('hidden');

                miscNav.classList.add('off-darker');

                junkNav.classList.add('off-darker');

                modsNav.classList.add('off');

                ammoNav.classList.remove('off');
                ammoNav.classList.remove('off-darker');

                switchSubpage('ammo_subpage');
            }

            function switchSubpage(activeSubpageId)
            {
                var subpages = document.getElementsByClassName('inventory-subpage');
                for (var i = 0; i < subpages.length; i++) {
                    subpages.item(i).classList.add('hidden');
                }

                document.getElementById(activeSubpageId).classList.remove('hidden');
            }

        </script>
    @endpush
</div>
