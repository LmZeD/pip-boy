<div class="quests-holder">
    <div class="quests-left">
        @foreach($quests as $quest)
            @if(!isset($quest['progress']['quest_finished']) || !$quest['progress']['quest_finished'])
                <div class="quests-left-row @if($quest['id'] == $activeQuest)quests-left-row__active @endif"
                wire:click="setQuestActive({{$quest['id']}})">
                    <div>{{ $quest['title'] }}</div>
                </div>
            @endif
        @endforeach
            <hr>
        @foreach($quests as $quest)
            @if(isset($quest['progress']['quest_finished']) && $quest['progress']['quest_finished'])
                <div class="quests-left-row quests-left-row__completed @if($quest['id'] == $activeQuest) quests-left-row__active @endif"
                     wire:click="setQuestActive({{$quest['id']}})">
                    <div>{{ $quest['title'] }}</div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="quests-right">
        @foreach($quests as $quest)
            <div class="quest-description-holder @if($activeQuest != $quest['id']) hidden @endif" id="{{$quest['title']}}">
                <div class="quest-image-holder" id="{{$quest['title']}}_image-holder">
                    <img src="{{asset($quest['asset_url'])}}" alt="">
                </div>
                <div class="quest-description-text-holder hidden" id="{{$quest['title']}}_description-holder">

                </div>
                <div class="quest-steps-holder">
                    @foreach($quest['steps'] as $step)
                        @php(isset($quest['progress']['steps_finished']) ? $stepsFinished = explode(',', $quest['progress']['steps_finished']) : [])
                        <div class="quest-steps-row @if(!in_array($step['id'], $stepsFinished)) quest-steps-row__active @endif">
                            {{$step['title']}}
                            <div class="hidden description-text">
                                {{$step['description']}}
                            </div>
                        </div>
                        @if(!in_array($step['id'], $stepsFinished))
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

    @push('scripts')
        <script>
            function makeQuestRowActive(element, descriptionHolderId) {
                var questRows = document.getElementsByClassName('quests-left-row');
                for (var i = 0; i < questRows.length; i++) {
                    questRows.item(i).classList.remove('quests-left-row__active');
                }

                element.classList.add('quests-left-row__active');

                var descriptionCards = document.getElementsByClassName('quest-description-holder');
                for (var i = 0; i < descriptionCards.length; i++) {
                    descriptionCards.item(i).classList.add('hidden');
                }

                document.getElementById(descriptionHolderId).classList.remove('hidden');
            }
        </script>
    @endpush
</div>
