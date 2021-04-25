@extends('layouts.main')

@section('content')
    <div class="container page-about">
        <div class="left">
            <h1>{{ $title }}</h1>
            {!!  $content !!}
        </div>
        <div class="contacts">
            <div>
                <div class="email">
                    <span class="icon">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" width="125" height="100" viewBox="0 0 125 100">
                            <path d="M60,0 l50,0 a10,10 0 0,1 7,17 l-50,50 a10,10 0 0,1 -13,0 l-50,-50 a10,10 0 0,1 7,-17z" stroke="#000" stroke-width="0" fill="#000" />
                            <path d="M60,90 l54,0 a10,10 0 0,0 7,-7 l0,-60 -50,50 a15,15 0 0,1 -21,0 l-50,-50 0,60 a10,10 0 0,0 7,7z" stroke="#000" stroke-width="0" fill="#000" />
                        </svg>
                    </span>
                    <span><a href="mailto:jankauskaite.karolina@gmail.com">jankauskaite.karolina@gmail.com</a></span>
                </div>
                <div class="insta">
                    <span class="icon">
                        <svg class="instagram-logo" id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                             viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve">
                                <path class="logo" id="XMLID_17_" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722 c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156 C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156 c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722 c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/>
                                <path id="XMLID_81_" fill="#555" d="M275.517,133C196.933,133,133,196.933,133,275.516 s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6 c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083 C362.6,323.611,323.611,362.6,275.517,362.6z"/>
                                <circle id="XMLID_83_" fill="#555" cx="418.306" cy="134.072" r="34.149"/>
                        </svg>
                    </span>
                    <span><a href="https://www.instagram.com/karolina_jank/" target="_blank">@karolina_jank</a></span>
                </div>
                <div class="image">
                    <img src="/images/foto.jpg" alt="Karolina" />
                </div>
            </div>
        </div>
    </div>
@endsection
