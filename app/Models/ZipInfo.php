<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZipInfo extends Model
{
    protected $table = 'zip_info';
    public $timestamps = true;
    protected $fillable = [
        "zip_code",
        "city",
        "alt_name",
        "town",
        "district",
        "netnumber",
        "latitude",
        "longitude",
        "types"
    ];
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at' ,
    ];
}
