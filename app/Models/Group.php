<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $table = 'groups';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'coordinator',
        'cohort_start',
        'cohort_end',
        'started_amount',
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

    public function person()
    {
        return $this->belongsToMany('App\Models\Person', 'persons_has_groups')
            ->withPivot('minor')
            ->withTimestamps();
    }
}
