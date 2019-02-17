@extends('layouts.app_bg')

@section('content')
<header class="masthead_auth" style="
    --min-h: 90.75vh;
    --bg-url: url(../images/header-home.jpg);
    --bg-attach: fixed;
    --bg-size: cover;
    --bg-x: center;
    --bg-y: center;
">
    <div class="row" style="--padd-t: 250px;">
        <div class="col-8 row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div id="secc-cabecera" class="card-header text-white"><h1>{{ __('Resetea Tu Contraseña') }}</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"><span class="link-marco">{{ __('Email*') }}</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar Reseteo de Contraseña') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
