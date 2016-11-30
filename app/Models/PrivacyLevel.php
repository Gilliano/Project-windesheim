<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PrivacyLevel
 */
class PrivacyLevel extends Model
{
    protected $table = 'privacy_levels';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $guarded = [];

        
}