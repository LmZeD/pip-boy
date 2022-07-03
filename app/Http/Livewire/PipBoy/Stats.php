<?php

namespace App\Http\Livewire\PipBoy;

use App\Http\Livewire\PipBoy;
use App\Models\InventoryItem;
use App\Models\UserInventoryItem;
use Livewire\Component;

class Stats extends PipBoy
{

    public function render()
    {
        $stimpakCount = auth()->user()->getInventoryItemQuantity('Stimpak');
        $radawayCount = auth()->user()->getInventoryItemQuantity('Radaway');

        return view('livewire.pip-boy.stats', [
           'stimpakCount' => $stimpakCount,
           'radawayCount' => $radawayCount,
        ]);
    }

    public function useStimpak()
    {
        $stimpakCount = auth()->user()->getInventoryItemQuantity('Stimpak');
        if ($stimpakCount > 0) {
            $stimpakCount--;
            $stimpaks = UserInventoryItem::where('user_id', auth()->user()->id)
                ->where('inventory_item_id', InventoryItem::where('title', 'Stimpak')->first()->id)
                ->first();

            $stimpaks->update([
                'quantity' => $stimpakCount,
            ]);
        }
    }

    public function useRadaway()
    {
        $radawayCount = auth()->user()->getInventoryItemQuantity('Radaway');
        if ($radawayCount > 0) {
            $radawayCount--;
            $radaway = UserInventoryItem::where('user_id', auth()->user()->id)
                ->where('inventory_item_id', InventoryItem::where('title', 'Radaway')->first()->id)
                ->first();

            $radaway->update([
                'quantity' => $radawayCount,
            ]);
        }
    }
}
