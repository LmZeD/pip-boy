<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInventoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'inventory_item_id',
        'quantity',
        'is_equipped',
    ];

    public function inventoryItem()
    {
        return $this->hasOne(InventoryItem::class, 'id', 'inventory_item_id');
    }
}
