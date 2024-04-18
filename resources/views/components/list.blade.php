@if(isset($state))
    @include($view_prefix . 'layouts.crud.messages-state', ['state' => $state])
@endif

@php $hasRows = ($rows && $rows->count() > 0); @endphp

@if(!$hasRows)
    <div class="alert alert-danger">Nenhum registro cadastrado</div>
@endif

@if(!isset($config['create_option']) || $config['create_option'] === true)
    <div class="text-right">
        <a class="btn btn-success" href="{{ route($full_screen.'.create') }}">Criar novo registro</a>
    </div><br>
@endif

@if($hasRows)
    <div id="crud-list">
        @yield('crud-content')
    </div>
@endif
