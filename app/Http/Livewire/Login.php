<?php

namespace App\Http\Livewire;

use App\Models\InventoryItem;
use App\Models\User;
use App\Models\UserQuests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;

    public function render()
    {
        return view('livewire.login');
    }

    public function registerOrLogin()
    {
        $user = User::where('name', $this->username)->first();

        if (!$user) {
            $user = User::create([
                'name'     => $this->username,
                'email'    => sprintf('%s@%s.com', $this->username, $this->username),
                'password' => bcrypt(random_bytes(10000)),
            ]);
            $this->addInitialItems($user);
            $this->setUpQuests($user);
        }

        Auth::login($user, true);

        return redirect(route('pip-boy'));
    }

    private function addInitialItems(User $user)
    {
        $user->addItemToUser(InventoryItem::where('title', 'Stimpak')->first(), 10);
        $user->addItemToUser(InventoryItem::where('title', '10mm Pistol')->first(), 1, true);
        $user->addItemToUser(InventoryItem::where('title', '10mm')->first(), 50);
        $user->addItemToUser(InventoryItem::where('title', 'Radaway')->first(), 3);
        $user->addItemToUser(InventoryItem::where('title', 'Nuka Cola')->first(), 4);
        $user->addItemToUser(InventoryItem::where('title', 'Caps')->first(), 7);
        $user->addItemToUser(InventoryItem::where('title', 'Fragmentation Grenade')->first(), 2);
    }

    private function setUpQuests(User $user)
    {
        UserQuests::create([
            'user_id' => $user->id,
            'quest_id' => 3,
            'is_active' => 0,
        ]);

        UserQuests::create([
            'user_id' => $user->id,
            'quest_id' => 4,
            'is_active' => 0,
        ]);

        UserQuests::create([
            'user_id' => $user->id,
            'quest_id' => 5,
            'is_active' => 0,
        ]);

        UserQuests::create([
            'user_id' => $user->id,
            'quest_id' => 6,
            'is_active' => 0,
        ]);

        UserQuests::create([
            'user_id' => $user->id,
            'quest_id' => 7,
            'is_active' => 0,
        ]);
    }
}
