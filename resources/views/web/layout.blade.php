<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BTECH</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <link href="{{ asset('css/fullpage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/web.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <!--<link href="{{ asset('css/all.css') }}" rel="stylesheet">-->
    <style>
        #fp-nav ul li .fp-tooltip
        {
            color: #008B26;
            font-family: font-black;
        }
        /*#fp-nav ul li:hover a span, .fp-slidesNav ul li:hover a span
        {
            border: .5px solid rgba(255, 255, 255, .8);
        }
        #fp-nav ul li a span, .fp-slidesNav ul li a span {
            border: .2px solid rgba(255, 255, 255, .4);
        }
        #fp-nav ul li a.active span, .fp-slidesNav ul li a.active span, #fp-nav ul li:hover a.active span, .fp-slidesNav ul li:hover a.active span{
            border: .5px solid rgba(255, 255, 255, .8);
        }*/
        #section3 .items .item{
            box-shadow: .4rem .4rem 0.7rem .5rem rgb(0 0 0 / 20%)
        }
        @media screen and (max-width: 768px){
            #section3 .items .item{
                box-shadow: .1rem .1rem 0.7rem .1rem rgb(0 0 0 / 20%)
            }
        }
    </style>
</head>
<body>
    <div class="loading">
        <div id="loader" class="center-all"></div>
    </div>
    @if(Route::currentRouteName()=="blog" || Route::currentRouteName()=="post" || Route::currentRouteName()=="category" || Route::currentRouteName()=="tag" || Route::currentRouteName()=="gracias")
    @include('web.partials.header')
    @endif
    @yield('content')
    @if(Route::currentRouteName()=="blog" || Route::currentRouteName()=="post" || Route::currentRouteName()=="category" || Route::currentRouteName()=="tag" || Route::currentRouteName()=="gracias")
    @include('web.partials.footer')
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/fullpage.js') }}"></script>
    <script src="{{ asset('js/fullpage.extensions.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!--<script src="{{ asset('js/all.js') }}"></script>-->
    <script type="text/javascript">
        var myFullpage = new fullpage('#fullpage', {
            anchors: ['inicio', 'nosotros', 'partners', 'soluciones', 'blog', 'contactanos'],
            sectionsColor: ['#CCCCCC', '#CCCCCC', '#CCCCCC', '#CCCCCC', '#CCCCCC', '#CCCCCC'],
            navigationTooltips: ['Inicio', 'Nosotros', 'Partners', 'Soluciones', 'Blog', 'Contáctanos'],
            navigation: true,
            navigationPosition: 'right',
            dragAndMove: true,
            dragAndMoveKey: 'YWx2YXJvdHJpZ28uY29tX0EyMlpISmhaMEZ1WkUxdmRtVT0wWUc=',
            //css3: true,
            //scrollingSpeed: 1000,
            slidesNavigation: true,
            responsiveHeight: 330,
            controlArrows: false,
            responsiveWidth: 1100,
            afterResponsive: function(isResponsive){ 
            }
        });
    </script>
</body>
</html>