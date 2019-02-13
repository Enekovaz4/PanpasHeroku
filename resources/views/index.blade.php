@extends('layouts.public')

@section('head_content')
        <meta name="description" content="Gestiona tu panadería con facilidad. Conserva y comparte tus recetas.">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PaNPaS') }}</title>
@endsection

@section('content')

        @include('layouts.public-navbar-ini')

        {{-- Header --}}
        <header class="masthead" style="
            --bg-url: url(../images/header-home.jpg);
            --bg-attach: fixed;
            --bg-size: cover;
            --bg-x: center;
            --bg-y: center;
        " alt="Imagen de fondo: una mesa de madera con panes y bollería alrededor">
            <div>
                <h2>{{ config('app.name', 'PaNPaS') }}</h2>
                {{--<span>Gestiona tu panadería con facilidad</span>--}}
                <span>Conserva y comparte tus recetas</span>
                <span>Busca las de otros</span>
            </div>
        </header>

        {{-- Servicios --}}
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Servicios</h2>
                        <h3 class="section-subheading text-muted">Descubre qué podemos ofrecerte</h3>
                    </div>
                </div>
                <div class="row text-center">
                        {{--
                        <div class="col-md-6">
                            <span class="fa-stack fa-4x" title="Icono de galleta" alt="Icono de Galleta">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-cookie fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="service-heading">Gestiona tu Panadería</h4>
                            <p class="text-muted">Facilita la gestión de tu negocio.<br>Organiza bien tu almacén.</p>
                        </div>
                        --}}
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x" title="Icono de libro abierto" alt="Icono de libro abierto">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-book-open fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="service-heading">Comparte</h4>
                            <p class="text-muted">Crea recetas para compartirlas con otros Usuarios.</p>
                        </div>
                    

                        <div class="col-md-4">
                                <span class="fa-stack fa-4x" title="Icono de estrella" alt="Icono de Estrella">
                                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fas fa-star fa-stack-1x fa-inverse"></i>
                                </span>
                                <h4 class="service-heading">Vota</h4>
                                <p class="text-muted">Valora las recetas de otros usuarios.<br>Las 3 más votadas aparecerán en esta misma página.</p>
                            </div>

                        <div class="col-md-4">
                            <span class="fa-stack fa-4x"  alt="Icono de dedos en v">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fab fa-angellist fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="service-heading">Sigue</h4>
                            <p class="text-muted">Sigue a usuarios para tener <br>sus recetas a mano</p>
                        </div>

                </div>
            </div>
        </section>

        {{-- Ranking Grid --}}
        <section class="bg-light" id="ranking">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Ranking</h2>
                        <h3 class="section-subheading text-muted">Visualiza las 3 recetas más destacadas entre un total de {{ $totalRecetas }}</h3>
                    </div>
                </div>

                <div class="row" id="listaRanking">

                @foreach($recetas_podium as $receta)

                    {{-- Parte del Ranking --}}
                    <div class="col-md-4 col-sm-6 ranking-item">
                        <a class="ranking-link" data-toggle="modal" href="#rankingModal{{ $receta->id }}">
                            <div class="ranking-hover">
                                <div class="ranking-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ $receta->imagen }}" alt="Imagen de Receta: {{ $receta->titulo }}">
                        </a>
                        <div class="ranking-caption">
                            <h4>{{ $receta->titulo }}</h4>
                            <p class="text-muted">por <a href="#listaRanking" title="{{$receta->user->username}} es el autor de la receta." alt="{{$receta->user->username}} es el autor de la receta." class="link-marco">{{ $receta->user->username }}</a></p>
                            <h5 class="stars-votos">
                                <i class="fas fa-star fa-lg star-gold" title="Estrella de Oro" alt="Estrella de Oro"></i> {{ $receta->votos }}
                            </h5>
                        </div>
                    </div>

                @endforeach

                </div>
            </div>
        </section>

        {{-- Clientes --}}
        <section id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Nuestros Patrocinadores</h2>
                        <h3 class="section-subheading text-muted">Empresas que apuestan por nuestra App</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="client">
                            <a href="#" title="Acceder a su perfil">
                                <img class="mx-auto rounded-circle" src="images/clientes/ogitxerri.png" alt="Ogi Txerri - logo">
                            </a>
                            <h4>Ogi Txerri</h4>
                            <p class="text-muted">Tu pan marrano</p>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Twitter">
                                        <i class="fab fa-twitter" title="Ogi Txerri - Twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Facebook">
                                        <i class="fab fa-facebook-f" title="Ogi Txerri - Facebook"></i>
                                    </a>
                                </li>
                                    <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Linkedin">
                                        <i class="fab fa-linkedin-in" title="Ogi Txerri - Linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="client">
                            <a href="#" title="Acceder a su perfil">
                                <img class="mx-auto rounded-circle" src="images/clientes/bigopan.png" alt="Bigopan - logo">
                            </a>
                            <h4>Bigopan</h4>
                            <p class="text-muted">Un pan con bigotes</p>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Twitter">
                                        <i class="fab fa-twitter" title="Bigopan - Twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Facebook">
                                        <i class="fab fa-facebook-f" title="Bigopan - Facebook"></i>
                                    </a>
                                </li>
                                    <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Linkedin">
                                        <i class="fab fa-linkedin-in" title="Bigopan - Linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="client">
                            <a href="#" title="Acceder a su perfil">
                                <img class="mx-auto rounded-circle" src="images/clientes/peterpan.png" alt="PeterPan - logo">
                            </a>
                            <h4>PeterPan</h4>
                            <p class="text-muted">Panes de Cuento</p>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Twitter">
                                        <i class="fab fa-twitter" title="PeterPan - Twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Facebook">
                                        <i class="fab fa-facebook-f" title="PeterPan - Facebook"></i>
                                    </a>
                                </li>
                                    <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Linkedin">
                                        <i class="fab fa-linkedin-in" title="PeterPan - Linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="client">
                            <a href="#" title="Acceder a su perfil">
                                <img class="mx-auto rounded-circle" src="images/clientes/ruso.png" alt="Ruso - logo">
                            </a>
                            <h4>Ruso</h4>
                            <p class="text-muted">Directamente de Siberia</p>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Twitter">
                                        <i class="fab fa-twitter" title="Ruso - Twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Facebook">
                                        <i class="fab fa-facebook-f" title="Ruso - Facebook"></i>
                                    </a>
                                </li>
                                    <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Linkedin">
                                        <i class="fab fa-linkedin-in" title="Ruso - Linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="client">
                            <a href="#" title="Acceder a su perfil">
                                <img class="mx-auto rounded-circle" src="images/clientes/pompan.png" alt="PomPan - logo">
                            </a>
                            <h4>PomPan</h4>
                            <p class="text-muted">Pón pan con lo que quieras</p>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Twitter">
                                        <i class="fab fa-twitter" title="PomPan - Twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Facebook">
                                        <i class="fab fa-facebook-f" title="PomPan - Facebook"></i>
                                    </a>
                                </li>
                                    <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Linkedin">
                                        <i class="fab fa-linkedin-in" title="PomPan - Linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="client">
                            <a href="#" title="Acceder a su perfil">
                                <img class="mx-auto rounded-circle" src="images/clientes/troyano.png" alt="Troyano - logo">
                            </a>
                            <h4>Troyano</h4>
                            <p class="text-muted">A caballo y con sorpresa</p>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Twitter">
                                        <i class="fab fa-twitter" title="Troyano - Twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Facebook">
                                        <i class="fab fa-facebook-f" title="Troyano - Facebook"></i>
                                    </a>
                                </li>
                                    <li class="list-inline-item">
                                    <a href="#" target="_blank" title="Visitar su Linkedin">
                                        <i class="fab fa-linkedin-in" title="Troyano - Linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Contacto --}}
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">¿Te interesa?</h2>
                        <h3 class="section-subheading text-white">Contacta con nosotros para resolver todas tus dudas</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="contactForm" name="sentMessage" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/d/embed?mid=1mSGKOLVLNclxGX6ffIREoq3XqfF2gNPa" width="640" height="400" alt="mapa de la zona de San Sebastián con los lugares donde se encuentran nuestros patrocinadores."></iframe>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Tu Nombre *" data-validation-required-message="Por favor, teclea tu nombre." required alt="Inserta tu nombre.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="correo" id="correo" type="email" placeholder="Tu Email *" data-validation-required-message="Por favor, teclea tu correo electrónico." data-validation-validemail-message="No es un EMAIL válido" required alt="Inserta tu correo">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="asunto" id="asunto" type="text" placeholder="El Asunto *" data-validation-required-message="Por favor, teclea el asunto." required alt="Inserta el asunto de la consulta como título.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="mensaje" id="mensaje" placeholder="Tu Mensaje *" data-validation-required-message="Por favor, teclea tu mensaje." required alt="Inserta el mensaje que quieras mandarnos."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                        <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" title="Enviar formulario de consulta" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection

{{-- ============================================================================ --}}

@section('footer_scripts_content')
        {{-- Ranking Modals :: ini --}}
        @foreach ($recetas_podium as $receta)

        {{-- Modal X --}}
        <div class="ranking-modal modal fade" id="rankingModal{{ $receta->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    {{-- Detalles de la receta --}}
                                    <h2 class="text-uppercase" alt="Nombre de la receta: {{$receta->titulo}}">{{ $receta->titulo }}</h2>
                                    <p class="item-intro text-muted">
                                        por
                                        @if (Auth::user() != null)
                                            <a href="/{{ $receta->user->username }}" title="Ver perfil de {{$receta->user->username}}" alt="Ver perfil de {{$receta->user->username}}" class="link-marco">{{ $receta->user->username }}</a>
                                        @else
                                            <span>{{ $receta->user->username }}</span>
                                        @endif
                                    </p>
                                    <img class="img-fluid d-block mx-auto" src="{{ $receta->imagen }}" alt="Foto de la receta: {{ $receta->titulo }}">
                                    <p alt="Descripción: {{$receta->descripcion}}">{{ $receta->descripcion }}</p>

                                    <table class="mx-auto mb-5">
                                        <tr>
                                            <td style="width: 50%;" class="text-right px-2">Fecha de Creación:</td>
                                            <td style="width: 50%;" class="text-left px-2" alt="Fecha de Creación: {{$receta->created_at}}" title="Fecha de Creación: {{$receta->created_at}}"> {{ $receta->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right px-2">Categoría:</td>
                                            <td class="text-left px-2"><a href="#" alt="Esta receta es de la Categoría {{$receta->categoria}}" title="Esta receta es de la Categoría {{$receta->categoria}}" class="link-marco">Pastelería</a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right px-2">Votos:</td>
                                            <td class="text-left px-2" alt="Esta receta es de la Categoría {{$receta->categoria}}" title="{{$receta->titulo}} tiene {{$receta->votos}} voto(s)">{{ $receta->votos }}</td>
                                        </tr>
                                    </table>

                                    <button class="btn btn-primary" data-dismiss="modal" type="button" title="Cerrar ventana" alt="Cerrar Ventana">
                                        <i class="fas fa-times" title="Icono de Cerrar"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        {{-- Ranking Modals :: fin --}}

        {{-- Login / Registro Modals --}}
        @include('auth.modals.login_modal')
        @include('auth.modals.register_modal')

        {{-- jQuery, Bootstrap, jQuery Easing --}}
        <script src="{{ asset('js/app.js') }}"></script>

        {{-- Otros --}}
        <script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
        <script src="{{ asset('js/contact_me.js') }}"></script>
        <script src="{{ asset('js/agency.js') }}"></script>

        {{-- Mostrando Modal Login/Registro si hubiera errores --}}
        @if (count($errors) > 0)
            {{-- $errors --}}
        <script type="text/javascript">
            $("#{{ old('modal') }}").modal('show');
        </script>
        @endif
        {{-- Mostrando Modal Login por intento de acceso sin autenticarse --}}
        @if (session('noAuth'))
        <script type="text/javascript">
            $("#{{ session('noAuth') }}").modal('show');
        </script>
        @endif
@endsection
