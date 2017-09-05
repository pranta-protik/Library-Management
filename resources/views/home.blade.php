@extends('templates.master')

@section('title')
    Home
    @endsection

@section('body')

    <div class="main-wrapper"  >
        <div class="carousel slide"  data-ride="carousel" id="main-carousel" >
            <!-- Indicators -->
            <ol class="carousel-indicators" >
                <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#main-carousel" data-slide-to="1"></li>
                <li data-target="#main-carousel" data-slide-to="2"></li>
                <li data-target="#main-carousel" data-slide-to="3"></li>

            </ol>

            <!-- Slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="img/slide3.jpg" />
                </div>
                <div class="item">
                    <img src="img/slide5.jpg" />
                </div>
                <div class="item">
                    <img src="img/slide6.jpg" />
                </div>
                <div class="item">
                    <img src="img/slide7.jpg" />
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev"></a>
            <a class="right carousel-control"  href="#main-carousel" role="button" data-slide="next"></a>
        </div>
    </div>

@endsection
