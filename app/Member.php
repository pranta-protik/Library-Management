<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps=false;

    protected $fillable=[
        'user_id', 'hasPaid', 'profession', 'institution',
    ];

}
