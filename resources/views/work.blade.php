@extends('layouts.no_menu')

@section('content')
    <div class="work-page" id="work">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{url('/images/logo.jpg')}}" alt="Image"/>
            </a>
        </div>
        <h1 class="title">{{ $work->title }}</h1>
{{--        <div class="image-wrapper">--}}
{{--            <div class="image">--}}
{{--                <img src="{{ Voyager::image($work->main_image) }}" />--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="container">
            <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{ Voyager::image($work->main_image) }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ Voyager::image($work->main_image) }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ Voyager::image($work->main_image) }}" alt="Third slide">
                    </div>
                </div>

            </div>

            <div class="description">
                {!! $work->description !!}
            </div>
        </div>

        <div class="close-icon">
            <a href="{{ route('index') }}">
                <svg viewbox="0 0 40 40">
                    <path class="close-x" d="M 10,10 L 30,30 M 30,10 L 10,30" />
                </svg>
            </a>
        </div>
    </div>
@endsection

<script>
    window.addEventListener('resize', this.getWindowHeight);

    var elem = '';
    var context = this;
    document.addEventListener("DOMContentLoaded", function() {
        elems = document.querySelectorAll('#carousel .carousel-inner img');
        context.getWindowHeight();
    });
    function getWindowHeight(event) {
        windowHeight = document.documentElement.clientHeight * 0.7;
        elems.forEach((elem) => elem.style.maxHeight = windowHeight + 'px');
    }
</script>