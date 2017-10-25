@extends('templates.master')

@section('title')
    Dashboard
@endsection

@section('body')
    <div class="container myContainer">
        <h3 class="text-center"><b>Dashboard</b></h3>
        <hr>
        <div class="col-md-3" style="margin-bottom: 4vh">
            <div class="card">
                <br>
                <h4 class="text-center"><b><a class="text-muted text-dashboard" href="{{route('register')}}">Register Admin</a></b></h4>
                <br>
            </div>
        </div>
        <div class="col-md-3" style="margin-bottom: 4vh">
            <div class="card">
                <br>
                <h4 class="text-center text-muted"><b><a class="text-muted text-dashboard" href="{{route('approve')}}">Approve Member</a></b></h4>
                <br>
            </div>
        </div>
        <div class="col-md-3" style="margin-bottom: 4vh">
            <div class="card">
                <br>
                <h4 class="text-center text-muted"><b><a class="text-muted text-dashboard" href="{{route('newInfo')}}">Add New Books</a></b></h4>
                <br>
            </div>
        </div>
        <div class="col-md-3" style="margin-bottom: 4vh">
            <div class="card">
                <br>
                <h4 class="text-center text-muted"><b><a class="text-muted text-dashboard" href="{{route('issue')}}">Issue Books</a></b></h4>
                <br>
            </div>
        </div>
    </div>
    <br>
@endsection