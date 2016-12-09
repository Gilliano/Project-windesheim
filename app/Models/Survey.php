<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use SoftDeletes;

    protected $table = 'surveys';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function persons()
    {
        return $this->belongsToMany('App\Models\Person', 'persons_rate_surveys')
            ->withPivot('rating', 'comment')
            ->withTimestamps();
    }

}
