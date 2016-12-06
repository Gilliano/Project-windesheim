<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'coordinator',
        'cohort_start',
        'cohort_end',
        'education_id'
    ];

    protected $guarded = [];

    protected $dates = [
        'cohort_start', 'cohort_end', 'created_at', 'updated_at', 'deleted_at' ,
    ];

    public function education()
    {
        return $this->belongsTo('App\Models\Education');
    }

    public function coordinator()
    {
        return $this->belongsTo('App\Models\Person');
    }

    public function persons()
    {
        return $this->hasMany('App\Models\Person');
    }
}
