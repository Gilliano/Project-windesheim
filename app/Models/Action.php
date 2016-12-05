<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Action
 */
class Action extends Model
{
    protected $table = 'actions';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'roles_has_actions')
            ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'users_has_actions')
            ->withTimestamps();
    }

        
}