<ul class="desktop nav justify-content-center d-lg-flex align-items-center">
    <li class="nav-item"><a href="{{ route('index') }}">Work</a></li>
    <li class="nav-item logo">
        <a href="{{ route('index') }}">
            <img src="{{url('/images/logo.jpg')}}" alt="Image"/>
        </a>
    </li>
    <li class="nav-item"><a href="{{ route('about') }}">About</a></li>
</ul>

<ul class="mobile nav justify-content-center d-lg-flex align-items-center">
    <li class="nav-item logo">
        <a href="{{ route('index') }}">
            <img src="{{url('/images/logo.jpg')}}" alt="Image"/>
        </a>
    </li>
    <li class="nav-item"><a href="{{ route('index') }}">Work</a></li>
    <li class="nav-item"><a href="{{ route('about') }}">About</a></li>
</ul>
