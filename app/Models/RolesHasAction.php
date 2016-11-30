<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesHasAction
 */
class RolesHasAction extends Model
{
    protected $table = 'roles_has_actions';

    public $timestamps = true;

    protected $fillable = [
        'roles_id',
        'actions_id'
    ];

    protected $guarded = [];

        
}