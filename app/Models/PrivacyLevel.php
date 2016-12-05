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
        return $this->belongsToMany('App\Models\Role', 'roles_has_privacy_levels', 'privacy_level_id' , 'role_id')
            ->withTimestamps();
    }

    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate', 'id');
    }
        
}