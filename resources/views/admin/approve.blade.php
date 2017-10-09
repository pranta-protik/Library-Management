@extends('templates.master')

@section('title')
    Approve
@endsection

@section('body')
    <h3 class="text-center"><b>Approve Members</b></h3>
    <div class="container">
        <table class="table table-bordered table-striped table-responsive">
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>E-Mail</th>
                <th>Birth date</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact</th>
                <th class="text-success text-center">Approve</th>
                <th class="text-danger text-center">Reject</th>
            </tr>
            @foreach($users as $user)
                <tr>
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
                        <button type="submit" class="btn-link" name="approve" id="approve" style="color: darkgreen" onclick="return confirm('sure to approve !!')">Approve</button>
                    </td>
                    </form>
                    <form action="/approve/{{$user->id}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    <td class="text-center">
                        <button type="submit" class="btn-link" name="reject" id="reject" style="color: darkred" onclick="return confirm('sure to reject !!')">Reject</button>
                    </td>
                    </form>
                </tr>
                @endforeach

        </table>
    </div>
@endsection