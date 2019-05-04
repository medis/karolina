@extends('layouts.main')

@section('content')
    <gallery></gallery>
{{--    @foreach ($works as $work)--}}
{{--        <strong>{{ $work->title }}</strong>--}}
{{--        <div>{!!  $work->description !!}</div>--}}
{{--        <div>--}}
{{--            <strong>Main image</strong>--}}
{{--            <div><img src="{{ Voyager::image($work->thumbnail('medium', 'main_image')) }}" /></div>--}}

{{--            <strong>Rest of the images</strong>--}}
{{--            @foreach(json_decode($work->images) as $image)--}}
{{--                <div><img src="{{ Voyager::image($work->getThumbnail($image, 'small')) }}" /></div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endforeach--}}
@endsection