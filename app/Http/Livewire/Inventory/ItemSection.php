<?php

namespace App\Http\Livewire\Inventory;

use App\Http\Livewire\PipBoy\Inventory;
use Livewire\Component;

class ItemSection extends Inventory
{
    public $items;
    public $activeItem;

    public function render()
    {
        if (!$this->items) {
            $this->activeItem = -1;
        }

        if (!$this->activeItem && $this->items) {
            $this->activeItem = $this->items->first() ? $this->items->first()->id : -1;
        }

        return view('livewire.inventory.item-section');
    }

    public function makeItemActive(int $itemId)
    {
        $this->activeItem = $itemId;
    }
}

