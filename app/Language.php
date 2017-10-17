<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps=false;

    protected $fillable=[
        'languageName',
    ];

    public function books(){
        return $this->belongsToMany('App\Book');
    }
}
