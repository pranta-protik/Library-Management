@extends('templates.master')

@section('body')
    <div class="container myContainer">
        <div class="col-md-4 col-md-offset-4">
            {{--<h4 class="text-center" align="center"><strong>Read About Us</strong></h4>--}}
            <div class="card">
                <a class="card-a">
                    <img src="{{ asset('img/location.png') }}"  height="250px" width="150px" class="card-img">

                </a>
                <br>
            </div>
            <br>
            <br>
        </div>
        <div class="container myContainer">
            <div class="row">
            <div class="col-md-6">
                <h3 style="color: #5cb85c">Opening Time</h3>
                <br>
                <p>Tuesday:5PM-9 PM</p>
                <p> Wednesday:5PM-9PM</p>
                <p> Tuesday:5PM-9PM</p>
                <p> Thursday:5PM-9PM</p>
                <p> Friday:9AM-9PM</p>
                <p> saturday:5PM-9PM</p>
                <p> sunday:5PM-9PM</p>
            </div>
            <div class="col-md-6 text-right">
                <h3 style="color: #5cb85c">Address</h3>
                <br>
                <h4>Khulna 9100,Bangladesh</h4>
                <h4>K.D GHOSH road</h4>
                <h4>phone:01721342423</h4>
            </div>
            </div>

        </div>

        </div>

    @endsection