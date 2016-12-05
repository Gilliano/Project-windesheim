<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Class extends Model
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
}
