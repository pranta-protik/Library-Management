<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Copy;
use App\Language;
use App\Publication;
use App\Type;
use Illuminate\Http\Request;

class NewBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categories=Category::all();
        $languages=Language::all();
        $publications=Publication::all();
        $types=Type::all();
        return view('admin.newBook',compact('categories','languages','publications','types'));
    }

    public function authorDDL(){
        $authors=Author::all();
        for($i=0;$i<$_GET['val'];$i++){
            $dropdown=null;
            $dropdown.='<div class="form-group">';
            $dropdown.='<label for="author';
            $dropdown.=$i;
            $dropdown.='" class="col-md-4 control-label">Author';
            $dropdown.=' ';
            $dropdown.=$i+1;
            $dropdown.=' :</label>';
            $dropdown.='<div class="col-md-6">';
            $dropdown.='<select name="author';
            $dropdown.=$i;
            $dropdown.='" id="author';
            $dropdown.=$i;
            $dropdown.='" class="form-control" required>';
            $dropdown.='<option value="" selected="selected" disabled>Select Author</option>';
            foreach ($authors as $author){
                $dropdown.='<option value="';
                $dropdown.=$author->id;
                $dropdown.='">';
                $dropdown.=$author->authorName;
                $dropdown.='</option>';
            }
            $dropdown.='</select>';
            $dropdown.='</div>';
            $dropdown.='</div>';

            echo $dropdown;
        }
    }

    public function create(Request $request){

        $destinationPath=null;
        $name=null;
        if ($request->hasFile('bookImage')) {

            $this->validate($request, [
                'bookImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('bookImage');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'img/bookCover';
            $image->move($destinationPath, $name);

            Book::create([
                'serialNo'=>$request->serialNo,
                'bookImage' => $destinationPath . '/' . $name,
                'bookName' => $request->bookName,
                'language_id'=>$request->language,
                'category_id' => $request->category,
                'publication_id' => $request->publication,
                'type_id' => $request->type,
                'edition' => $request->edition,
                'published_at' => $request->dop,
                'rating' => 0,
            ]);

            $book = Book::orderBy('id', 'desc')->first();
            Copy::create([
                'book_id' => $book->id,
                'copy' => $request->nob,
            ]);

            for ($i = 0; $i < $request->noa; $i++) {
                $aid = 'author' . $i;
                $author = Author::find($request->$aid);
                $book->authors()->save($author);
            }
        }
        return back();
    }
}
