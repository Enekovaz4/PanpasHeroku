@extends('layouts.public')

@section('head_content')
		<meta name="description" content="Gestiona tus datos, tus recetas y otras opciones.">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">

		<title>{{ config('app.name', 'PaNPaS') }} - Mi cuenta</title>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

	


	function getUsuarios(){ //NO SE LLAMA ÁÚN
		$.ajax({
			headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
		  method: 'post', // Type of response and matches what we said in the route
		    url: '/ajax/usuarios', // This is the url we gave in the route

		  	success: function(data){ // What to do if we succeed
		        alert("{{$users[0]}}"); 
		    },
		    complete: function (data) {
                    // Schedule the next
                    setTimeout(getUsuarios, 1000);
            }
		});
	}	
</script>

@section('content')

		@include('layouts.public-navbar-auth')

		 {{-- Panel-de-Usuario --}}
	        <section id="user_panel">
	            <div class="container">
	                <div class="row justify-content-center">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header">
	                            Dashboard

									<div class="dropdown" style="float: right;">
									  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    {{$columna}} [{{$orden}}]
									  </button>
									  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										    <a class="dropdown-item" href="/usuarios/username/asc">Nombre [ASC]</a>
										    <a class="dropdown-item" href="/usuarios/username/desc">Nombre [DESC]</a>
										</div>
									</div>

	                        </div>

	                            <div class="card-body">
	                                {{-- Usuarios Grid --}}
									        <section class="bg-light" id="ranking">
									            <div class="container">
									                <div class="row">
									                	@foreach($users as $user)
									                    	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ranking-item">
										                        <a class="ranking-link" data-toggle="modal" href="#rankingModal1">
										                            <div class="ranking-hover" title="Seguir a {{$user->username}}">
										                                <div class="ranking-hover-content">
										                                    <i class="fas fa-plus fa-3x"></i>
										                                </div>
										                            </div>
										                            <img class="img-fluid" src="{{$user->avatar}}" alt="Bollos Suizos">
										                        </a>
										                        <div class="ranking-caption">
										                            <h4 title="{{$user->username}}">{{$user->username}}</h4>

										                            <h5 class="stars-votos" style="">
										                                <i class="fas fa-lg fas fa-sign-out-alt" title="{{$user->username}} está siguiendo a  {{count ($user->follows)}} usuarios"></i > {{ count($user->follows) }}  
										                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										                                <i class="fas fa-lg fas fa-sign-in-alt" title="{{$user->username}} tiene {{count($user->followers)}} seguidores"></i > {{ count($user->followers) }}
										                            </h5>
										                        </div>
									                    	</div>
									                    @endforeach
									        </section>

	                            </div>
	                        </div>
	                    </div>
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
@endsection
