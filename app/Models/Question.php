<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $table = 'questions';

    public $timestamps = true;

    protected $fillable = [
        'question',
        'survey_id'
    ];

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];

    public function surveys()
    {
        return $this->belongsTo('App\Models\Survey');
    }

    public function persons()
    {
        return $this->belongsToMany('App\Models\Person', 'persons_has_questions')
            ->withPivot('answer', 'optional')
            ->withTimestamps();
    }

}
