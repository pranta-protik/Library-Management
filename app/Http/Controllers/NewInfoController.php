<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Language;
use App\Publication;
use App\Type;

class NewInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.newInfo');
    }

    public function createInfo(){
        if(isset($_GET['key'])){
            if ($_GET['key']=="Author"){
                $author=Author::where('authorName',$_GET['val'])->count();
                if (!$author){
                    Author::create([
                        'authorName'=>$_GET['val'],
                    ]);
                    echo '1';
                }else{
                    echo '0';
                }
            }elseif ($_GET['key']=="Language"){
                $language=Language::where('languageName',$_GET['val'])->count();
                if (!$language){
                    Language::create([
                        'languageName'=>$_GET['val'],
                    ]);
                    echo '1';
                }else{
                    echo '0';
                }

            }elseif ($_GET['key']=="Category"){
                $category=Category::where('categoryName',$_GET['val'])->count();
                if (!$category){
                    Category::create([
                        'categoryName'=>$_GET['val'],
                    ]);
                    echo '1';
                }else{
                    echo '0';
                }

            }elseif ($_GET['key']=="Publication"){
                $publication=Publication::where('publicationName',$_GET['val'])->count();
                if(!$publication){
                    Publication::create([
                        'publicationName'=>$_GET['val'],
                    ]);
                    echo '1';
                }else{
                    echo '0';
                }

            }elseif ($_GET['key']=="Type"){
                $type=Type::where('typeName',$_GET['val'])->count();
                if (!$type){
                    Type::create([
                        'typeName'=>$_GET['val'],
                    ]);
                    echo '1';
                }else{
                    echo '0';
                }

            }
        }
    }
}
