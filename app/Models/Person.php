<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 */
class Person extends Model
{
    protected $table = 'persons';

    public $timestamps = true;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'autobiography',
        'users_id',
        'privacy_levels_id',
    ];

    protected $guarded = [];


    public function privacyLevel()
    {
        return $this->belongsTo('App\Models\PrivacyLevel', 'privacy_levels_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }

    public function job()
    {
        return $this->hasMany('App\Models\Job', 'id');
    }
}