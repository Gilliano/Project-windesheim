<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersHasAchievement
 */
class UsersHasAchievement extends Model
{
    protected $table = 'users_has_achievements';

    public $timestamps = true;

    protected $fillable = [
        'users_id',
        'achievements_id'
    ];

    protected $guarded = [];

        
}