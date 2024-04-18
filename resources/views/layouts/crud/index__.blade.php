@extends('layouts.dashboard')
@section('dashboard-content')

    <input type="hidden" id="page-is-list" value="{{ (int) $page_is_list }}"/>

    @if(isset($state))
        @include('layouts.crud.messages-state', ['state' => $state])
    @endif
    
    @if(!isset($config['create_option']) || $config['create_option'] === true)
        @yield('create_link', \View::make('layouts.crud.create_link', compact('full_screen')))
    @endif

    @if($page_is_list)
    
        @php $hasRows = ($rows && $rows->count() > 0); @endphp

        @if(!$hasRows)
            <div class="alert alert-danger">Nenhum registro cadastrado</div>
        @endif
        
        @if($hasRows)
            @yield('crud-content')
        @endif
    @endif

@endsection