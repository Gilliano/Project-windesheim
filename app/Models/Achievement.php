<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Achievement
 */
class Achievement extends Model
{
    use SoftDeletes;

    protected $table = 'achievements';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'points'
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];


    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'users_has_achievements')
            ->withTimestamps();
    }
}