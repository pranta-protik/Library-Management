@extends('templates.master')

@section('title')
    Browse Books
@endsection

@section('body')
    <div class="container myContainer">
        <hr>
        @foreach($books as $book)
        <div class="col-md-3">
            <h4 class="text-center"><strong>{{ $book->bookName }}</strong></h4>
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