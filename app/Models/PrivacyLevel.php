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


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'roles_has_privacy_levels', 'privacy_levels_id' , 'roles_id')
            ->withTimestamps();
    }

    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate', 'id');
    }
        
}