@extends('templates.master')

@section('title')
    About
    @endsection

@section('body')
     <div class="container myContainer">
         <div class="main-wrapper"  >
             <div class="col-md-4 col-md-offset-4">
                 {{--<h4 class="text-center" align="center"><strong>Read About Us</strong></h4>--}}
                 <div class="card">
                     <a class="card-a">
                         <img src="{{ asset('img/about.jpg') }}"  class="card-img">

                     </a>
                     <br>
                 </div>
                 <br>
                 <br>
             </div>
             <br>
             <div class="col-md-12">
                 <p>Umesh chandra public library is one of the most popular library in khulna region.It was established
                 in 1897.It is the oldest library.There are several books of several categories in this library.</p>
             </div>


     </div>

     </div>
    @endsection