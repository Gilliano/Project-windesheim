<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersInformation
 */
class UsersInformation extends Model
{
    protected $table = 'users_information';

    public $timestamps = true;

    protected $fillable = [
        'address',
        'address_number',
        'city',
        'zip_code',
        'alternative_email',
        'mobile_number',
        'additional_number',
        'users_id',
        'privacy_levels_id'
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];

    public function privacyLevel()
    {
        return $this->belongsTo('App\Models\PrivacyLevel');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
        
}