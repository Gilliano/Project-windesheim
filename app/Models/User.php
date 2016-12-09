<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 */
class User extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'email',
        'password',
        'role_id',
        'remember_token'
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];

    public function getRole()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company');
    }

    public function person()
    {
        return $this->hasOne('App\Models\Person');
    }

    public function userInformation()
    {
        return $this->hasOne('App\Models\UserInformation');
    }

    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate');
    }

    public function achievements()
    {
        return $this->belongsToMany('App\Models\Achievement', 'users_has_achievements')
            ->withTimestamps();
    }

    public function actions()
    {
        return $this->belongsToMany('App\Models\Actions', 'users_has_actions')
            ->withTimestamps();
    }

        
}