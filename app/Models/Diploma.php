<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Diploma
 */
class Diploma extends Model
{
    use SoftDeletes;

    protected $table = 'diplomas';

    public $timestamps = true;

    protected $fillable = [
        'graduated_year',
        'education',
        'education_classcode',
        'persons_id',
        'schools_id',
        'school_name'
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];

    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

    public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }

}