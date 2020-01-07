@extends('front.layouts.master')
@section('title','YasouSlider')

@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach ($sliders as $slider)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$slider->order}}" class="@if($slider->order==1) active @endif"></li>
          @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
            <div class="carousel-item @if($slider->order==$slidersorder->order) active @endif" style="background-image: url('{{$slider->image}}')">
                <div class="carousel-caption d-none d-md-block">
                  <div class="fixed-bottom text-right muted">
                      <p>&copy {{$slider->author}}&nbsp &nbsp</p>
                  </div>
                  <div class="fixed-bottom text-left muted">
                    <p>&nbsp &nbsp{{$slider->title}}</p>
                  </div>
                </div>
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection
