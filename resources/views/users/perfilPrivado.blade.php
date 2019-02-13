@extends('layouts.public')

@section('head_content')
        <meta name="description" content="Gestiona tus datos, tus recetas y otras opciones.">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
        {{-- El tema de Bootstrap no es necesario porque ya está incluido en la hoja de estilos principal (css/app.css) --}}
        {{--
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>--}}



        <title>{{ config('app.name', 'PaNPaS') }} - Mi cuenta</title>


        <style type="text/css">
            .avatar {
                max-width: 300px;
                width: 100%;
                height: auto;
                max-height: 300px;
            }
            .centrado {
                text-align: left;
            }


        
        </style>



@endsection

@section('content')

        @include('layouts.public-navbar-auth')

        {{-- Panel-de-Usuario --}}
        <section id="user_panel">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header"><h1 style=";">Perfil Privado</h1> 

                            <div class="card-body">
                                <h2>Modificar Avatar:</h2>
                                {{--
                                <form action="/user/guardarFotoPerfil" method="post" enctype="multipart/form-data" class="centrado">
                                <div><input type="file" name="newAvatar" class="btn btn-secondary col-12" required  alt="inserta enlace de imagen para cambiar tu avatar"><input type="submit" name="sub_avatar" value="Cambiar" class="btn btn-primary"></div>
                                
                                	<img src="{{$user->avatar}}" class="avatar" alt="Tu foto de perfil actual">
                                    <div class="col-12" style="max-width: 390px; float: right;">
                                         <canvas id="graph_recetas" alt="gráfico de todas las recetas que has insertado separado por 12 meses."></canvas>
                                    </div>
                                </form>
                                --}}

                                <form action="/user/guardarFotoPerfilURL" method="post" enctype="multipart/form-data" class="centrado">
                                <div><input type="text" name="newAvatar" class="btn btn-secondary col-12" required placeholder="inserta URL de imagen" alt="inserta enlace de imagen para cambiar tu avatar"><input type="submit" name="sub_avatar" value="Cambiar" class="btn btn-primary"></div>
                                
                                    <img src="{{$user->avatar}}" class="avatar" alt="Tu foto de perfil actual.">
                                    <div class="col-12" style="max-width: 390px; float: right;">
                                         <canvas id="graph_recetas" alt="gráfico de todas las recetas que has insertado separado por 12 meses."></canvas>
                                    </div>
                                </form>


                                <div class="col-12" style="margin-top: 200px">
                                    <h2>Modificar Datos:</h2>
                                    <form action="/user/actualizarDatos" method="post" enctype="multipart/form-data">
                                        <p class="col-lg-5 col-md-9">
                                            <label>Nombre de usuario:</label>   <input type="text" name="username" value="{{$user->username}}" class="w3-input" alt="Modificar Nombre de Usuario">
                                        </p>
                                        <p class="col-lg-5 col-md-9">
                                            <label>Nombre:</label>              <input type="text" name="name" value="{{$user->name}}" class="w3-input" alt="Modificar nombre">
                                        </p>
                                        <p class="col-lg-5 col-md-9">
                                         <label>Apellido:</label>               <input type="text" name="lastname" value="{{$user->lastname}}" class="w3-input" alt="modificar apellido">
                                        </p>
                                        <p class="col-lg-5 col-md-9">
                                            <label>Correo:</label>              <input type="text" name="email" value="{{$user->email}}" class="w3-input" alt="modificar correo">
                                        </p>
                                        <input type="submit" name="sub_avatar", value="Actualizar" class="btn btn-primary right" alt="actualizar información de tu cuenta">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="btn btn-danger col-xs-1" style="margin-top: 50px;" onclick="confirmaciónEliminarCuenta();">Eliminar Cuenta</div></div>
                </div>
            </div>
        </section>
@endsection

{{-- ============================================================================ --}}
{{-- ============================================================================ --}}

@section('footer_scripts_content')
        {{-- jQuery, Bootstrap, jQuery Easing --}}
        <script src="{{ asset('js/app.js') }}"></script>

        {{-- Otros --}}
        <script src="js/agency.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

        <script>

            var totalRecetaMeses = [];

            @foreach($recetas_meses as $mes)
                totalRecetaMeses.push({!!$mes!!});
            @endforeach



            console.log ("receta por meses en JS");
            console.log(totalRecetaMeses);

            var ctx = document.getElementById("graph_recetas").getContext("2d");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Enero", "Febrero", "Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    datasets: [{
                        label: 'Recetas Publicadas',
                        data: totalRecetaMeses,
                        borderWidth: 1,
                          backgroundColor: [
                                'rgba(255,175,0, 0.7)',
                            ],
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                stepSize: 1
                            }
                        }],
                        xAxes: [{
                            display: false
                        }]
                    }
                }
            });
        </script>

        {{-- Librería de Notificaciones de alerta - JS :: ini --}}
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

        <script type="text/javascript">
            function confirmaciónEliminarCuenta(){
                alertify.confirm('¿Seguro que quieres eliminar tu cuenta?', '', function(){ eliminarCuenta() }, 
                    function(){ alertify.error('CANCELADO')});
            }

            function eliminarCuenta(){
                    window.location.href = '{{url("/users/eliminarCuenta")}}';
            }
                    
                
        </script>

@endsection


