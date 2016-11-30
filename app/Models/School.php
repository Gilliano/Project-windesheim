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
        'address',
        'address_number',
        'zip_code',
        'telephone_number',
        'email',
        'city'
    ];

    protected $guarded = [];

        
}