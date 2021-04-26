@extends('layouts.no_menu')

@section('content')
    <div class="work-page" id="work">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{url('/images/logo.jpg')}}" alt="Image"/>
            </a>
        </div>
        <h4 class="title mb-5">{{ $work->title }}</h4>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="carousel" class="carousel slide d-none d-md-block" data-ride="carousel"  data-interval="false">
                        <div class="carousel-inner" role="listbox">
                            @foreach ($imageChunks as $i => $images)
                                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                                    <div class="row">
                                        @if (count($images) > 1)
                                            @foreach ($images as $image)
                                                <div class="col-6">
                                                    <img class="img-fluid" src="{{ Voyager::image($image) }}" alt="First slide">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-12">
                                                <img class="img-fluid" src="{{ Voyager::image($images[0]) }}" alt="First slide">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a class="carousel-control-prev w-auto" href="#carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark border-4 border-dark rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next w-auto" href="#carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                    <div id="carousel2" class="carousel slide d-sm-block d-md-none d-lg-none d-xl-none" data-ride="carousel2"  data-interval="false">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-12">
                                        <img class="img-fluid" src="{{ Voyager::image($work->main_image) }}" alt="Second slide">
                                    </div>
                                </div>
                            </div>

                            @if (!empty($work->images))
                                @foreach (json_decode($work->images) as $image)
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-12">
                                                <img class="img-fluid" src="{{ Voyager::image($image) }}" alt="Second slide">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <a class="carousel-control-prev w-auto" href="#carousel2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark border-4 border-dark rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next w-auto" href="#carousel2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>

                    <div class="description">
                        {!! $work->description !!}
                    </div>
                </div>
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
