<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Person
 */
class Person extends Model
{
    use SoftDeletes;

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

    protected $dates = ['deleted_at'];

    public function privacyLevel()
    {
        return $this->belongsTo('App\Models\PrivacyLevel', 'privacy_levels_id');
    }
}