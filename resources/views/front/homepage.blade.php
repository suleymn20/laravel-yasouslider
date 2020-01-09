@extends('front.layouts.master')
@section('title','YasouSlider')

@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach ($sliders->slice(0,10) as $slider)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$slider->order}}" class="@if($slider->order==$sliderorder->order) active @endif"></li>
          @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($sliders->slice(0, 10) as $slider)
            <div class="carousel-item @if($slider->order==$sliderorder->order) active @endif" style="background-image: url('{{$slider->image}}')">
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

    </div>
@endsection
