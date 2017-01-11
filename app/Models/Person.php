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
        'sex',
        'autobiography',
        'user_id',
        'privacy_level_id'
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
        return $this->hasMany('App\Models\Diploma');
    }

    public function skill()
    {
        return $this->hasMany('App\Models\Skill');
    }

    public function Surveys()
    {
        return $this->belongsToMany('App\Models\Survey', 'persons_rate_surveys')
            ->withPivot('rating', 'comment')
            ->withTimestamps();
    }

    public function rateEducation()
    {
        return $this->belongsToMany('App\Models\Education', 'persons_rate_educations')
            ->withPivot('rating', 'comment')
            ->withTimestamps();
    }

    public function group()
    {
        return $this->belongsToMany('App\Models\Group', 'persons_has_groups')
            ->withPivot('minor')
            ->withTimestamps();
    }
}