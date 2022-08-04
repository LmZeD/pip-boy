<?php

namespace App\Services\Quests;

use App\Models\UserQuests;

class GetToTheCarQuestService
{
    private $questId = 2;
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

    public function finishQuest()
    {
        $this->quest->update([
            'steps_finished' => '1,2',
            'quest_finished' => true,
        ]);

        $nextQuest = UserQuests::where('user_id', $this->quest->user_id)
            ->where('quest_id', 3)->first();

        $nextQuest->update([
            'is_active' => 1
        ]);
    }
}
