@extends('web.layout')

@section('content')

@if ($agent->isMobile())
@include('web.partials.header')
@endif

<div id="fullpage">
	<div class="section container-fluid" id="section0"> <!-- header & inicio -->
        <!--<img src="{{ asset('images/img-verde.png') }}" alt="" class="img-verde">
        <img src="{{ asset('images/logo-b.png') }}" alt="" class="logo-b">-->
        @if(!$agent->isMobile())
        <section class="sec1" id="header headerT">
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
                            <li class="@if (Route::currentRouteName()=="index" ) active @endif"><a href="#inicio">INICIO</a></li>
                            <li class=""><a href="#nosotros">NOSOTROS</a></li>
                            <li class=""><a href="#partners">PARTNERS</a></li>
                            <li class=""><a href="#soluciones">SOLUCIONES</a></li>
                            <li class=""><a href="#blog">BLOG</a></li>
                            <li class=""><a href="#contactanos">CONTÁCTANOS</a></li>      
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @endif

		<div class="row justify-content-center">
            <div class="col-md-3 texto-izq">
                <div class="texto">
                    <img src="{{ asset('images/computer.png') }}" alt="">
                    <p>
                        {{ $home->home_title }}
                    </p>
                </div>
            </div>
            <div class="col-md-7 texto-der">
                <div id="carousel-inicio" class="owl-carousel">
                    @foreach ($home->home_carousel as $item)
                    @if($item['type'] == "vimeo")
                    <div class="item text-center">
                        <div class="item_">
                            <iframe id="vimeo"
                            src="https://player.vimeo.com/video/{{ $item['link'] }}" 
                            frameborder="0" 
                            allow="autoplay; fullscreen; picture-in-picture" 
                            webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                            </iframe>
                        </div>
                    </div>
                    @endif
                    @if($item['type'] == "youtube")
                    <div class="item text-center">
                        <div class="item_">
                            <iframe id="youtube" src="https://www.youtube.com/embed/{{ $item['link'] }}" 
                            frameborder="0" 
                            allowfullscreen
                            ></iframe>
                        </div>
                    </div>
                    @endif
                    @if($item['type'] == "imagen")
                    <div class="item text-center">
                        <div class="item_">
                            <img id="image" class="" src="{{ $item['link'] }}" alt="">
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
	</div>

	<div class="section container-fluid" id="section1"> <!-- nosotros -->
	    <div class="row justify-content-center">
            <div class="col-md-10 title">
                <p>SOBRE LA EMPRESA</p>
            </div>
            <div class="col-6 col-md-3 content-left">
                <div class="video">
                    <img src="{{ $home->aboutus_video }}" alt="">
                </div>
            </div>
            <div class="d-none d-md-block col-md-1"></div>
            <div class="col-6 col-md-5 content-right">
                <div class="description">
                    <h4>{{ $home->aboutus_title }}</h4>
                    {!! htmlspecialchars_decode($home->aboutus_description) !!}
                    <div class="vermas">
                        <span>
                            <img src="{{ asset('images/vermas.png') }}" alt="">
                        </span>
                    </div>
                </div>
                <div id="carousel-nosotros" class="owl-carousel desktop">
                    @foreach ($aboutus as $item)
                    <div class="item">
                        <div class="habilidades">
                            <div class="tit">
                                <span>{{ $item->name }}</span>
                            </div>
                        </div>
                        <div class="habilidades-items row">
                            @foreach ($item->items as $i)
                            <div class="col-md-3">
                                <div class="divimg">
                                    <img src="{{ $i['image'] }}" alt="">
                                </div>
                                <div class="texto">
                                    <p>{{ $i['name'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="habilidades-cobertura">
                            <div class="tit">
                                <h3>{{ $item->title }}</h3>
                                <p>
                                    {!! htmlspecialchars_decode($item->description) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 d-block d-md-none">
                <div id="carousel-nosotros2" class="owl-carousel mobile">
                    @foreach ($aboutus as $item)
                    <div class="item">
                        <div class="habilidades">
                            <div class="tit">
                                <span>{{ $item->name }}</span>
                            </div>
                        </div>
                        <div class="habilidades-items row">
                            @foreach ($item->items as $i)
                            <div class="col-6">
                                <div class="divimg">
                                    <img src="{{ $i['image'] }}" alt="">
                                </div>
                                <div class="texto">
                                    <p>{{ $i['name'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="habilidades-cobertura">
                            <div class="tit">
                                <h3>{{ $item->title }}</h3>
                                <p>
                                    {!! htmlspecialchars_decode($item->description) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
	</div>

	<div class="section container-fluid" id="section2"> <!-- partners -->
        <img src="{{ asset('images/partners-background.png') }}" alt="" class="partners-background">
        <div class="row justify-content-center d-block d-md-none">
            <div class="col-md-10 title">
                <p>SOLUCIONES <span class="font-medium">PARTNERS</span></p>
            </div>
        </div>
        @foreach ($partners as $partner)
        <div class="slide">
            <div class="row">
                <div class="col-md-8 offset-md-1">
                    <div class="row partnerdiv">
                        <div class="col-md-4">
                            <div class="tit">
                                <div class="partner-tit">
                                    <div class="images">
                                        <img class="part" src="{{ $partner->image }}" alt="">
                                        <img class="fl" id="btnfl" idnum="{{ $loop->index }}" src="{{ asset('images/fl-aba.png') }}" alt="">
                                    </div>
                                    <div class="collapse-partners" id="collapse_{{ $loop->index }}">
                                        @php
                                            $i = $loop->index
                                        @endphp
                                        <div class="card card-body">
                                            @foreach ($partners as $item)
                                            <a class="btn-link" num="{{ $i }}" href="{{ route('index') }}#partners/{{ $loop->index }}">{{ $item->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="partner-detail">
                                    {!! htmlspecialchars_decode($partner->description) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <div id="carousel-partners-solution_1" class="owl-carousel carousel-partners-solution">
                                @foreach ($partner->items as $d)
                                <div class="item">
                                    <div class="tit">
                                        <div class="number">
                                            <p>
                                                {{ $loop->iteration }}
                                            </p>
                                        </div>
                                        <div class="texto">
                                            <p>
                                                {{ $d['name'] }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p>
                                            {{ $d['description'] }}
                                        </p>
                                    </div>
                                    <div class="imagen">
                                        <img src="{{ $d['image'] }}" alt="">
                                    </div>
                                    <a href="{{ $d['link'] }}" class="btn btn-conocemas" target="_blank">Conoce +</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

	</div>

    <div class="section container-fluid" id="section3"> <!-- soluciones -->
        <div class="row justify-content-center d-block d-md-none">
            <div class="col-md-10 title">
                <p>SERVICIOS</p>
            </div>
            <div class="col-md-12 p-0 pb-2">
                <img class="img-fluid" src="{{ asset('images/bg-top.png') }}" alt="">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-5 info">
                        @foreach ($solutions as $item)
                        @if($loop->first)
                        <div class="imagen">
                            <img id="img_normal" src="{{ $item->image_show }}" alt="">
                        </div>
                        <p id="texto_normal">
                            {!! cleanT(htmlspecialchars_decode($item->description)) !!}
                        </p>
                        @endif
                        @endforeach
                        <a href="#contactanos" class="btn btn-contacto">
                            Contáctanos
                        </a>
                    </div>
                    <div class="col-md-7 items">
                        <div class="row">
                            @foreach ($solutions as $solution)
                            <div class="col-4 col-md-3 p-0 d-flex">
                                <div class="item @if($loop->first) active_item click_item @endif" id="solucion_item" normal="{{ $solution->image_show }}" texto="{!! cleanT(htmlspecialchars_decode($solution->description)) !!}">
                                    <div class="imagen">
                                        <img class="img_green @if($loop->first) d-none @endif" src="{{ $solution->image_green }}" alt="">
                                        <img class="img_white @if($loop->first) d-inline @endif" src="{{ $solution->image_white }}" alt="">
                                    </div>
                                    <p class="@if($loop->first) active_p @endif">
                                        {{ $solution->name }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center d-block d-md-none">
            <div class="col-md-12 p-0 pt-3">
                <img class="img-fluid" src="{{ asset('images/bg-bottom.png') }}" alt="">
            </div>
        </div>
    </div>

    <div class="section container-fluid" id="section4"> <!-- blog -->
        <div class="row justify-content-center">
            <div class="col-md-10 title">
                <p>BLOG</p>
            </div>
            <div class="col-md-12 carouseldiv">
                <img class="computer-blog" src="{{ asset('images/computer-blog.png') }}" alt="">
                <div id="carousel-blog" class="owl-carousel">
                    @foreach ($posts as $post)
                    <div class="item">
                        <div class="imagen">
                            <img class="" src="{{ $post->image_index }}" alt="">
                            <a class="titulo" href="{{ route('post', $post->slug) }}">
                                {{ $post->name }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="section container-fluid" id="section5"> <!-- contactanos -->
        <div class="row justify-content-center">
            <div class="col-md-5 footer-left">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="item">
                            <img src="{{ asset('images/direccion.png') }}" alt="">
                            <h3>Dirección</h3>
                            <p>Av. Paseo de la República 3127 - San Isidro</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="item">
                            <img src="{{ asset('images/atencion.png') }}" alt="">
                            <h3>Atención</h3>
                            <p>Lunes a viernes de 9:00 am a 6:30am</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="item">
                            <img src="{{ asset('images/email.png') }}" alt="">
                            <h3>E-mail</h3>
                            <p>ventas@btech.com.pe</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="item">
                            <img src="{{ asset('images/direccion.png') }}" alt="">
                            <h3>Teléfono</h3>
                            <p>(051)616 - 0505</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class="txt">
                            En Btech estamos compromentidos con nuestros partners y potenciales
                            clientes por lo que estamos dispuestos a ayudarte a concretar un
                            presupuesto sin compromiso o responder cualquier duda.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div class="formulario">
                    <div class="imagen">
                        <img src="{{ asset('images/puntos.png') }}" alt="">
                    </div>
                    <p>
                        ¡Estamos a un mensaje de virtualizar tus tecnologías y potenciarlas al máximo!
                    </p>
                    <form action="{{ route('contacto') }}" id="form_" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="fullname" class="form-control shadow" placeholder="Nombres">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control shadow" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telephone" class="form-control shadow" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <input type="text" name="company" class="form-control shadow" placeholder="Empresa">
                        </div>
                        <div class="form-group">
                            <textarea name="observation" rows="7" class="form-control shadow" placeholder="Mensaje"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-submit">
                                <img src="{{ asset('images/boton_enviar.png') }}" alt="">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 footer">
                <div class="footer-right">
                    <div class="imagen">
                        <img src="{{ asset('images/logo_blanco.png') }}" alt="">
                    </div>
                    <div class="copyright">
                        
                        <img src="{{ asset('images/r.png') }}" alt="">
                        <p>
                            2021 Business Technology S.A. <br>
                            Todos los derechos reservados.
                        </p>
                    </div>
                </div>
                <div class="redes">
                    <a href="{{ $home->facebook }}" target="_blank"><img class="redes_" src="{{ asset('images/fb.png') }}" alt=""></a>
                    <a href="{{ $home->linkedin }}" target="_blank"><img class="redes_" src="{{ asset('images/in.png') }}" alt=""></a>
                    <a href="{{ $home->youtube }}" target="_blank"><img class="redes_" src="{{ asset('images/yt.png') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection