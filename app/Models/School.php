<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class School
 */
class School extends Model
{
    use SoftDeletes;
    protected $table = 'schools';
    protected $dates = ['deleted_at'];

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