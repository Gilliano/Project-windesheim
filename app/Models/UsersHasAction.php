<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersHasAction
 */
class UsersHasAction extends Model
{
    protected $table = 'users_has_actions';

    public $timestamps = true;

    protected $fillable = [
        'users_id',
        'actions_id'
    ];

    protected $guarded = [];

        
}