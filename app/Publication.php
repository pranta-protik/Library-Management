<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    public $timestamps=false;

    protected $fillable=[
        'publicationName',
    ];
}
