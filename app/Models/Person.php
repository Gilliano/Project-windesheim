<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 */
class Person extends Model
{
    protected $table = 'persons';

    public $timestamps = true;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'autobiography',
        'users_id',
        'privacy_levels_id',
    ];

    protected $guarded = [];

        
}