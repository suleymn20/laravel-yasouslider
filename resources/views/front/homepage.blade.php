@extends('front.layouts.master')
@section('title',$config->sitename)

@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach ($sliders->slice(0,$config->ordercount) as $slider)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$slider->order}}" class="@if($slider->order==$sliderorder->order) active @endif"></li>
          @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($sliders->slice(0,$config->ordercount) as $slider)
            <div class="carousel-item @if($slider->order==$sliderorder->order) active @endif" style="background-image: url('{{$slider->image}}')">
                <div class="carousel-caption d-none d-md-block">
                  <div class="fixed-bottom text-right muted">
                      <p> @if($config->copyright==1) &copy @endif @if($config->author==1){{$slider->author}}&nbsp &nbsp @endif</p>
                  </div>
                  <div class="fixed-bottom text-left muted">
                    <p>@if($config->title)&nbsp &nbsp{{$slider->title}}@endif</p>
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
