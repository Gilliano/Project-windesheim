<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesHasPrivacyLevel
 */
class RolesHasPrivacyLevel extends Model
{
    protected $table = 'roles_has_privacy_levels';

    public $timestamps = true;

    protected $fillable = [
        'roles_id',
        'privacy_levels_id'
    ];

    protected $guarded = [];

        
}