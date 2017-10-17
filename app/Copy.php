<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    public $timestamps=false;

    protected $fillable=[
        'book_id','copy',
    ];
}
