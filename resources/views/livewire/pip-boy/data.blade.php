<div style="{{$page == 'data' ?: 'display:none;'}}" id="data_screen">
    @push('styles')
        <link href="{{ asset('css/data.css') }}" rel="stylesheet">
    @endpush

    <nav class="">
        <div class="nav-top-row border-bottom">
            <span class="stat" wire:click="setPage('stats')"
                  onclick="window.location.href = '/?page=stats'">{{__('Stats')}}</span>
            <span class="inv" wire:click="setPage('inventory')"
                  onclick="window.location.href = '/?page=inventory'">{{__('Inventory')}}</span>
            <span class="active data" wire:click="setPage('data')"
                  onclick="window.location.href = '/?page=data'">{{__('Data')}}</span>
            <span class="map" wire:click="setPage('map')"
                  onclick="window.location.href = '/?page=map'">{{__('Map')}}</span>
            <span class="radio" wire:click="setPage('radio')"
                  onclick="window.location.href = '/?page=radio'">{{__('Radio')}}</span>
        </div>
        <div class="nav-bottom-row">
            <span class="status" id="quests_subpage_nav" onclick="showQuestsSubpage()">{{__('QUESTS')}}</span>
            <span class="off special" id="workshops_subpage_nav" onclick="showWorkshopsSubpage()">{{__('WORKSHOPS')}}</span>
            <span class="off-darker special hidden" id="stats_subpage_nav" onclick="showStatsSubpage()">{{__('STATS')}}</span>
        </div>
    </nav>

    <div class="data-holder">
        <div class="quests-holder inventory-subpage" id="quests_subpage">
            @livewire('pip-boy.data.quests')
        </div>

        <div class="workshops-holder inventory-subpage hidden" id="workshops_subpage">
            <div class="workshops-holder__left">
                <div class="workshops-holder-left__row workshops-holder-left__active">
                    Sanctuary Hills
                </div>
            </div>
            <div class="workshops-holder__right">
                <div class="workshops-holder-right__row">
                    <div class="workshops-holder-right-row__left">
{{--                        <img src="{{asset('images/vault-boy.png')}}" alt="">--}}
                        <span>{{__('People')}}</span>
                    </div>
                    <div class="workshops-holder-right-row__right">
                        8
                    </div>
                </div>
                <div class="workshops-holder-right__row">
                    <div class="workshops-holder-right-row__left">
                        <span></span>
                        <span>{{__('Food')}}</span>
                    </div>
                    <div class="workshops-holder-right-row__right">
                        18
                    </div>
                </div>
                <div class="workshops-holder-right__row">
                    <div class="workshops-holder-right-row__left">
                        <span></span>
                        <span>{{__('Water')}}</span>
                    </div>
                    <div class="workshops-holder-right-row__right">
                        15
                    </div>
                </div>
                <div class="workshops-holder-right__row">
                    <div class="workshops-holder-right-row__left">
                        <span></span>
                        <span>{{__('Power')}}</span>
                    </div>
                    <div class="workshops-holder-right-row__right">
                        13
                    </div>
                </div>
                <div class="workshops-holder-right__row">
                    <div class="workshops-holder-right-row__left">
                        <span></span>
                        <span>{{__('Defence')}}</span>
                    </div>
                    <div class="workshops-holder-right-row__right">
                        33
                    </div>
                </div>
                <div class="workshops-holder-right__row">
                    <div class="workshops-holder-right-row__left">
                        <span></span>
                        <span>{{__('Beds')}}</span>
                    </div>
                    <div class="workshops-holder-right-row__right">
                        24
                    </div>
                </div>
                <div class="workshops-holder-right__row">
                    <div class="workshops-holder-right-row__left">
                        <span></span>
                        <span>{{__('Happiness')}}</span>
                    </div>
                    <div class="workshops-holder-right-row__right">
                        70
                    </div>
                </div>
            </div>
        </div>

        <div class="stats-holder inventory-subpage hidden" id="stats_subpage">

        </div>
    </div>

    @push('scripts')
        <script>
            var questsNav = document.getElementById('quests_subpage_nav');
            var workshopsNav = document.getElementById('workshops_subpage_nav');
            var statsNav = document.getElementById('stats_subpage_nav');

            function showQuestsSubpage()
            {
                questsNav.classList.remove('off');
                questsNav.classList.remove('off-darker');

                workshopsNav.classList.remove('off-darker');
                workshopsNav.classList.add('off');

                statsNav.classList.add('off-darker');
                statsNav.classList.remove('off');

                document.getElementById('quests_subpage').classList.remove('hidden');
                document.getElementById('workshops_subpage').classList.add('hidden');
                document.getElementById('stats_subpage').classList.add('hidden');
            }

            function showWorkshopsSubpage()
            {
                workshopsNav.classList.remove('off');
                workshopsNav.classList.remove('off-darker');

                statsNav.classList.remove('off-darker');
                statsNav.classList.add('off');

                questsNav.classList.remove('off-darker');
                questsNav.classList.add('off');

                document.getElementById('quests_subpage').classList.add('hidden');
                document.getElementById('workshops_subpage').classList.remove('hidden');
                document.getElementById('stats_subpage').classList.add('hidden');
            }

            function showStatsSubpage()
            {
                statsNav.classList.remove('off');
                statsNav.classList.remove('off-darker');

                questsNav.classList.add('off-darker');

                workshopsNav.classList.add('off');

                document.getElementById('quests_subpage').classList.add('hidden');
                document.getElementById('workshops_subpage').classList.add('hidden');
                document.getElementById('stats_subpage').classList.remove('hidden');
            }
        </script>
    @endpush
</div>
