<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Achievement
 */
class Achievement extends Model
{
    protected $table = 'achievements';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'points'
    ];

    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'users_has_achievements' , 'achievements_id', 'users_id')
            ->withTimestamps();
    }
}