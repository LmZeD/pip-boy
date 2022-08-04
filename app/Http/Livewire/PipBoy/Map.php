<?php

namespace App\Http\Livewire\PipBoy;

use App\Http\Livewire\PipBoy;
use App\Models\Quest;
use App\Models\QuestStep;
use App\Models\UserQuests;
use App\Services\Quests\GetToTheCarQuestService;
use Livewire\Component;

class Map extends PipBoy
{
    public $quests;

    public function render()
    {
        (new GetToTheCarQuestService(auth()->user()->id))->finishQuest();
        $this->quests = $this->fetchQuests();

        return view('livewire.pip-boy.map');
    }

    private function fetchQuests()
    {
        $questProgress = UserQuests::where('user_id', auth()->user()->id)->get();
        $quests = Quest::all();

        foreach ($quests as $quest) {
            $quest->steps = QuestStep::where('quest_id', $quest->id)->get();
            $quest->steps = $quest->steps->toArray();
            $quest->progress = $questProgress->where('quest_id', $quest->id)->first();
        }

        return $quests->toArray();
    }
}
