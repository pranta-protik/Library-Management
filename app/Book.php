<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps=false;

    protected $fillable=[
        'serialNo','bookName', 'language_id', 'category_id', 'publication_id', 'type_id','bookImage','edition','published_at',
    ];

    protected $dates=[
        'published_at',
    ];

    public function authors(){
        return $this->belongsToMany('App\Author');
    }

    public function getAuthorsPerBook($id) {
        return Book::find($id)->authors;
    }
}
