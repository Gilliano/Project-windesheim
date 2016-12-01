<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 */
class Company extends Model
{
    protected $table = 'companies';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'users_id',
        'privacy_levels_id'
    ];

    protected $guarded = [];


    public function privacyLevel()
    {
        return $this->belongsTo('App\Models\PrivacyLevel', 'privacy_levels_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
        
}