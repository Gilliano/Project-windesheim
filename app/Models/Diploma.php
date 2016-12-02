<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Diploma
 */
class Diploma extends Model
{
    protected $table = 'diplomas';

    public $timestamps = true;

    protected $fillable = [
        'cohort_start',
        'cohort_end',
        'graduated_year',
        'education',
        'education_coordinator',
        'education_classcode',
        'persons_id',
        'school_id',
        'school_name'
    ];

    protected $guarded = [];

        
}