<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_finished',
        'asset_url',
        'latitude',
        'longitude',
        'map_icon',
    ];
}
