@extends('master')

@section('content')
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ url('/images/mb1.jpg') }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <a href="#GuestSignature" class="btn btn-outline-light my-2 my-sm-0">Our Special Guests</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('/images/mb2.jpg') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <a href="#GuestSignature" class="btn btn-outline-light my-2 my-sm-0">Our Special Guests</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('/images/mb3.jpg') }}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <a href="#GuestSignature" class="btn btn-outline-light my-2 my-sm-0">Our Special Guests</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container" id="GuestSignature">
        <div class="row">
            <div class="col-md-12">
                <signatures></signatures>
            </div>
        </div>
    </div>
@endsection