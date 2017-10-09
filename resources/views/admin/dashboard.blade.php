@extends('templates.master')

@section('title')
    Dashboard
@endsection

@section('body')
    <h3 class="text-center"><b>Dashboard</b></h3>
    <div class="container">
        <div class="col-md-3">
            <div class="card">
                <br>
                <h4 class="text-center"><b><a class="text-muted" style="text-decoration: none" href="{{route('register')}}">Register Admin</a></b></h4>
                <br>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <br>
                <h4 class="text-center text-muted"><b><a class="text-muted" style="text-decoration: none" href="{{route('approve')}}">Approve Member</a></b></h4>
                <br>
            </div>
        </div>
    </div>
    <br>
@endsection