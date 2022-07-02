<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuests extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quest_id',
        'steps_finished',
        'quest_finished',
        'is_active',
    ];
}
