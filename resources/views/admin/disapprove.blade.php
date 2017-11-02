@extends('templates.master')

@section('title')
    Approve
@endsection

@section('body')
    <div class="container myContainer">
        <h3 class="text-center"><b>Block Members</b></h3>
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
                    <th><img src="{{ asset('img/block.png') }}" alt="Disapprove" class="nav-img"></th>
                    <th><img src="{{ asset('img/reject.png') }}" alt="Delete" class="nav-img"></th>
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
                        <form action="/disapprove/{{$user->id}}" method="post">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <td class="text-center">
                                <button type="submit" class="btn-link span-danger" name="disapprove" id="disapprove" onclick="return confirm('sure to block !!')">Block</button>
                            </td>
                        </form>
                        <form action="/disapprove/{{$user->id}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <td class="text-center">
                                <button type="submit" class="btn-link span-danger" name="delete" id="delete" onclick="return confirm('sure to delete !!')">Delete</button>
                            </td>
                        </form>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection