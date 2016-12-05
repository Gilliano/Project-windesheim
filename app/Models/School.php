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

        
}