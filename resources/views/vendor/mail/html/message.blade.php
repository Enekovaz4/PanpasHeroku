@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @php
            $anio_ini = 2018;
            $anio_actual = date('Y');
            $txt_anios_app = '';
            if($anio_actual == $anio_ini) {
                $txt_anios_app = $anio_ini;
            }
            else {
                $txt_anios_app = $anio_ini . '-' . $anio_actual;
            }
        @endphp
        @component('mail::footer')
            Copyright &copy; {{ $txt_anios_app }} {{ config('app.name') }}  S.L. - @lang('Todos los derechos y torcidos reservados.')
        @endcomponent
    @endslot
@endcomponent
