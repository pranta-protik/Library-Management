@extends('templates.master')

@section('title')
    Browse Books
@endsection

@section('body')
    <div class="container myContainer">
        <div class="col-md-4 col-md-offset-8">
            <div class="col-md-10" style="margin-left: 2vh">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
            </div>
            <button name="btnSearch" id="btnSearch" class="btn btn-default" onclick="searchJS();">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </div>
        <br>
        <hr>
        @foreach($books as $book)
        <div class="col-md-3 bookName">
            <h4 class="text-center"><strong>{{ $book->bookName }}</strong></h4>
            <h5 class="text-center">({{ \App\Language::find($book->language_id )->languageName }} Version)</h5>
            <h1 hidden="hidden">{{ \App\Category::findOrFail($book->category_id)->categoryName }}</h1>
            <h2 hidden="hidden">{{ \App\Publication::findOrFail($book->publication_id)->publicationName }}</h2>
            <h3 hidden="hidden">{{ \App\Type::findOrFail($book->type_id)->typeName }}</h3>
            @foreach($book->getAuthorsPerBook($book->id)  as $author)
                <h6 hidden="hidden">{{ $author->authorName }}</h6>
            @endforeach
            <div class="card browse-card">
                <a href="/book/{{ $book->id }}" class="card-a">
                    <img src="{{ asset($book->bookImage) }}" alt="Cover" class="card-img">
                </a>
            </div>
            <br>
            <br>
        </div>
        @endforeach
        <div class="col-md-12 text-center">
        {{ $books->links() }}
        </div>
    </div>
    @endsection

@section('script')
    <script>
        function searchJS() {
            var input,div,val,h4,h5,h1,h2,h3,h6,author;
            input = document.getElementById("search");
            val=input.value;

            div=document.getElementsByClassName('bookName');

            for (i = 0; i < div.length; i++) {
                h4=div[i].getElementsByTagName("h4")[0];
                h5=div[i].getElementsByTagName("h5")[0];
                h1=div[i].getElementsByTagName("h1")[0];
                h2=div[i].getElementsByTagName("h2")[0];
                h3=div[i].getElementsByTagName("h3")[0];
                h6=div[i].getElementsByTagName("h6");
                author=0;
                for(j=0;j<h6.length;j++){
                    if(h6[j].innerText.indexOf(val)>-1){
                        author=1;
                    }
                }
                if (h4.innerText.indexOf(val)>-1||h5.innerText.indexOf(val)>-1||h1.innerText.indexOf(val)>-1||
                    h2.innerText.indexOf(val)>-1||h3.innerText.indexOf(val)>-1||author) {
                    div[i].style.display = "";
                }else {
                    div[i].style.display="none";
                }
            }

        }
    </script>

    @endsection