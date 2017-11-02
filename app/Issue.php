<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public $timestamps=false;

    protected $fillable=[
        'user_id', 'book_id', 'issueDate', 'isIssued',
    ];

    protected $dates=[
        'issueDate', 'returnDate',
    ];
}
