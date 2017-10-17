<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps=false;

    protected $fillable=[
        'bookName', 'category_id', 'publication_id', 'type_id', 'like', 'isIssued','bookImage','edition','published_at',
    ];

    public function authors(){
        return $this->belongsToMany('App\Author');
    }

    public function languages(){
        return $this->belongsToMany('App\Language');
    }
}
