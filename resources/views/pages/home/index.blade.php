@extends('layouts.dashboard')
@section('dashboard-content')
    @if(!empty($applications))
        <div id="applications-box" class="container" data-route-temp-link="{{ route('generateTempAuthInSourcer') }}">

            <div id="app-load-link" class="none">Carregando informações ...</div>

            <h2>Aplicações</h2>

            @foreach($applications as $app)
                <div class="card">
                    <div class="card-body">
                        <a class="application"
                           data-app-id=" {{ $app->getId() }}"
                           href="{{ $app->getLoginRoute() }}">{{ $app->getName() }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    
    @yield('home-content')
@endsection