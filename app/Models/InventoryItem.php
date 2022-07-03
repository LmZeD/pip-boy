<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'damage',
        'ammo_type',
        'range',
        'accuracy',
        'weight',
        'value',
        'image_name',
        'fire_rate',
    ];
}
