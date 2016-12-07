<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Job
 */
class Job extends Model
{
    use SoftDeletes;

    protected $table = 'jobs';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'address',
        'address_number',
        'zip_code',
        'city',
        'function',
        'salary_min',
        'salary_max',
        'started_at',
        'current_job',
        'persons_id',
        'privacy_levels_id'
    ];

    protected $guarded = [];

    protected $dates = [
        'started_at', 'created_at', 'updated_at', 'deleted_at' ,
    ];


    public function privacyLevel()
    {
        return $this->belongsTo('App\Models\PrivacyLevel');
    }

    public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }
        
}