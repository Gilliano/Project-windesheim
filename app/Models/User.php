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

    public function achievement()
    {
        return $this->belongsToMany('App\Models\Achievement', 'users_has_achievements' , 'users_id', 'Achievements_id')
            ->withTimestamps();
    }

        
}