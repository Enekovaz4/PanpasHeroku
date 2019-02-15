@extends('layouts.app')
@section('content')

<header class="masthead" style="
            --bg-url: url(../images/header-home.jpg);
            --bg-attach: fixed;
            --bg-size: cover;
            --bg-x: center;
            --bg-y: center;
            z-index: -1;
            position: absolute;
            bottom: 100px;
            top: 0px;
            left: 0px;
            height:100vh;
            opacity: 0.9;
">
</header>


<div class="container" style="position: absolute; margin-left: 20%; margin-top: 10%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div id="secc-cabecera" class="card-header text-white"><h1>{{ __('Verifica Tu Dirección de Correo') }}</h1></div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('En este justo momento, se acaba de enviar un enlace al email empleado en el registro para verificar tu dirección de correo.') }}
                        </div>
                    @endif

                    <p>{{ __('Antes de proceder, por favor, revisa tu email para activar la verificación demandada.') }}</p>

                    <p>{{ __('Si no recibiste dicho email') }}, <a href="{{ route('verification.resend') }}" class="link-marco">{{ __('pulsa aquí para requerir uno nuevo') }}</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
