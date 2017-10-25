<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps=false;

    protected $fillable=[
        'authorName',
    ];

    public function books(){
        return $this->belongsToMany('App\Book');
    }

    public function getBooksPerAuthor($id) {
        return Author::find($id)->books;
    }
}
