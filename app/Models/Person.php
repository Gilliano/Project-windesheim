<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Person
 */
class Person extends Model
{
    use SoftDeletes;

    protected $table = 'persons';

    public $timestamps = true;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'autobiography',
        'users_id',
        'privacy_levels_id',
        'classes_id'
    ];

    protected $guarded = [];

    protected $dates = [
        'birthday', 'created_at', 'updated_at', 'deleted_at' ,
    ];


    public function privacyLevel()
    {
        return $this->belongsTo('App\Models\PrivacyLevel');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function coordinatorGroup()
    {
        return $this->hasMany('App\Models\Group');
    }

    public function job()
    {
        return $this->hasMany('App\Models\Job');
    }

    public function diploma()
    {
        return $this->hasMany('App\Models\Dimploma');
    }
}