<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UsersInformation
 */
class UserInformation extends Model
{
    use SoftDeletes;
    
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
        'privacy_level_id'
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