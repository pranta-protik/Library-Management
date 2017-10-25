<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BrowseBookController extends Controller
{
    public function index(){
        $books=Book::orderBy('bookName','asc')->paginate(8);
        return view('browse',compact('books'));
    }
}
