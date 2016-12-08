<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use SoftDeletes;

    protected $table = 'educations';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'length',
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

    public function personsRating()
    {
        return $this->belongsToMany('App\Models\Person', 'persons_rate_educations')
            ->withPivot('rating', 'comment')
            ->withTimestamps();
    }
}
