<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EducationCollection extends Model
{
    use SoftDeletes;

    protected $table = 'educations_collection';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];

    public function educations()
    {
        return $this->hasMany('App\Models\Education');
    }

}
