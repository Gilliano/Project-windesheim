<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 */
class Role extends Model
{
    protected $table = 'roles';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $guarded = [];

    public function getUsers()
    {
       return $this->hasMany('App\Models\User', 'id');
    }

    public function actions()
    {
        return $this->belongsToMany('App\Models\Action', 'roles_has_actions' , 'roles_id', 'actions_id')
            ->withTimestamps();
    }

    public function privacyLevels()
    {
        return $this->belongsToMany('App\Models\PrivacyLevel', 'roles_has_privacy_levels' , 'roles_id', 'privacy_levels_id')
            ->withTimestamps();
    }
}