document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector(
          "body").style.visibility = "hidden";
        document.querySelector(
          ".loading").style.visibility = "visible";
        document.querySelector(
          "#loader").style.visibility = "visible";
    } else {
        setTimeout(function(){document.querySelector(
          ".loading").style.display = "none"}, 300);
        setTimeout(function(){document.querySelector(
          "#loader").style.display = "none"}, 300);
        document.querySelector(
          "body").style.visibility = "visible";
    }
};

var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');

$(function(){
    
    AOS.init();

    if(route == "gracias"){
        $('#header').addClass('shadow');
        $('#header').css('background-color', 'rgba(0, 0, 0, .9)');
        $('#header').css('padding-top', '2px');
        $('#header').css('padding-bottom', '2px');
        $('.img-logo').attr('src', base + '/images/logo_blanco.png');
        $('.sec1 .ul-header li a').css('color', '#FFF');
    }

    $(window).on("scroll", function() {
        if($(window).scrollTop())
        {
            $('#header').addClass('shadow');
            $('#header').css('background-color', 'rgba(0, 0, 0, .9)');
            $('#header').css('padding-top', '1px');
            $('#header').css('padding-bottom', '1px');
            $('.img-logo').attr('src', base + '/images/logo_blanco.png');
            $('.sec1 .ul-header li a').css('color', '#FFF');
        }else
        {
            $('#header').removeClass('shadow');
            $('#header').css('background-color', 'rgba(0, 0, 0, 0)');
            $('#header').css('padding-top', '10px');
            $('#header').css('padding-bottom', '10px');
            $('.img-logo').attr('src', base + '/images/logo.png');
            $('.sec1 .ul-header li a').css('color', '#323232');
        }
    })

    $('[class*=lnk-head-mobile]').on('click', function(e){
        $('.lnk-head-mobile').removeClass('active');
        $(this).addClass('active');
        if($('.nav-mobile').hasClass('nav-mobile-active'))
        {
            $('.nav-mobile').removeClass('nav-mobile-active');
        }else
        {
            $('.nav-mobile').addClass('nav-mobile-active');
        }
        if($('.linea1').hasClass('toggle1')){$('.linea1').removeClass('toggle1');}else{$('.linea1').addClass('toggle1');}
        if($('.linea2').hasClass('toggle2')){$('.linea2').removeClass('toggle2');}else{$('.linea2').addClass('toggle2');}
        if($('.linea3').hasClass('toggle3')){$('.linea3').removeClass('toggle3');}else{$('.linea3').addClass('toggle3');}
    });

    $('[id*=btnfl]').on('click', function(e){
        e.preventDefault();
        idnum = $(this).attr('idnum');
        if($('#collapse_' + idnum).hasClass('d-block')){
            $('#collapse_' + idnum).removeClass('d-block');
        }else{
            $('#collapse_' + idnum).addClass('d-block');
        }
    });

    $('[class*=btn-link]').on('click', function(e){
        //e.preventDefault();
        num = $(this).attr('num');
        console.log(num);
        if($('#collapse_' + num).hasClass('d-block')){
            console.log('xd');
            $('#collapse_' + num).removeClass('d-block');
        }
    });

    $("input[name=telephone]").bind("change keyup input", function() {
        var position = this.selectionStart - 1;
        var fixed = this.value.replace(/[^0-9]/g, "");
    
        if (this.value !== fixed) {
          this.value = fixed;
          this.selectionStart = position;
          this.selectionEnd = position;
        }
    });

    $('#carousel-inicio').owlCarousel({
        loop: true,
        startPosition: 0,
        dots: true,
        margin: 0,
        autoplay: false,
        autoplayTimeout: 3000,
        smartSpeed: 450,
        responsive: {
            0: {
            items: 1,
            },
            768: {
            items: 1,
            },
            900: {
            items: 1,
            }
        }
    });

    $('#carousel-nosotros').owlCarousel({
        loop: true,
        startPosition: 0,
        dots: true,
        margin: 0,
        autoplay: false,
        autoplayTimeout: 3000,
        smartSpeed: 450,
        responsive: {
            0: {
            items: 1,
            },
            768: {
            items: 1,
            },
            900: {
            items: 1,
            }
        }
    });

    $('#carousel-nosotros .owl-next').html('<img src="../images/fl-der.png">');
    $('#carousel-nosotros .owl-prev').html('<img src="../images/fl-izq.png">');

    $('#carousel-nosotros2').owlCarousel({
        loop: true,
        startPosition: 0,
        dots: true,
        margin: 0,
        autoplay: false,
        autoplayTimeout: 3000,
        smartSpeed: 450,
        responsive: {
            0: {
            items: 1,
            },
            768: {
            items: 1,
            },
            900: {
            items: 1,
            }
        }
    });

    $('#carousel-nosotros2 .owl-next').html('<img src="../images/fl-der.png">');
    $('#carousel-nosotros2 .owl-prev').html('<img src="../images/fl-izq.png">');

    $('#carousel-blog').owlCarousel({
        center: true,
        touchDrag: false,
        mouseDrag: false,
        loop: true,
        startPosition: 0,
        dots: false,
        margin: 0,
        autoplay: false,
        autoplayTimeout: 3000,
        smartSpeed: 450,
        responsive: {
            0: {
            items: 1,
            },
            768: {
            items: 1,
            },
            900: {
            items: 3,
            nav: true,
            }
        }
    });

    $('#carousel-blog .owl-next').html('<img src="../images/fl-der.png">');
    $('#carousel-blog .owl-prev').html('<img src="../images/fl-izq.png">');
    
    $('[id*=carousel-partners-solution]').owlCarousel({
        loop: true,
        startPosition: 0,
        dots: true,
        margin: 0,
        autoplay: false,
        autoplayTimeout: 3000,
        smartSpeed: 450,
        responsive: {
            0: {
            items: 1,
            },
            768: {
            items: 1,
            },
            900: {
            items: 1,
            }
        }
    });

    $('.carousel-partners-solution .owl-next').html('<img src="../images/fl-der.png">');
    $('.carousel-partners-solution .owl-prev').html('<img src="../images/fl-izq.png">');

    

    $('[id*=solucion_item]').on('mouseover', function(){
        $(this).children('.imagen').children('.img_green').css('display', 'none');
        $(this).children('.imagen').children('.img_white').css('display', 'inline');
        $(this).children('p').addClass('active_p');
        $(this).addClass('active_item');
    });

    $('[id*=solucion_item]').on('mouseout', function(){
        if(!$(this).hasClass('click_item')){
            $(this).children('.imagen').children('.img_green').css('display', 'inline');
            $(this).children('.imagen').children('.img_white').css('display', 'none');
            $(this).children('p').removeClass('active_p');
            $(this).removeClass('active_item');
        }
    });

    $('[id*=solucion_item]').on('click', function(){
        var img_normal = $(this).attr('normal');
        var texto_normal = $(this).attr('texto');

        $('[id*=solucion_item]').children('p').removeClass('active_p');
        $('[id*=solucion_item]').removeClass('active_item');
        $('[id*=solucion_item]').removeClass('click_item');
        $('[class*=img_white]').removeClass('d-inline');
        $('[class*=img_green]').removeClass('d-none');
        $('[class*=img_white]').css('display','none');
        $('[class*=img_green]').css('display','inline');

        $(this).children('.imagen').children('.img_green').css('display', 'none');
        $(this).children('.imagen').children('.img_white').css('display', 'inline');
        $(this).children('p').addClass('active_p');
        $(this).addClass('active_item click_item');

        $('#img_normal').attr('src', img_normal);
        $('#texto_normal').html(texto_normal);
    });

    $('.burgergg').on('click',function(){
        if($('.nav-mobile').hasClass('nav-mobile-active'))
        {
            $('.nav-mobile').removeClass('nav-mobile-active');
        }else
        {
            $('.nav-mobile').addClass('nav-mobile-active');
        }
        if($('.linea1').hasClass('toggle1')){$('.linea1').removeClass('toggle1');}else{$('.linea1').addClass('toggle1');}
        if($('.linea2').hasClass('toggle2')){$('.linea2').removeClass('toggle2');}else{$('.linea2').addClass('toggle2');}
        if($('.linea3').hasClass('toggle3')){$('.linea3').removeClass('toggle3');}else{$('.linea3').addClass('toggle3');}
    });

    $('.btn-cerrar').on('click',function(){
        if($('.nav-mobile').hasClass('nav-mobile-active'))
        {
            $('.nav-mobile').removeClass('nav-mobile-active');
        }else
        {
            $('.nav-mobile').addClass('nav-mobile-active');
        }
        if($('.linea1').hasClass('toggle1')){$('.linea1').removeClass('toggle1');}else{$('.linea1').addClass('toggle1');}
        if($('.linea2').hasClass('toggle2')){$('.linea2').removeClass('toggle2');}else{$('.linea2').addClass('toggle2');}
        if($('.linea3').hasClass('toggle3')){$('.linea3').removeClass('toggle3');}else{$('.linea3').addClass('toggle3');}
    });

})