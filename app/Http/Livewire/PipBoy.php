<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Services\Quests\GettingStartedQuestService;
use Livewire\Component;

class PipBoy extends Component
{
    public $page;

    protected $queryString = [
        'page',
    ];

    public function __construct($id = null)
    {
        if (!$this->page) {
            $this->page = 'stats';
        }

        parent::__construct($id);
    }

    public function render()
    {
        (new GettingStartedQuestService(auth()->user()->id))->finishLogInToPipBoy();

        return view('livewire.pip-boy', [
            'page' => $this->page
        ]);
    }

    public function setPage(string $page)
    {
        $this->page = $page;
        $this->dispatchBrowserEvent('refresh-page');
    }
}
