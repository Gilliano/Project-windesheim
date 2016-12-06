<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class School
 */
class School extends Model
{
    protected $table = 'schools';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'address',
        'address_number',
        'city',
        'zip_code',
        'telephone_number',
        'email'
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];

    public function educations()
    {
        return $this->hasMany('App\Models\Education');
    }

    public function diplomas()
    {
        return $this->hasMany('App\Models\Diploma');
    }
}