@extends('templates.master')

@section('title')
    Book
@endsection

@section('body')
    <div class="container myContainer">
        <h3 class="text-center"><b>Borrowed Books</b></h3>
        <hr>
        <div class="panel panel-table">
            <table class="table table-bordered table-striped table-responsive">
                <tr class="table-header">
                    <th>Book Name</th>
                    <th>Serial No</th>
                    <th>Status</th>
                </tr>
                @foreach($issues as $issue)
                    <tr class="table-cell">
                        <td>{{\App\Book::find($issue->book_id)->bookName}}</td>
                        <td>{{ \App\Book::find($issue->book_id)->serialNo }}</td>
                        @if($issue->isIssued)
                            <td class="text-success">
                                {{ 'Accepted' }}
                            </td>

                        @else
                            <td class="text-warning">
                                {{ 'Pending' }}
                            </td>
                        @endif
                    </tr>
                @endforeach

            </table>
        </div>
        <div class="text-center">
            {{ $issues->links() }}
        </div>
    </div>
    @endsection
