<?php

namespace App\Http\Livewire\PipBoy\Data;

use App\Models\QuestStep;
use App\Models\UserQuests;
use App\Services\Quests\GettingStartedQuestService;
use Livewire\Component;
use App\Models\Quest as QuestModel;

class Quests extends Component
{
    public $activeQuest;

    public $queryString = [
        'activeQuest'
    ];

    public function render()
    {
        $quests = $this->fetchQuestsForUser();

        return view('livewire.pip-boy.data.quests', compact('quests'));
    }

    private function fetchQuestsForUser()
    {
        (new GettingStartedQuestService(auth()->user()->id))->finishOpenQuestPage();

        $questProgress = UserQuests::where('user_id', auth()->user()->id)->get();
        $quests = QuestModel::all();

        foreach ($quests as $quest) {
            $quest->steps = QuestStep::where('quest_id', $quest->id)->get();
            $quest->steps = $quest->steps->toArray();
            $quest->progress = $questProgress->where('quest_id', $quest->id)->first();
        }

        if (!$this->activeQuest) {
            $activeQuestSetter = $quests->where('progress.quest_finished', 0)->first() ?? $quests->first();
            $this->setQuestActive($activeQuestSetter->id);
        }

        return $quests->toArray();
    }

    public function setQuestActive($questId)
    {
        $this->activeQuest = $questId;
    }
}
