@extends('templates.master')

@section('title')
    Book
@endsection

@section('body')
    <div class="container myContainer">
        <div class="col-md-12">
            <div class="panel panel-table">
                <table class="table table-bordered table-striped table-responsive">
                    <tr class="table-header">
                        <th>Member Name</th>
                        <th>Book Name</th>

                        <th>Eligibility</th>
                        <th><img src="{{ asset('img/approve.png') }}" alt="Issue" class="nav-img"></th>
                        <th><img src="{{ asset('img/receive.png') }}" alt="Receive" class="nav-img"></th>
                        <th><img src="{{ asset('img/reject.png') }}" alt="Reject" class="nav-img"></th>
                    </tr>
                    @foreach($issues as $issue)
                        <tr class="table-cell">
                            <td>{{\App\User::find($issue->user_id)->firstName}} {{ \App\User::find($issue->user_id)->lastName }}</td>
                            <td>{{\App\Book::find($issue->book_id)->bookName}}</td>

                            @if(\App\Member::where('user_id',$issue->user_id)->first()->hasPaid)
                                <td class="text-success">
                                    {{ 'Eligible' }}
                                </td>

                            @else
                                <td class="text-danger">
                                    {{ 'Not Eligible' }}
                                </td>
                            @endif
                            @if(\App\Member::where('user_id',$issue->user_id)->first()->hasPaid)
                            @if($issue->isIssued)
                                <td class="text-center text-success">Issued</td>
                            @else
                                <form action="/issue/{{$issue->id}}" method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <td class="text-center">
                                        <button type="submit" class="btn-link span-success" name="issue" id="issue" onclick="return confirm('sure to issue !!')">Issue</button>
                                    </td>
                                </form>
                            @endif
                            @if($issue->isIssued)
                            <form action="/issue/{{$issue->id}}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <td class="text-center">
                                    <button type="submit" class="btn-link span-info" name="receive" id="receive" onclick="return confirm('sure to receive !!')">Receive</button>
                                </td>
                            </form>
                                @else
                                <td class="text-center text-info">Receive</td>
                            @endif
                            @else
                                <td class="text-center text-danger">----</td>
                                <td class="text-center text-danger">----</td>
                            @endif
                            @if($issue->isIssued)
                                <td class="text-center text-danger">Reject</td>
                            @else
                            <form action="/issue/{{$issue->id}}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <td class="text-center">
                                    <button type="submit" class="btn-link span-danger" name="reject" id="reject" onclick="return confirm('sure to reject !!')">Reject</button>
                                </td>
                            </form>
                                @endif
                        </tr>
                    @endforeach

                </table>
            </div>
            <div class="text-center">
                {{ $issues->links() }}
            </div>
        </div>
    </div>
    @endsection
