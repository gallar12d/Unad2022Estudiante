@extends('layouts.app_home_kiddy')

@section('content')
<div class="page">
    <!-- top panel -->
    <div class='site_top_panel wave slider'>
        <!-- canvas -->
        <div class='top_half_sin_wrapper'>
            <canvas class='top_half_sin' data-bg-color='#ffffff' data-line-color='#ffffff'></canvas>
        </div>
        <!-- / canvas -->
        <div class='container'>
            <div class='row_text_search'>
                <div id='top_panel_text'><a href="tel:3226426731"><i class="fa fa-phone-square"></i> 3226426731 </a>;
                    <a href="mailto:coordinacion@preescolarbambydelnorte.com"> <i class="fa fa-envelope-o"></i>coordinacion@preescolarbambydelnorte.com</a>
                </div>
                <form autocomplete="off"  method="get" class="search-form" action="#">
                    <label>
                        <span class="screen-reader-text">Search for:</span>
                        <input type="text" class="search-field vova" value="" name="s" title="Search for:" />
                    </label>
                    <input type="submit" class="search-submit" value="Search" />
                    <input type='hidden' name='lang' value='en' />
                </form>
            </div>
            <div id='top_panel_links'>
                <div id='top_social_links_wrapper'>
                    <div class='share-toggle-button'><i class='share-icon fa fa-share-alt'></i></div>
                    <div class='cws_social_links'><a href='http://facebook.com/' class='cws_social_link' title='Facebook'><i class='share-icon fa fa-facebook'></i></a></div>
                </div>


            </div>
            <div class="site_top_panel_toggle"></div>
        </div>
    </div>
    <!-- / top panel -->
    <!-- slider and menu container -->
    <div class='slider_vs_menu'>
        <div class='header_cont'>
            <div class='header_mask'>
                <div class='header_pattern'></div>
            </div>
            <header class='site_header logo-in-menu' data-menu-after="3">
                <div class="header_box">
                    <div class="container">
                        <!-- logo -->
                        <div class="header_logo_part with_border" role="banner">
                            <a class="logo" href="{{url('/')}}"><img src="{{asset('images/logo2.png')}}" data-at2x="{{asset('images/logo2.png')}}" alt /></a>
                        </div>
                        <!-- / logo -->
                        <!-- menu -->
                        <div class="header_nav_part">
                            <nav class="main-nav-container a-center">
                                <div class="mobile_menu_header">
                                    <i class="mobile_menu_switcher"><span></span><span></span><span></span></i>
                                </div>
                                <ul id="menu-main-menu" class="main-menu menu-bees">
                                    <!-- menu item -->
                                    <li class="menu-item current-menu-item page_item current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children bees-start">
                                        <a href="{{url('/')}}">
                                            <div class="bees bees-start"><span></span>
                                                <div class="line-one"></div>
                                                <div class="line-two"></div>
                                            </div>Inicio
                                            <div class="canvas_wrapper">
                                                <canvas class="menu_dashed"></canvas>
                                            </div>
                                        </a>
                                        <span class='button_open'></span>
                                        <ul class="sub-menu">
                                            <li class="menu-item back"><a href="#"><em>←</em>&nbsp;ATRÁS</a>
                                            </li>

                                            <li class="menu-item"><a href="{{url('/login')}}">Iniciar sesión</a></li>
                                        </ul>
                                    </li>

                                    <!-- / menu item -->
                                    <!-- menu item -->
                                    <li class="menu-item menu-item-has-children"><a href="{{url('/equipo')}}">Nuestro equipo<div class="canvas_wrapper"><canvas class="menu_dashed"></canvas></div></a>
                                        

                                    </li>
                                    <!-- / menu item -->
                                    <!-- menu item -->
                                    <li class="menu-item menu-item-has-children"><a href="#">Niveles<div class="canvas_wrapper"><canvas class="menu_dashed"></canvas></div></a>
                                        <span class='button_open'></span>
                                        <ul class="sub-menu">
                                            <li class="menu-item back"><a href="#"><em>←</em>&nbsp;ATRÁS</a>
                                            </li>
                                            <li class="menu-item"><a href="{{url('/transicion')}}">Transición</a></li>
                                            <li class="menu-item"><a href="{{url('/jardin')}}">Jardín</a></li>
                                            <li class="menu-item"><a href="{{url('/prejardin')}}">Pre Jardín</a></li>
                                            <li class="menu-item"><a href="{{url('/parvulos')}}">Párvulos</a></li>
                                            <li class="menu-item"><a href="{{url('/maternos')}}">Maternos</a></li>

                                        </ul>
                                    </li>
                                    <!-- / menu item -->
                                    <!-- menu item -->
                                    <li class="menu-item menu-item-has-children right"><a href="{{url('/pedagogia')}}">Pedagogía<div class="canvas_wrapper"><canvas class="menu_dashed"></canvas></div></a>
                                        

                                    </li>
                                    <!-- / menu item -->
                                    <!-- menu item -->
                                    <li class="menu-item menu-item-has-children right"><a href="#">Admisiones<div class="canvas_wrapper"><canvas class="menu_dashed"></canvas></div></a>
                                        <span class='button_open'></span>
                                        <ul class="sub-menu">
                                            <li class="menu-item back"><a href="#"><em>←</em>&nbsp;ATRÁS</a>
                                            </li>
                                            <li class="menu-item"><a href="{{url('/inscripcion')}}">Proceso de inscripción</a></li>
                                            <li class="menu-item"><a href="{{url('/inscripcion')}}">Formulario de inscripción</a></li>
                                        </ul>
                                    </li>
                                    <!-- / menu item -->
                                    <!-- menu item -->
                                    <li class="menu-item menu-item-has-children right bees-end">
                                        <a href="#">
                                            <div class="bees bees-end"><span></span>
                                                <div class="line-one"></div>
                                                <div class="line-two"></div>
                                            </div>Servicios
                                            <div class="canvas_wrapper">
                                                <canvas class="menu_dashed"></canvas>
                                            </div>
                                        </a>
                                        <span class='button_open'></span>
                                        <ul class="sub-menu">
                                            <li class="menu-item back"><a href="#"><em>←</em>&nbsp;ATRÁS</a>
                                            </li>
                                            <li class="menu-item"><a href="{{url('/psicologia')}}">Psicología</a></li>

                                            <li class="menu-item"><a href="{{url('/fonoaudiologia')}}">Fonoaudiología </a></li>
                                            <li class="menu-item"><a href="{{url('/academia')}}">Academia </a></li>
                                            <li class="menu-item"><a href="{{url('/vacaciones')}}">Vacaciones recreativas </a></li>

                                        </ul>
                                    </li>

                                    <!-- / menu item -->
                                </ul>
                            </nav>
                        </div>
                        <!-- / menu -->
                    </div>
                </div>
            </header>
            <!-- #masthead -->
        </div>

    </div>
    <!-- main container -->
    <div id="main" class="site-main">
        <div class="page_content">
            <!-- pattern conatainer / -->
            <div class='left-pattern pattern pattern-2'></div>
            <main>
                <!-- steps -->
                <div class='grid_row clearfix' style='padding-top: 100px;padding-bottom: 50px;'>
                    <div class='grid_col grid_col_6'>
                        <div class='ce clearfix'>
                            <div>
                                <h3 class="ce_title" style=" text-align: center;">Nuestro <span>Equipo</span></h3>
                                <p style=" text-align: center;">
                                    La Educación Preescolar es el primer nivel del Sistema Educativo Costarricense, destinado a la atención pedagógica de los niños y las niñas, a partir de su nacimiento hasta su ingreso al Primer Año del Primer Ciclo de la Educación General Básica.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class='grid_col grid_col_6'>
                        <div class='ce clearfix'>
                            <div>
                                <p><img class="aligncenter size-full image-type noborder" src="{{asset('images/equipo.jpg')}}" alt="nanny" width="40%" height="auto" /></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / steps -->

                <!-- / section -->
            </main>
            <!-- pettaren container / -->
            <div class='right-pattern pattern pattern-2'></div>
            <!-- footer image container / -->
            <div class="footer_image"></div>
        </div>
        <!-- svg filter -->
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="0" style='display:none;'>
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />
                    <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                    <feComposite in="SourceGraphic" in2="goo" operator="atop" />
                </filter>
            </defs>
        </svg>
        <!-- / svg filter -->
    </div>
    <!-- #main -->

</div>
<!-- #page -->

@endsection