<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Certificate
 */
class Certificate extends Model
{
    use SoftDeletes;

    protected $table = 'certificates';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'earned_at',
        'valid_until',
        'users_id',
        'privacy_levels_id'
    ];

    protected $guarded = [];

    protected $dates = [
        'earned_at', 'valid_until', 'created_at', 'updated_at', 'deleted_at' ,
    ];



    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function privacyLevel()
    {
        return $this->belongsTo('App\Models\PrivacyLevel');
    }
}