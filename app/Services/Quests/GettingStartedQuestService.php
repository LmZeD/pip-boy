<?php

namespace App\Services\Quests;

use App\Models\UserQuests;

class GettingStartedQuestService
{
    private $questId = 1;
    private $quest;

    public function __construct(int $userId)
    {
        $this->quest = UserQuests::where('user_id', $userId)
            ->where('quest_id', $this->questId)
            ->first();

        if (!$this->quest) {
            $this->quest = UserQuests::create([
                'user_id' => $userId,
                'quest_id' => $this->questId,
            ]);
        }
    }

    public function finishLogInToPipBoy()
    {
        $this->quest->update(['steps_finished' => '1']);
    }

    public function finishOpenQuestPage()
    {
        $this->quest->update([
            'steps_finished' => '1,2',
            'quest_finished' => true,
        ]);
    }
}
