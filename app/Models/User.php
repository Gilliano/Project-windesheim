<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 */
class User extends Model
{
    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'email',
        'password',
        'roles_id',
        'remember_token'
    ];

    protected $guarded = [];

    public function getRole()
    {
        return $this->belongsTo('App\Models\Role', 'roles_id');
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company', 'id');
    }
    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate', 'id');
    }

    public function achievements()
    {
        return $this->belongsToMany('App\Models\Achievement', 'users_has_achievements' , 'users_id', 'achievements_id')
            ->withTimestamps();
    }

    public function actions()
    {
        return $this->belongsToMany('App\Models\Actions', 'users_has_actions' , 'users_id', 'actions_id')
            ->withTimestamps();
    }

        
}