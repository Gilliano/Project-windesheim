<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'school_id',
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];

    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }
}
