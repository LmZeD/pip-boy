<?php

namespace App\Http\Livewire\PipBoy;

use App\Http\Livewire\PipBoy;

class Inventory extends PipBoy
{
    public $inventoryItems;

    public function render()
    {
        $this->inventoryItems = auth()->user()->inventoryItems;
        $weight = 0;

        foreach ($this->inventoryItems  as $inventoryItem) {
            $weight += $inventoryItem['weight'] * auth()->user()->getInventoryItemQuantity($inventoryItem['id']);
        }

        return view('livewire.pip-boy.inventory', [
            'inventoryItems' => $this->inventoryItems,
            'weight' => $weight,
        ]);
    }
}
