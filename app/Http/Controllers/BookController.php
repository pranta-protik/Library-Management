<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Copy;
use App\Issue;
use App\Language;
use App\Publication;
use App\Type;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index($id){
        $book=Book::find($id);
        $authors=$book->getAuthorsPerBook($book->id);

        //Author DDL
        $authorList=Author::all();

        //Language DDL
        $languages=Language::all();
        $language=Language::find($book->language_id);

        //Category DDL
        $categories=Category::all();
        $category=Category::find($book->category_id);

        //Publication DDL
        $publications=Publication::all();
        $publication=Publication::find($book->publication_id);

        //Type DDL
        $types=Type::all();
        $type=Type::find($book->type_id);

        //Copy
        $copy=Copy::where('book_id',$book->id)->first();

        //Available
        $available1=Copy::where('book_id',$book->id)->first();
        $available2=Issue::where('book_id',$book->id)->count();
        $available=$available1->copy-$available2;

        //Eligible
        if (auth()->user()){
            $eligible=Issue::where('user_id',auth()->user()->id)->count();
        }

        return view('book',compact('book','authorList','authors','language','languages','category','categories','publication','publications','type','types','copy','available','eligible'));
    }

    public function update(Request $request,$id){
        $book=Book::findOrFail($id);

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if (file_exists($book->bookImage)){
                \File::delete($book->bookImage);
            }
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'img/bookCover';
            $image->move($destinationPath, $name);
            $book->update(['bookImage'=>$destinationPath.'/'.$name]);
            return back();
        }
        
        $book->update([
            'serialNo'=>$request->serialNo,
            'bookName'=>$request->bookName,
            'language_id'=>$request->language,
            'category_id'=>$request->category,
            'publication_id'=>$request->publication,
            'type_id'=>$request->type,
            'edition'=>$request->edition,
            'published_at'=>$request->published_at,
        ]);

        $copy=Copy::where('book_id',$book->id)->first();

        $copy->update([
            'copy'=>$request->copy,
        ]);

        if(isset($_POST['author'])&&$_POST['author']!=null){
            $author = Author::find($request->author);
            $book->authors()->save($author);
        }

        return back();
    }

    public function delete($id){
        if(isset($_POST['delAuthor'])){
            \DB::statement('delete from author_book where author_id='.$_POST['delAuthor']);
            return back();
        }
        $book=Book::findOrFail($id);
        if (isset($_POST['delete'])){
            if (file_exists($book->bookImage)){
                \File::delete($book->bookImage);
            }
            $book->delete();
            return redirect('\browse');
        }

    }

    public function borrow($id){

        Issue::create([
            'user_id'=>auth()->user()->id,
            'book_id'=>$id,
            'isIssued'=>false,
        ]);

        return back();
    }
}
