<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function inventoryItems()
    {
        return $this->hasManyThrough(InventoryItem::class,
            UserInventoryItem::class,
            'user_id',
            'id',
            'id',
            'inventory_item_id'
        );
    }

    public function getInventoryItemQuantity($item)
    {
        if (is_int($item)) {
            $itemObject = UserInventoryItem::where('user_id', $this->id)->where('inventory_item_id', $item)->first();
        } else {
            $foundItem = InventoryItem::where('title', $item)->first();

            if (!$foundItem) {
                return 0;
            }
            $itemObject = UserInventoryItem::where('user_id', $this->id)->where('inventory_item_id', $foundItem->id)->first();
        }

        return $itemObject ? $itemObject->quantity : 0;
    }

    public function addItemToUser(InventoryItem $item, int $quantity = 1, bool $equipped = false)
    {
        UserInventoryItem::create([
            'user_id' => $this->id,
            'inventory_item_id' => $item->id,
            'quantity' => $quantity,
            'is_equipped' => $equipped,
        ]);
    }

    public function isItemEquipped(int $itemId)
    {
        $itemObject = UserInventoryItem::where('user_id', $this->id)->where('inventory_item_id', $itemId)->first();

        if ($itemObject && $itemObject->is_equipped) {
            return true;
        }

        return false;
    }
}
