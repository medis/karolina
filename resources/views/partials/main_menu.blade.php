<div class="logo">
    <a href="{{ route('index') }}">
        <img src="{{url('/images/logo.jpg')}}" alt="Image"/>
    </a>
</div>
<div class="desktop-nav">
    <ul class="desktop nav justify-content-center d-lg-flex align-items-center">
        <li class="nav-item">
            <a href="{{ route('index') }}?cat=garments">Garments</a>
            <ul class="dropdown">
                <li><a href="{{ route('index') }}?cat=accessories">Accessories</a></li>
                <li><a href="{{ route('index') }}?cat=dresses">Dresses</a></li>
                <li><a href="{{ route('index') }}?cat=skirts">Skirts</a></li>
                <li><a href="{{ route('index') }}?cat=trousers">Trousers</a></li>
                <li><a href="{{ route('index') }}?cat=tops">Tops</a></li>
                <li><a href="{{ route('index') }}?cat=jackets">Jackets</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('index') }}?cat=lookbooks">Lookbooks</a>
            <ul class="dropdown">
                <li><a href="{{ route('index') }}?cat=seasons">Seasons</a></li>
                <li><a href="{{ route('index') }}?cat=studio_images">Studio images</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('index') }}?cat=drawings">Drawings</a>
            <ul class="dropdown">
                <li><a href="{{ route('index') }}?cat=illustrations">Illustrations</a></li>
                <li><a href="{{ route('index') }}?cat=posters">Posters</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="{{ route('about') }}">About</a></li>
    </ul>
</div>
<ul class="mobile nav justify-content-center d-lg-flex align-items-center">
    <li class="nav-item"><a href="{{ route('index') }}">Work</a></li>
    <li class="nav-item"><a href="{{ route('about') }}">About</a></li>
</ul>
