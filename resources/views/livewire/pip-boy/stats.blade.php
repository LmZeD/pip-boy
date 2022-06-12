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
            <span id="status_subpage_nav" class="status" onclick="showStatusSubpage()">{{__('Status')}}</span>
            <span id="special_subpage_nav" class="off special" onclick="showSpecialSubpage()">{{__('Special')}}</span>
            <span id="perks_subpage_nav" class="off-darker special" onclick="showPerksSubpage()">{{__('Perks')}}</span>
        </div>
    </nav>
    <div class="livewire-holder" id="status_subpage">
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

    <div class="special-subpage-holder" id="special_subpage" style="display: none;">
        <div class="special-left">
            <div class="special-left-row special-left-row__active" onclick="makeSpecialRowActive(this, 'special_strength')">
                <div>{{__('Strength')}}</div>
                <div>{{$specialStats['strength'] ?? 2}}</div>
            </div>
            <div class="special-left-row" onclick="makeSpecialRowActive(this, 'special_perception')">
                <span>{{__('Perception')}}</span>
                <span>{{$specialStats['strength'] ?? 3}}</span>
            </div>
            <div class="special-left-row" onclick="makeSpecialRowActive(this, 'special_endurance')">
                <span>{{__('Endurance')}}</span>
                <span>{{$specialStats['endurance'] ?? 2}}</span>
            </div>
            <div class="special-left-row" onclick="makeSpecialRowActive(this, 'special_charisma')">
                <span>{{__('Charisma')}}</span>
                <span>{{$specialStats['charisma'] ?? 7}}</span>
            </div>
            <div class="special-left-row" onclick="makeSpecialRowActive(this, 'special_intelligence')">
                <span>{{__('Intelligence')}}</span>
                <span>{{$specialStats['intelligence'] ?? 8}}</span>
            </div>
            <div class="special-left-row" onclick="makeSpecialRowActive(this, 'special_agility')">
                <span>{{__('Agility')}}</span>
                <span>{{$specialStats['intelligence'] ?? 3}}</span>
            </div>
            <div class="special-left-row" onclick="makeSpecialRowActive(this, 'special_luck')">
                <span>{{__('Luck')}}</span>
                <span>{{$specialStats['luck'] ?? 10}}</span>
            </div>
        </div>

        <div class="special-right">
            <div id="special_strength" class="special-gif-card">
                <div class="special-right-gif">
                    <img src="{{ asset('images/gifs/strength.gif') }}" alt="">
                </div>
                <div class="special-right-text">
                    {{__('Strength is a measure of your raw physical power. It affects how much you can carry and the damage of all melee attacks')}}
                </div>
            </div>
            <div id="special_perception" style="display: none;" class="special-gif-card">
                <div class="special-right-gif">
                    <img src="{{ asset('images/gifs/perception.gif') }}" alt="">
                </div>
                <div class="special-right-text">
                    {{__('Perception is your environmental awareness and "sixth sense." It affects your weapon accuracy in V.A.T.S.')}}
                </div>
            </div>
            <div id="special_endurance" style="display: none;" class="special-gif-card">
                <div class="special-right-gif">
                    <img src="{{ asset('images/gifs/endurance.gif') }}" alt="">
                </div>
                <div class="special-right-text">
                    {{__('Endurance is a measure of your overall fitness. It affects your total Health and the Action point drain from sprinting.')}}
                </div>
            </div>
            <div id="special_charisma" style="display: none;" class="special-gif-card">
                <div class="special-right-gif">
                    <img src="{{ asset('images/gifs/charisma.gif') }}" alt="">
                </div>
                <div class="special-right-text">
                    {{__('Charisma is your ability to charm and convince others. It affects your success to persuade and prices when you barter.')}}
                </div>
            </div>
            <div id="special_intelligence" style="display: none;" class="special-gif-card">
                <div class="special-right-gif">
                    <img src="{{ asset('images/gifs/intelligence.gif') }}" alt="">
                </div>
                <div class="special-right-text">
                    {{__('Intelligence is a measure of your overall mental acuity and affects the number of Experience Points gained')}}
                </div>
            </div>
            <div id="special_agility" style="display: none;" class="special-gif-card">
                <div class="special-right-gif">
                    <img src="{{ asset('images/gifs/agility.gif') }}" alt="">
                </div>
                <div class="special-right-text">
                    {{__('Agility is measure of your overall finesse and reflexes. It affects the number of Action Points in V.A.T.S. and your ability to sneak.')}}
                </div>
            </div>
            <div id="special_luck" style="display: none;" class="special-gif-card">
                <div class="special-right-gif">
                    <img src="{{ asset('images/gifs/luck.gif') }}" alt="">
                </div>
                <div class="special-right-text">
                    {{__('Luck is a measure of your general good fortune and affects the recharge rate of Critical Hits.')}}
                </div>
            </div>
        </div>

        <div class="hud-holder">
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

    <div class="livewire-holder" id="perks_subpage" style="display: none;">

    </div>
    @push('scripts')
        <script>
            function makeSpecialRowActive(element, gifCardId)
            {
                var specialRows = document.getElementsByClassName('special-left-row');
                for (var i = 0; i < specialRows.length; i++) {
                    specialRows.item(i).classList.remove('special-left-row__active');
                }

                element.classList.add('special-left-row__active');

                var gifCards = document.getElementsByClassName('special-gif-card');
                for (var i = 0; i < gifCards.length; i++) {
                    gifCards.item(i).style = 'display: none;';
                }

                document.getElementById(gifCardId).style= '';
            }

            function showStatusSubpage()
            {
                var statusSubpage = document.getElementById('status_subpage');
                var specialSubpage = document.getElementById('special_subpage');
                var perksSubpage = document.getElementById('perks_subpage');

                statusSubpage.style = '';
                specialSubpage.style = 'display:none;';
                perksSubpage.style = 'display:none;';

                var statusSubpageNav = document.getElementById('status_subpage_nav');
                var specialSubpageNav = document.getElementById('special_subpage_nav');
                var perksSubpageNav = document.getElementById('perks_subpage_nav');

                statusSubpageNav.classList.remove('off');
                statusSubpageNav.classList.remove('off-darker');

                specialSubpageNav.classList.add('off');

                perksSubpageNav.classList.remove('off');
                perksSubpageNav.classList.add('off-darker');
            }
            function showSpecialSubpage()
            {
                var statusSubpage = document.getElementById('status_subpage');
                var specialSubpage = document.getElementById('special_subpage');
                var perksSubpage = document.getElementById('perks_subpage');

                statusSubpage.style = 'display:none;';
                specialSubpage.style = '';
                perksSubpage.style = 'display:none;';

                var statusSubpageNav = document.getElementById('status_subpage_nav');
                var specialSubpageNav = document.getElementById('special_subpage_nav');
                var perksSubpageNav = document.getElementById('perks_subpage_nav');

                statusSubpageNav.classList.add('off');
                statusSubpageNav.classList.remove('off-darker');

                specialSubpageNav.classList.remove('off');

                perksSubpageNav.classList.remove('off-darker');
                perksSubpageNav.classList.add('off');
            }
            function showPerksSubpage()
            {
                var statusSubpage = document.getElementById('status_subpage');
                var specialSubpage = document.getElementById('special_subpage');
                var perksSubpage = document.getElementById('perks_subpage');

                statusSubpage.style = 'display:none;';
                specialSubpage.style = 'display:none;';
                perksSubpage.style = '';

                var statusSubpageNav = document.getElementById('status_subpage_nav');
                var specialSubpageNav = document.getElementById('special_subpage_nav');
                var perksSubpageNav = document.getElementById('perks_subpage_nav');

                statusSubpageNav.classList.remove('off');
                statusSubpageNav.classList.add('off-darker');

                specialSubpageNav.classList.add('off');

                perksSubpageNav.classList.remove('off-darker');
                perksSubpageNav.classList.remove('off');
            }
        </script>
    @endpush
</div>
