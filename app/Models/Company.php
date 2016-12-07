<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 */
class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
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