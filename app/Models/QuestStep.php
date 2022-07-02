<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'quest_id',
        'title',
        'description',
    ];
}
