<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Action
 */
class Action extends Model
{
    protected $table = 'actions';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $guarded = [];

        
}