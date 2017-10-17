@extends('templates.master')

@section('title')
    Approve
@endsection

@section('body')
    <div class="container myContainer">
        <h3 class="text-center"><b>Approve Members</b></h3>
        <hr>
        <div class="panel panel-table">
        <table class="table table-bordered table-striped table-responsive">
            <tr class="table-header">
                <th>Name</th>
                <th>Username</th>
                <th>E-Mail</th>
                <th>Birth date</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact</th>
                <th><img src="img/approve.png" alt="Approve" class="nav-img"></th>
                <th><img src="img/reject.png" alt="Reject" class="nav-img"></th>
            </tr>
            @foreach($users as $user)
                <tr class="table-cell">
                    <td>{{$user->firstName}} {{$user->lastName}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->dob->format('d-m-Y')}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->contact}}</td>
                    <form action="/approve/{{$user->id}}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    <td class="text-center">
                        <button type="submit" class="btn-link span-success" name="approve" id="approve" onclick="return confirm('sure to approve !!')">Approve</button>
                    </td>
                    </form>
                    <form action="/approve/{{$user->id}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    <td class="text-center">
                        <button type="submit" class="btn-link span-danger" name="reject" id="reject" onclick="return confirm('sure to reject !!')">Reject</button>
                    </td>
                    </form>
                </tr>
                @endforeach

        </table>
        </div>
    </div>
@endsection