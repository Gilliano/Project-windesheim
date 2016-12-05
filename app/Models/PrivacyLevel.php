<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PrivacyLevel
 */
class PrivacyLevel extends Model
{
    protected $table = 'privacy_levels';

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
        return $this->belongsToMany('App\Models\Role', 'roles_has_privacy_levels')
            ->withTimestamps();
    }

    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate');
    }

    public function usersInformation()
    {
        return $this->hasMany('App\Models\UserInformation');
    }

    public function companies()
    {
        return $this->hasMany('App\Models\Company');
    }

    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }

    public function persons()
    {
        return $this->hasMany('App\Models\Person');
    }
        
}