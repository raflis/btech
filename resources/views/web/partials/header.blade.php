<section class="sec1" id="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-8 col-md-4 left-menu">
                <img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid img-logo">
            </div>
            <div class="col-2 col-md-8 right-menu">
                <div class="burger0 burgergg">
                    <div class="linea1"></div>
                    <div class="linea2"></div>
                    <div class="linea3"></div>
                </div>
                <ul class="ul-header">
                    <li class="@if (Route::currentRouteName()=="index" ) active @endif"><a href="{{ route('index') }}#inicio">INICIO</a></li>
                    <li class=""><a href="{{ route('index') }}#nosotros">NOSOTROS</a></li>
                    <li class=""><a href="{{ route('index') }}#partners">PARTNERS</a></li>
                    <li class=""><a href="{{ route('index') }}#soluciones">SOLUCIONES</a></li>
                    <li class="li-blog @if (Route::currentRouteName()=="blog" || Route::currentRouteName()=="post" || Route::currentRouteName()=="tag" || Route::currentRouteName()=="category") active @endif"><a href="{{ route('blog') }}">BLOG</a></li>
                    <li class="li-contactanos"><a href="{{ route('index') }}#contactanos">CONTÁCTANOS</a></li>      
                </ul>
            </div>
        </div>
    </div>
    <div class="nav-mobile">
        <div class="burger burgergg">
            <div class="linea1"></div>
            <div class="linea2"></div>
            <div class="linea3"></div>
        </div>
        <div class="lists d-flex">
            <ul class="text-right">
                <li>
                    <a class="lnk-head-mobile" href="{{ route('index') }}#inicio">INICIO</a>
                </li>
                <li>
                    <a class="lnk-head-mobile" href="{{ route('index') }}#nosotros">NOSOTROS</a>
                </li>
                <li>
                    <a class="lnk-head-mobile" href="{{ route('index') }}#partners">PARTNERS</a>
                </li>
                <li>
                    <a class="lnk-head-mobile" href="{{ route('index') }}#soluciones">SOLUCIONES</a>
                </li>
                <li>
                    <a class="lnk-head-mobile @if (Route::currentRouteName()=="blog" || Route::currentRouteName()=="post" || Route::currentRouteName()=="tag" || Route::currentRouteName()=="category") active @endif" href="{{ route('blog') }}">BLOG</a>
                </li>
                <li>
                    <a class="lnk-head-mobile @if (Route::currentRouteName()=="gracias") active @endif" href="{{ route('index') }}#contactanos">CONTÁCTANOS</a>
                </li>
            </ul>
            <div class="bottom_">
                <button class="btn btn-cerrar">
                    Regresar
                </button>
                <img class="logomobile" src="{{ asset('images/logo.png') }}" alt="">
            </div>
        </div>
    </div>
</section>